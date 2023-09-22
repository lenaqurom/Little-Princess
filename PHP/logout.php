<?php
$flag = 1;
$userlvl = 1;
try {
    $db = new mysqli('localhost', 'root', '', 'special');
    $qryStr = "select * from members WHERE flag = $flag and UserLevel = $userlvl";
    $res = $db->query($qryStr);
    $row = $res->fetch_assoc();
    $row = 0;
    $query = "UPDATE  members SET flag =$row WHERE UserLevel = $userlvl";
    $results = mysqli_query($db, $query);
    header('Location:../PHP/Home.php');
} catch (Exception $e) {

}

