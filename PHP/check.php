<?php
$flag=1;
$no=0;
$yes=0;
$name='';
try {
    $db = mysqli_connect('localhost', 'root', '', 'special');
    $qryStr = "select * from members ";
    $res = $db->query($qryStr);
    $no=0;
    $yes=0;
    for($i=0;$i<$res->num_rows;$i++) {
        $row = $res->fetch_object();
        if($row->flag ==0 and $row->UserLevel == 1){
            $no=0;
        }
        else if($row->flag ==1 and $row->UserLevel == 1){
            $yes=1;
            $email = $row->Email;
            $name=$row->LoginName;
        }
    }
//    $db->close();
    $bar=($no || $yes);
    if(!$bar){
        echo"please log in first!";
    }
    else {

    }

}catch (Exception $e){

}
if(isset($_POST['slide'])){
    $sl= $_POST['slide'];
}



if(isset($_POST['cart'])){
    $string=explode('!',$_POST['cart']);
    $Fname = $string[0];
    $Furl = $string[1];
    $Fprice = $string[2];
    $Memail = $string[3];
    try{
        $qryStre = "select * from cart WHERE name='$Fname' and Email='$Memail'";
        $ress= $db->query($qryStre);
        $roww=$ress->fetch_assoc();
        $qua= $roww['Quantity'];
        if($roww['name']== $Fname){
            $sl =$sl + $qua;
            $sql = "UPDATE cart SET Quantity='$sl' WHERE name='$Fname'";
            $results = mysqli_query($db, $sql);
        }
        else {
            $query = "INSERT INTO cart (Email,URL,name,price,Quantity) 
  			  VALUES('$email','$Furl','$Fname',$Fprice,$sl)";
            mysqli_query($db, $query);
        }
        header('location:Cart.php');
    }catch (Exception $e){

    }
}