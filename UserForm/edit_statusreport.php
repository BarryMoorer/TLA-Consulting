<?php
    session_start();
    include("includes/common.php");
    signon();

    
    
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    $id = $_POST['ID'];
    
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="includes/styles-2.css" type="text/css">
        <title> Edit Status Report</title>
        
    </head>
    <body>
        <div>
            <header><h1> Edit Status Report</h1></header>
            <form method="post" action="report_include.php">
            <fieldset>
                
                <label><strong>Date</strong></label></br>
                <?php 
                echo '<input type="hidden" name="tID" value="'.$id.'">';
                //echo $id;

                $db = db_connect();
                    $query = "SELECT * FROM status_report where ID = '$id'";
                    $editResult = mysqli_query($db, $query);
                   $result = mysqli_fetch_assoc($editResult);
                $date = $result['submit_date'];
                $time = $result['submit_time'];
                $project = $result['ProjectID'];
                $manager = $result['ProjectManager'];
                $ID2 = $result['id'];
                $stat = $result['overallStatus'];
                $sc = $result['schedule'];
                $qlty = $result['quality'];
                $comm = $result['Comments'];

                    
                    
                    //$result = mysqli_fetch_assoc($editResult);
                    //die($$result['reportDate']);
                    //mysqli_error($result);

/*
                    echo "<select name=date>";
                    while($row = mysqli_fetch_assoc($editResult)) {
                        $dates = $row['reportDate'];
                        echo $dates;
                       //die($dates);
                        echo "<option value='".$dates."'>".$dates."</option>";
                       
            }
             echo "</select>";*/
                    ?>
                <input type="hidden" name="ID2" value="<?php echo $ID2; ?>">
                <?php report_dates(); ?>


                   
                <label><strong>Time of Check</strong></label></br>
                    <input name="dte" type="text" value="<?php echo $time; ?>"required></br>
                <label><strong>Project</strong></label></br>
                <?php
                    echo '<input type="hidden" value="'.$project.'" name="projID">';
                    project_names();
                    ?>  
                <label><strong>Project Manager</strong></label></br>
                    <input name="MR"type="text" value="<?php echo $manager;?>" required></fieldset>
            <fieldset>
                <legend><strong>Status</strong></legend>
                    <ol>
                        <label >1. Overall Status?</label>
                            <input style="margin-left:60px" type="radio" 
                            name="status"
                            value="Green" <?php 
                            if ($stat == "Green") {
                                echo "checked";
                            }?> required>Green
                            <input type="radio" name="status" value="Yellow" <?php 
                            if ($stat == "Yellow") {
                                echo "checked";
                            }?>>Yellow
                            <input type="radio" name="status" value="Red" <?php 
                            if ($stat == "Red") {
                                echo "checked";
                            }?>>Red*
                        
                        </ol>    
                    
                        <ol>
                        <label>2. Schedule?</label>
                            <input style="margin-left:90px" type="radio" value="Green" name="schedule" <?php 
                            if ($sc == "Green") {
                                echo "checked";
                            }?> required>Green
                            <input type="radio" name="schedule" value="Yellow" <?php 
                            if ($sc == "Yellow") {
                                echo "checked";
                            }?>>Yellow
                            <input type="radio" name="schedule" value="Red" <?php 
                            if ($sc == "Red") {
                                echo "checked";
                            }?>>Red*
                        </ol>  
                    
                        <ol>
                            <label>3. Quality?</label>
                            <input style="margin-left:100px" type="radio" name="qual" value="Green" <?php 
                            if ($qlty == "Green") {
                                echo "checked";
                            }?> required>Green 
                            <input type="radio" name="qual" value="Yellow" <?php 
                            if ($qlty == "Yellow") {
                                echo "checked";
                            }?>>Yellow
                           <input type="radio" name="qual" value="Red" <?php 
                            if ($qlty == "Red") {
                                echo "checked";
                            }?>>Red*
                        </ol>  
            </fieldset>
            <label><br><strong>*Please note in comments reasons behind Red status</strong><br><br></label>
            <fieldset>
                <legend><strong>Comments</strong></legend>
                <textarea style="height:175px; width:600px" name="comment" value="<?php echo $comm; ?>"><?php echo $comm; ?></textarea>
            </fieldset>
            <input type="submit" name="Update" value="Update">
            
</form>
<a href="reporthome.php" class="reporthome" ><button>Cancel</button></a>
            <a href="logout.php" class="reporthome"  style="margin:5px;"><button>Logout</button></a>
</div>
    </body>
    </html>

        