<?php
session_start();
if(!isset($_SESSION['userdata'])){
    header("location:../");
}
 $userdata=$_SESSION['userdata'];
 $groupsdata=$_SESSION['groupsdata'];
 if($_SESSION['userdata']['status']==0){
    $status='<b>Not Voted</b>';
 }
 else{
    $status='<b style="color:green">Voted</b>';
 }
?>
<html>
    <head>
        <title>Online Voting System - Dashboard</title>
        <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <style>
        #backbtn{
            padding: 5px;
            border-radius:5px;
            background-color:blue;   
            color: aliceblue;
            float:left;
            margin:10px;
        }
        #logoutbtn{
            padding: 5px;
            border-radius:5px;
            background-color:blue;   
            color: aliceblue;
            float:right;
            margin:10px;
        }
        #profile{
            background-color:white;
            width:30%;
            padding:10px;
            float:left;
        }
        #Group{
            background-color:white;
            width:60%;
            padding:10px; 
            float:right;
        }
        #votebtn{
            padding: 5px;
            border-radius:5px;
            background-color:blue;   
            color: aliceblue;
            
        }
        #mainSection{
            padding:10px;
        }
        #headerSection{
             padding:10px;
        }
        #voted{
            padding: 5px;
            border-radius:5px;
            background-color:green;   
            color: aliceblue;
            
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
    <div id="mainplane">
      <div id="Profile">
     <center><img src="../uploads/<?php echo $userdata['photo']?>" height="100" width="100"></center><br><br>
     <b>NAME:</b><?php echo $userdata['name']?></br></br>
     <b>MOBILE:</b><?php echo $userdata['mobile']?></br></br>
     <b>ADDRESS:</b><?php echo $userdata['address']?></br></br>
     <b>STATUS:</b><?php echo $status?></br></br>
       </div>
    <div id="Group">
      <?php
        if($_SESSION['groupsdata']){
        for($i=0; $i<count($groupsdata) ;$i++){
       ?>
            <div>
                <img style="float:right" src="../uploads/<?php echo $groupsdata[$i]['photo'] ?>" height="100" width="100">
                <b>Group Name:</b><?php echo $groupsdata[$i]['name']?><br><br>
                <b>Votes</b>
                <form action="../api/vote.php" method="POST">
                <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes']?>">
                <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id']?>">
                <?php
                if($_SESSION['userdata']['status']==0){
                    ?>
                  <input type="submit" name="votebtn" value="Vote" id="votebtn-<?php echo $groupsdata[$i]['id']; ?>" onclick="highlightVote(<?php echo $groupsdata[$i]['id']; ?>)">
                    <?php
                }
                else{
                    ?>
                    <button disabled type="button" name="votebtn" value="vote" id="voted">Voted</button>
                    <?php
                }
                ?>
                
        </form>
        </div>
        <hr>
            <?php
        }
    }
    else{

    }

     ?>
    </div>
</div>
    <script>
    function highlightVote(groupId) {
        var voteButton = document.getElementById("votebtn-" + groupId);
        voteButton.style.backgroundColor = "yellow"; // Highlight in yellow

        setTimeout(function() {
            voteButton.style.backgroundColor = "blue"; // Revert to original color
        }, 2000);
    }
</script>
</body>

    </html>