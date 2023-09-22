<?php
$total=0;
if(isset($_POST['profit'])){
    $date_clicked = date('Y-m-d');
    $email = $_POST['profit'];
    try{

        $db = mysqli_connect('localhost', 'root', '', 'special');
        $qryStr = "select * from cart where Email = '$email'";
        $res= $db->query($qryStr);
        for($i=0;$i<$res->num_rows;$i++) {
            $row = $res->fetch_object();
            if ($row->Email == $email) {
                $Fname = $row->name;
                $Fqua = $row->Quantity;
                $Fprice = $row->price;
                $mul = $Fprice * $Fqua;
                $total=$total + $mul;
            }
            $query = "INSERT INTO sales (productName, Quantity, price, Date) 
  			          VALUES('$Fname', $Fqua, $mul,'$date_clicked')";
            mysqli_query($db, $query);
            $sql = "DELETE FROM `cart` WHERE `cart`.`Email` = '$email'";
            $db->query($sql);
        }
        header('location: Cart.php');
        $db->close();
    }catch (Exception $e){

    }
}