<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}
include("includes/header.php");
include("includes/sidenav.php");
include("includes/topnav.php");
include("includes/breadcrumbs.php");
?>



<?php
include("includes/footer.php");
?>