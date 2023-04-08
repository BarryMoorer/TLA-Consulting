<?php include('includes/header.php');
session_start();
?>

<h2>Login Form </h2>

<section>
<!-- Create Form -->
<?php
//must have include or php won't know what the function is 
include('includes/common.php');
//signon();
?>
<form action="login.php" method="post">
    <p><label>Username:</label>
    <input type="text" name="username"></p>
    <p><label>Password:</label> 
    <input type="text" name="password"></p>
    <input type="submit" name="submit" value="submit">
</form>
<?php
//if item is not defined, everything below function will not appear/work
//error();
?>
</section>

<?php include('includes/footer.php');
?>



