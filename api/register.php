<?php
include("connect.php");
$name=$_POST['name'];
$mobile=$_POST['mobile'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
$address=$_POST['address'];
$image=$_FILES['photo']['name'];
$tmp_name=$_FILES['photo']['tmp_name'];
$role=$_POST['role'];
$dob=$_POST['dob'];
$voterid=$_POST['voterid'];
//validate age
$birthdate=new DateTime($dob);
$today=new DateTime();
$age=$today->diff($birthdate)->y;

if($role==0){
echo"<script>alert('admin registeration is not allowed from here.');
window.location='../routes/register.html';</script>";
exit();
}
if($age<18)
{
  echo '
<script>
alert("you must be at least 18 years old to register!");
window.location="../routes/register.html";
</script>';
exit();
}
//validate voter id
if(!preg_match("/^[a-zA-Z0-9]{10}$/",$voterid))
{
  echo '
<script>
alert("invalid voter id! it should be 10 alphanumeric characters.");
window.location="../routes/register.html";
</script>';
exit();
}

if($password==$cpassword){
   move_uploaded_file($tmp_name,"../uploads/$image");
   $insert=mysqli_query($connect,"INSERT INTO user (name,mobile,address,password,voterid,photo,role,status,votes) 
   VALUES ('$name','$mobile','$address','$password','$voterid','$image','$role',0,0)");
   if($insert){
    echo '
    <script>
      alert("registration successfull");
      window.location="../";
      </script>
      ';
   }
   else{
    echo '
    <script>
      alert("some error occured!");
      window.location="../routes/register.html";
      </script>
      ';
   }
}else{
    echo '
    <script>
      alert("password and confirm password doesnt match!");
      window.location="../routes/register.html";
      </script>
      ';
      
}
?>