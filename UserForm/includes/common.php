<?php
function db_connect() {
    $getDatabaseConnection = new mysqli('localhost','bm','bmoorer23','Project_Reports');
         if (mysqli_connect_errno()) {
            echo '<p>Error: Could not connect to database. <br>
            Please try again later. </p>';
            exit;  
        }
            return $getDatabaseConnection;
            mysqli_close($getDatabaseConnection);
    }


?>
<?php
     function report_dates() {
        
        $db = db_connect();
        $query = "SELECT * FROM report_dates ORDER BY reportDate ASC";
       
        


        $result = mysqli_query($db, $query);
        //$result2 = mysqli_query($db, $query2);


        
       // echo $id;

             // die($date);
//echo $date;
    echo '<select name="date">';
            $id = $_POST['ID'];
            $query2 = "SELECT * FROM status_report where ID = '$id'";
              $editResult = mysqli_query($db, $query2);
              $results = mysqli_fetch_assoc($editResult);
              
              $date = $results['submit_date'];
              echo '<option selected>'.$date.'</option>';
              while($row = mysqli_fetch_assoc($result)) {
                 $dates = $row['reportDate']; 
                 echo  "<option>$dates</option>";
                    if ($date == $dates){
                      //  echo "<selected>$dates</selected>";
                 } //else {
                   // echo  "<option>$dates</option>";
                   //}

                }

     echo "</select>";
    //dba_close($db2);
}
?>
<?php
    function project_names() {
        $db = db_connect();
        $query = "SELECT * FROM status_report INNER JOIN project_names ON status_report.ProjectID = project_names.ProjectID";
        $result = mysqli_query($db, $query);
        
       
        echo "<select name=project>";
        $id = $_POST['ID'];
        $query2 = "SELECT * FROM status_report INNER JOIN project_names ON status_report.ProjectID = project_names.ProjectID where ID = '$id'";
        $editResult = mysqli_query($db, $query2);
        $results = mysqli_fetch_assoc($editResult);
        $ProjName = $results['ProjectName'];
    echo '<option selected>'.$ProjName.'</option>';
        while($row = $result->fetch_assoc()) {
        
        $projID = $row['ProjectID'];
        $pname = $row['ProjectName'];
        //echo "<option value='".$projID."selected=$ProjName'>".$ProjName."</option>";
        echo "<option value='$projID'>".$pname."</option>";
        
    }
        echo "</select>";
     //   dba_close($dbs);
}
   
?>


<?php

function loginToSite($username,$password) {
    session_start();
    $db = db_connect();
    
    $un = trim($_POST['username']);
    $db->select_db('users');
        $query = "SELECT * from users WHERE UserName = '$un'";
       $result = mysqli_query($db, $query);
           $pw = trim($_POST['password']); 
            if (mysqli_num_rows($result)>0) {
             
               while($row = mysqli_fetch_assoc($result)) {
                    $passw = $row['UserPassword'];
                    $name = $row['FirstName'];
                    $userL = $row['UserLevel'];
                    $_SESSION['var'] = "$name";
                    $_SESSION['userLevel'] = "$userL";
                        if ($passw == $pw) {
                                return true;
                        } else {
                            return false;
                        }
                    
                }
            }
            
        };
            //$stmt = $db->prepare($query);
            //$stmt->bind_param('s', $un);
            //$stmt->execute();
           //$result = $stmt->get_result();
            
            

         //  while ($row = $result->fetch_all()) {
           //     $usern = $row['username'];
            //   $passw = $row['password'];
              //  echo $usern;
                //    if ($usern == $un) {
                 //   echo ' test worked'echo $usern;
               // echo 'TEST Failed';
            //} //else {
               // $pw = $row['password'];
                //$un = $row['username'];
               // ;
                   // echo $result;
                //return true;
        //    }
  //     }

       /*
        echo '<p>';
            while ())
                {
                    $pTest = $row['password'];
                    echo '<p>'.$pTest.'</p>';
                   
                };
            echo $pTest;
        echo '</p>';
        
        echo $result;
         

            }
            else {
                return false;
                echo 'failure';
            }
            
     
        
};


function failure() {
echo '<p><img src=includes/noLogin.jpg  alt=manager</p>';
}*/
function signon() {
    echo '<h2>Welcome, '.$_SESSION['var'].'</h2>';
};

?>