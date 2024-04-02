<?php 
include ("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="name" >
        <input type="email" name="email">
        <input type="password" name="password" >
        <button type="submit" name="submit" >Register</button>
    </form>
    <?php 
    if(isset($_POST["submit"])){
        $name=$_POST["name"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        // $hashed= sha1($password."salt");
        $hashed = hash("gost",$password."salt");
        // $saltedPassword=$hashed."angbastonnigaston";
        



        $con = mysqli_connect("localhost","root","","minicase");
        $result = mysqli_query($con,"SELECT * from user WHERE  email='$email'and password='$hashed'");
        $count=mysqli_num_rows($result);
    
    if($count>0){
       header("location:dashboard.php");
    }else{
        echo 'hindi sakses naman pidi na';
    }
}
    ?>
</body>
</html>