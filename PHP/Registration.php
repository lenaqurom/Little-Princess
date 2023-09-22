<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Little Princess | Sign Up</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/Registration.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="container">
    <div class="title">Registration</div>
    <div class="content">
        <form action="Registration.php" method="post" id="form" class="form" enctype="multipart/form-data">
            <?php include('errors.php'); ?>
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Full Name</span>
                    <input type="text" name="FullName" placeholder="Enter your name"  pattern="([A-z\s]){3,}" required>
                </div>
                <div class="input-box">
                    <span class="details">Username</span>
                    <input type="text"  name='LoginName' placeholder="Enter your username" required>
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="email"  name='Email' placeholder="Enter your email" required>
                </div>
                <div class="input-box">
                    <span class="details">Phone Number</span>
                    <input type="text" name='Phone' placeholder="Enter your number" pattern="[0-9]{10}" required>
                </div>
                <div class="input-box">
                    <span class="details">City</span>
                    <input type="text" name='City' placeholder="Enter your city" required>
                </div>
                <div class="input-box">
                    <span class="details">Address</span>
                    <input type="text" name='Address' placeholder="Enter your Address" required>
                </div>
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" placeholder="Enter your password" name="LoginPass" required>
                </div>
                <div class="input-box">
                    <span class="details">Confirm Password</span>
                    <input type="password" placeholder="Confirm your password" name="password2" required>
                    <small>Error message</small>
                </div>
                <div class="input-box">
                    <span class="details">Profile Picture</span>
                    <input type="file" name="Picture" id="pic"  onchange="showImage()" required>
                </div>
                <div class="input-box">
                    <img src="" alt="" id="output" width="200" height="150">
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Register" name="reg_user" style='margin-right:16px'>
                <button onclick="javascript:history.back()" class="cancel" style='margin-right:16px'>Cancel</button>
            </div>
        </form>
    </div>
</div>

<script>

    const form = document.getElementById('form');
    const password = document.getElementById('password');
    const password2 = document.getElementById('password2');

    form.addEventListener('submit', e => {
        // e.preventDefault();

        checkInputs();

    });

    function showImage() {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(document.getElementById('pic').files[0]);
        console.log(image.src);
    }




    function checkInputs() {
        const passwordValue = password.value.trim();
        const password2Value = password2.value.trim();

        if(passwordValue !== password2Value) {
            setErrorFor(password2, 'Passwords does not match');
        } else{
            setSuccessFor(password2);
        }
    }

    function setErrorFor(input, message) {
        const formControl = input.parentElement;
        const small = formControl.querySelector('small');
        formControl.className = 'input-box error';
        small.innerText = message;
    }

    function setSuccessFor(input) {
        const formControl = input.parentElement;
        formControl.className = 'input-box success';
    }

</script>
<script>
    //if(<?php //echo $_SESSIOM["error"]?>// == 1  ){
    //    alert("Failed to Signup Please try again ..")
    //}
</script>
</body>
</html>