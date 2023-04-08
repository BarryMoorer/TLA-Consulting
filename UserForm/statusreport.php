<?php
    session_start();
    include("includes/common.php");
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
        <link rel="stylesheet" href="includes/styles-2.css" type="text/css">
        <title>Status Report</title>
        
    </head>
    <body>
        <div>
            <header><h1>Status Report</h1></header>
            <form method="post" action="report_include.php">
            <fieldset>
                <label><strong>Date</strong></label></br>
                <?php report_dates();?>
                <label><strong>Time of Check</strong></label></br>
                    <input name="test" type="text" required></br>
                <label><strong>Project</strong></label></br>
                <?php project_names();?>
                <label><strong>Project Manager</strong></label></br>
                    <input name="MR"type="text" required></fieldset>
            <fieldset>
                <legend><strong>Status</strong></legend>
                    <ol>
                        <label >1. Overall Status?</label>
                            <input style="margin-left:60px" type="radio" 
                            name="status"
                            value="Green" required>Green
                            <input type="radio" name="status" value="Yellow" >Yellow
                            <input name="status" type="radio" value="Red">Red*
                        
                        </ol>    
                    
                        <ol>
                        <label>2. Schedule?</label>
                            <input style="margin-left:90px" type="radio" value="Green" name="schedule" required>Green
                            <input type="radio" name="schedule" value="Yellow">Yellow
                            <input type="radio" name="schedule" value="Red">Red*
                        </ol>  
                    
                        <ol>
                            <label>3. Quality?</label>
                            <input style="margin-left:100px" type="radio" value="Green" name="qual" required>Green
                            <input type="radio" name="qual" value="Yellow">Yellow
                            <input type="radio" name="qual" value="Red">Red*
                        </ol>  
            </fieldset>
            <label><br><strong>*Please note in comments reasons behind Red status</strong><br><br></label>
            <fieldset >
                <legend><strong>Comments</strong></legend>
                <textarea name="comment" style="height:175px; width:600px;"></textarea>
            </fieldset>
            <input type="submit" value="Submit" name="OG">
            <input type="submit" value="Submit & Return Home" name="subRet">
            
</form>
            <a class="reporthome" href="reporthome.php"><button>Cancel</button></a>
            <a class="reporthome" href="logout.php" style="margin:5px;"><button>Logout</button></a>
</div>
    </body>
    </html>


        