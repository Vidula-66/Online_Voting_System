<?php
session_start();
if (!isset($_SESSION['userdata']) || $_SESSION['userdata']['role'] != 0) {
    header("location:../");
    exit();
}

include("../api/connect.php");

// Fetch all users
$users = mysqli_query($connect, "SELECT * FROM user");

?>
<html>
<head>
    <title>Admin Dashboard - Online Voting System</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <center>
        <div id="headerSection">
            <h1>Admin Dashboard</h1>
            <a href="logout.php"><button id="logoutbtn">Logout</button></a>
        </div>
    </center>
    <hr>
    <div id="mainSection">
        <h2>Registered Users</h2>
        <table border="1" cellpadding="10">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Role</th>
                <th>Votes</th>
                <th>Actions</th>
            </tr>
            <?php while ($user = mysqli_fetch_assoc($users)) { ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['mobile']; ?></td>
                <td><?php echo ($user['role'] == 1) ? "Voter" : (($user['role'] == 2) ? "Group" : "Admin"); ?></td>
                <td><?php echo $user['votes']; ?></td>
                <td>
                    <a href="../api/delete_user.php?id=<?php echo $user['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>

