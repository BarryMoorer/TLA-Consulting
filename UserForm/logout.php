    <?php
       session_unset($_SESSION['var']);
        session_unset($_SESSION['userLevel']);
        session_destroy();
        header("Location:userform.php");
    ?>