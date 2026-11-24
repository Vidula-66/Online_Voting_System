<?php
session_start();
include("connect.php");

if (!isset($_SESSION['userdata']) || $_SESSION['userdata']['role'] != 0) {
    header("location:../");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($connect, "DELETE FROM user WHERE id='$id'");
    echo "<script>alert('User deleted successfully!'); window.location='../routes/admin.php';</script>";
} else {
    echo "<script>alert('Invalid User ID!'); window.location='../routes/admin.php';</script>";
}
?>