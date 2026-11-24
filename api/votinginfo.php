

<?php
session_start();
include("connect.php");

// Fetch all groups (candidates or parties) from the database
$groups = mysqli_query($connect, "SELECT * FROM user WHERE role=2");
?>

<!DOCTYPE html>

<head>
   <style>
        body {
            background-image: url('../uploads/image.jpg'); /* Set the background image */
            background-size: cover; /* Cover the entire page */
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* Prevent repeating */
            font-family: Arial, sans-serif;
            text-align: center;
            color: #fff; /* White text color for better readability */
        }
        table,p {
            margin: auto;
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
            border-collapse: collapse;
            color: #000; /* Black text color */
        }
        th, td {
            padding: 10px;
        }
        h1 {
            color: #ffcc00; /* Highlighted heading */
        }
    </style>
</head>
    
<body>
    <h1>Welcome to the Online Voting System</h1>
    <p>This page provides information about the voting process and available candidates/groups.</p>

    <h2>Voting Guidelines</h2>
    <ul>
        <li>Every voter is allowed to vote only once.</li>
        <li>You must be registered to log in and participate in voting.</li>
        <li>Choose your preferred candidate/group wisely.</li>
        <li>Your vote is secure and anonymous.</li>
    </ul>

    <h2>Available Candidates/Groups</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Group Name</th>
            <th>Photo</th>
          
        </tr>
        <?php while ($group = mysqli_fetch_assoc($groups)) { ?>
        <tr>
            <td><?php echo $group['name']; ?></td>
            <td><img src="../uploads/<?php echo $group['photo']; ?>" alt="Group Photo" width="100"></td>
            
        </tr>
        <?php } ?>
    </table>

    <p>
        Already registered? <a href="../index.html">Click here to login</a>. <br>
        New user? <a href="../routes/register.html">Click here to register</a>.
    </p>
</body>
</html>

