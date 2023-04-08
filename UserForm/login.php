<?php
session_start();
$USERNAME = $_POST['username'];
$PASSWORD = $_POST['password'];
?>
<?php 

include('includes/header.php');

?>

<h2>Login Form </h2>

<section>
<!-- Create Form -->
<?php
//must have include or php won't know what the function is 
include('includes/common.php');
signon();
loginToSite($username, $password);
$output = loginToSite($username, $password);

   if($output == true) {
        $output = loginToSite($username, $password);
        header("Location: reporthome.php");
    } else{
        header("Location: userform.php");
    };
?>


<?php
//if item is not defined, everything below function will not appear/work
//error();
?>
</section>

<?php include('includes/footer.php');
?>



