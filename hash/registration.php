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
        <input type="text" name="name" placeholder="name" >
        <input type="email" name="email" placeholder="email">
        <input type="password" name="password" placeholder="password" >
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
        $result = mysqli_query($con,"INSERT INTO user(name,email,password) Values  ('$name','$email','$hashed') ");
        
    if(!$result){
        die ("hindi sakses");
    }else{
        echo 'sakses naman pidi na';
    }
}
    ?>
</body>
</html>