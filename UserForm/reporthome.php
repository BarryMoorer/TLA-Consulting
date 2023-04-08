<?php
    session_start();
   //signon($_SESSION['userLevel']);
    require("includes/common.php");
    signon();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reports Home</title>
        <link rel="stylesheet" href="includes/styles-2.css" type="text/CSS">
    </head>
    <body>
        <div value="reporthome">
            <h1>Status Report Home</h1>
            <a href="statusreport.php" class="reporthome" style="margin: 10px 0;"><button>SUBMIT NEW STATUS REPORT</button></a>
            <fieldset>
               
                    <div>
                    <table><th style="padding-right: 25px;">Project Name</th>
                    <th style="padding-right: 25px;">Project Manager </th>
                    <th style="padding-right: 25px;">Date of Report </th>
                    <th>Time of Report</th>
                
                <?php
                $db = db_connect();
                    $query = "SELECT * FROM status_report INNER JOIN project_names ON status_report.ProjectID = project_names.ProjectID"; 

                    $result = mysqli_query($db, $query);
                    //die($result);
                    //$row2 = mysqli_num_rows($result);
                    //echo "<input type=hidden name=ID value=ID>";
                    //$resultArray = array();
                    
                    while($row = mysqli_fetch_assoc($result)) {
                       echo '<form method="post" action="edit_statusreport.php">'; 
                        $ID = $row['id'];
                        $project = $row['ProjectName'];
                        $manager = $row['ProjectManager'];
                        $date = $row['submit_date'];
                        $time = $row['submit_time'];
                        

                        if($_SESSION['userLevel'] == 1) 
                          echo  "<tr><td>$project</td><td>$manager</td><td>$date</td><td>$time</td><td><input type=hidden name=ID value=$ID><td><input type=submit class=reporthome name=$ID value=edit ></td></tr>";

                          else {

                            echo "<tr><td>$project</td><td>$manager</td><td>$date</td><td>$time</td></tr>";
                          }
                            
                        
                        echo '</form>';
                    
                        //echo "<input style=margin:5px 0px; type=submit value=edit button><br>";
                         }
                         
                ?>
                 
            </form></table> </div>
                
               
            </fieldset>
        <a href="logout.php" class="reporthome" ><button>Logout</button></a>
        </div>
        
    </body>
    </html>