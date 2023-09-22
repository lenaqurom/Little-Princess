<?php
// initializing variables
$username = "";
$email    = "";
$Fname = "";
$phone = "";
$city = "";
$address= "";
$gender= "";
$UserLevel=1;
$code=0;
$flag=0;
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'special');

if (isset($_POST['reg_user'])) {

    if (isset($_FILES['Picture'])) {
        $img_name = $_FILES['Picture']['name'];
        $img_size = $_FILES['Picture']['size'];
        $tmp_name = $_FILES['Picture']['tmp_name'];
        $error = $_FILES['Picture']['error'];
        if ($error == 0) {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg", "jpeg", "png");
            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = 'C:/xampp/htdocs/SpMom/uploads/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
            }else {
                array_push($errorss, "You can't upload files of this type");
            }
        }else {
            array_push($errorss,"unknown error occurred!");
        }
    }

    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['LoginName']);
    $email = mysqli_real_escape_string($db, $_POST['Email']);
    $Fname= mysqli_real_escape_string($db, $_POST['FullName']);
    $phone=mysqli_real_escape_string($db, $_POST['Phone']);
    $city=mysqli_real_escape_string($db, $_POST['City']);
    $address=mysqli_real_escape_string($db, $_POST['Address']);
    $gender=mysqli_real_escape_string($db, $_POST['gender']);
    $password_1 = mysqli_real_escape_string($db, $_POST['LoginPass']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password2']);

    // form validation: ensure that the form is correctly filled ...
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }
    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM members WHERE LoginName='$username' OR Email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['LoginName'] === $username) {
            array_push($errors, "Username already exists");
        }

        if ($user['Email'] === $email) {
            array_push($errors, "email already exists");
        }
    }
    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = shaw1($password_1);//encrypt the password before saving in the database

        $query = "INSERT INTO members (LoginName, LoginPass, Email,FullName,Phone,City,Address,UserLevel,code,flag,ProfilePic) 
  			  VALUES('$username', '$password', '$email','$Fname',$phone,'$city','$address',$UserLevel,$code,$flag,'$new_img_name')";
        mysqli_query($db, $query);
        $_SESSION['LoginName'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: Customers.php');
    }
}