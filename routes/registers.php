<?php
include("connect.php");

// Retrieve form data
$name    = $_POST['name'];
$mobile  = $_POST['mobile'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$address = $_POST['address'];
$dob     = $_POST['dob'];         // New field: Date of Birth
$voterid = $_POST['voterid'];       // New field: Voter ID
$image   = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$role    = $_POST['role'];

if($role==0){
echo '<script>alert("admin registration is not allowed!");window.location="../routes/register.html";</script>';
exit();
}
// Check if password and confirm password match
if ($password == $cpassword) {
    // Upload the image file
    move_uploaded_file($tmp_name, "../uploads/$image");
    
    // Insert the user record with the new fields into the database
    $insert = mysqli_query($connect, "INSERT INTO user (name, mobile, address, password, photo, role, status, votes, dob, voterid) 
                                       VALUES ('$name', '$mobile', '$address', '$password', '$image', '$role', 0, 0, '$dob', '$voterid')");
    
    if ($insert) {
        echo '
        <script>
          alert("Registration successful");
          window.location="../";
        </script>
        ';
    } else {
        echo '
        <script>
          alert("Some error occurred!");
          window.location="../routes/register.html";
        </script>
        ';
    }
} else {
    echo '
    <script>
      alert("Password and confirm password do not match!");
      window.location="../routes/register.html";
    </script>
    ';
}
?>