<?php 
    include("Connection.php");
$email = $password = "";
$emailErr = $passwordErr = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["email"])){
        $emailErr = "email is required";
    }else{
        $email = $_POST["email"];
    }
    if(empty($_POST["password"])){
        $passwordErr = "password required";
    }else{
        $password = $_POST["password"];
    }


    if($password && $email){
        include("Connection.php");
    $check_email_row = mysqli_query($Connection,"select *  FROM login_table WHERE email = '$email'");
        $check_email_row = mysqli_num_rows($check_email);
        if($check_email_row > 0 ){
            while($row = mysqli_fetch_assoc($check_email)){
                $db_pass =$row["password"];
                $db_acc_type = $row["account_type"];
                if($db_acc_type == "1"){
                    echo "<script> window.location.href = 'admin';</script>";
                }else{
                    echo"<script> window.location.href = 'user'; </script>";
                }
            }
        }else{
            $passwordErr = "password incorrect";
        }
    }else{
        $emailErr="your email is unregistered";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php htmlspecialchars("PHP_SELF")?>" method="post">
        <label for="email">username</label>
        <input value="<?php echo $email; ?>" type="text">
        <span class="error" style="color: red"><?php echo $emailErr ?></span>
        <br>
        <label for="password">password</label>
        <input type="password">
        <span class="error" style="color: red"><?php echo $passwordErr ?></span>
        <br>
        <input type="submit">

    </form>
    
</body>
</html>
