

<?php
session_start();
if (!isset($_SESSION['userdata'])) {
    header("location:../");
}
// Ensure 'groupsdata' is set
if (!isset($_SESSION['groupsdata'])) {
    echo "No groups data found! Please log in again.";
    exit();
}
$groupsdata = $_SESSION['groupsdata'];
?>

<html>
    <head>
        <title>Online Voting System - Dashboard</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <style>
            #backbtn {
                padding: 5px;
                border-radius: 5px;
                background-color: blue;   
                color: aliceblue;
                float: left;
                margin: 10px;
            }
            #logoutbtn {
                padding: 5px;
                border-radius: 5px;
                background-color: blue;   
                color: aliceblue;
                float: right;
                margin: 10px;
            }
            #Group {
                background-color: white;
                width: 100%;
                padding: 10px;
            }
            #mainSection {
                padding: 10px;
            }
            #headerSection {
                padding: 10px;
            }
        </style>
        <div id="mainSection">
            <center>
                <div id="headerSection">
                    <a href="../"><button id="backbtn"> Back</button></a>
                    <a href="logout.php"><button id="logoutbtn"> Logout</button></a>
                    <h1>Online Voting System</h1>
                </div>
            </center>
            <hr>
            <div id="Group">
                <?php
                if ($groupsdata) {
                    foreach ($groupsdata as $group) {
                        ?>
                        <div>
                            <img style="float:right" src="../uploads/<?php echo $group['photo'] ?>" height="100" width="100">
                            <b>Group Name:</b> <?php echo $group['name'] ?><br><br>
                            <b>Votes:</b> <?php echo $group['votes'] ?><br><br>
                        </div>
                        <hr>
                        <?php
                    }
                } else {
                    echo "<p>No groups available.</p>";
                }
                ?>
            </div>
        </div>
    </body>
</html>

