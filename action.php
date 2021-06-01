<?php
session_start();
$conn=mysqli_connect("localhost","root","","adminpanel");

if(isset($_POST["register"])){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password=sha1($_POST["password"]);
    // print($password);
    $email_query="select * from users where email='$email'";
    //select query to fetch email
    $email_check=mysqli_query($conn,$email_query);

    if(mysqli_num_rows($email_check)>0){
        $_SESSION['emailerror']="Email already in use";
        header("location: register.php");
    }
    else{
        $query="insert into users(name,email,pass) values('$name','$email','$password')";
    
        $q=mysqli_query($conn,$query);
        // print_r($q);
        if($q!=NULL){
            header("location: login.php");
        }
        else{
            header("location: register.php");
        }
    }

    
}

if(isset($_POST['login'])){
    $email=$_POST["email"];
    $pass=sha1($_POST["pass"]);
    $select="select * from users where email = '$email' and pass='$pass'";
    // echo $select;
    $check_credentials=mysqli_query($conn,$select);
    $userdata=mysqli_fetch_assoc($check_credentials);
    
    if(mysqli_num_rows($check_credentials)>0){
        $_SESSION['username']=$userdata["name"];
        header("location: index.php");
    }
    else{
        $_SESSION['credentialerror']="Email and Password donot match";
        header("location: login.php");

    }
}

if(isset($_POST['logout'])){
    session_destroy();
    header('location:login.php');
}
?>