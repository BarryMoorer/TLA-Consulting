<?php 
session_start();
include("includes/common.php");
error_reporting(E_ALL);
    ini_set('display_errors', 1);

if(isset($_POST['OG'])) {
    $date = $_POST['date'];
    $rtime = $_POST['test'];
    $proj = $_POST['project'];
    $projMR = $_POST['MR'];
    $stat = $_POST['status'];
    $sch = $_POST['schedule'];
    $quality = $_POST['qual'];
    $comments = $_POST['comment'];
    
    $db = db_connect();
    $q4 = "INSERT INTO status_report (id, submit_date,submit_time, ProjectID, ProjectManager, overallStatus,schedule, quality, comments) VALUES
        (NULL, '$date','$rtime', '$proj', '$projMR', '$stat', '$sch', '$quality', '$comments')"; 
    $insertRe = mysqli_query($db, $q4);
    //$res = $insertRe->execute;
//echo mysqli_error($insertRe);
        if ($insertRe) {
            echo 'success';
            header("Location: statusreport.php");
        }
else {
    echo "Insert Records Unsuccesful";
}
}

if(isset($_POST['subRet'])) {
    $date = $_POST['date'];
    $rtime = $_POST['test'];
    $proj = $_POST['project'];
    $projMR = $_POST['MR'];
    $stat = $_POST['status'];
    $sch = $_POST['schedule'];
    $quality = $_POST['qual'];
    $comments = $_POST['comment'];
    
    $db = db_connect();
    $q4 = "INSERT INTO status_report (id, submit_date,submit_time, ProjectID, ProjectManager, overallStatus,schedule, quality, comments) VALUES
        (NULL, '$date','$rtime', '$proj', '$projMR', '$stat', '$sch', '$quality', '$comments')"; 
    $insertRe = mysqli_query($db, $q4);
    //$res = $insertRe->execute;
//echo mysqli_error($insertRe);
        if ($insertRe) {
            echo 'success';
            header("Location: reporthome.php");
        }
else {
    echo "Insert Records Unsuccesful";
}
}

if(isset($_POST['Update'])) {
    $ID = $_POST['tID'];

    $IDproj = $_POST['project'];
    $date = $_POST['date'];
    $rtime = $_POST['dte'];
    $proj = $_POST['project'];
    $projMR = $_POST['MR'];
    $stat = $_POST['status'];
    $sch = $_POST['schedule'];
    $quality = $_POST['qual'];
    $comments = $_POST['comment'];

    $qReq = "UPDATE status_report set submit_date ='$date', submit_time = '$rtime', ProjectID = '$IDproj', ProjectManager = '$projMR', schedule='$sch', quality = '$quality', comments = '$comments', overallStatus = '$stat' where id = '$ID'"; 
    
    $db = db_connect();
    $update = mysqli_query($db, $qReq);
    //die($qReq);
    if($update) {
       header("Location:reporthome.php");
    } else {
        echo 'failure to update';
    }
}
