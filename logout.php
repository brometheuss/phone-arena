<?php 
    @session_start();

    if(isset($_SESSION['sessUserID'])){
        
        unset($_SESSION['sessUserID']);
        unset($_SESSION['sessUserName']);
        unset($_SESSION['sessFirstName']);
        unset($_SESSION['sessLastName']);
        unset($_SESSION['sessEmail']);
        unset($_SESSION['sessBirthDate']);
        unset($_SESSION['sessCityID']);
        unset($_SESSION['sessGender']);
        
        session_destroy();
        header("Location: index.php");
    }

?>