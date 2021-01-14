<?php 
    include("connection.inc");

    if(isset($_REQUEST['btnSignUp'])){
        
        $firstName = $_POST['tbFirstName'];
        $lastName = $_POST['tbLastName'];
        $email = $_POST['tbEmail'];
        $username = $_POST['tbUsername'];
        $password = $_POST['tbPassword'];
        $passwordConfirm = $_POST['tbPassword2'];
        
        //Birth date (day, month, year);
        $day = $_POST['ddlDay'];
        $month = $_POST['ddlMonth'];
        $year = $_POST['ddlYear'];
        
        $date = mktime(0, 0, 0, $day, $month, $year);
        
        $city = $_POST['ddlCity'];
        $gender = $_POST['rbGender'];
        
        $picName = $_FILES['fileAvatar']['name'];
        $tmpPath = $_FILES['fileAvatar']['tmp_name'];
        $picSize = $_FILES['fileAvatar']['size'];
        $picType = $_FILES['fileAvatar']['type'];
        
        $permPath = "avatars/".time().$picName;
        
        $errors2 = array();
        $errors = array();
        
        $reFirstName = "/^[A-Z][a-z]{1,20}$/";
        $reLastName = "/^[A-Z][a-z]{1,20}(\s[A-Z][a-z]{1,20})*$/";
        $reEmail = "/^[a-z0-9=+-_&^%]{3,20}@([a-z]{2,8}\.[a-z]{2,6}|[a-z]{2,8}\.[a-z]{2,4}\.[a-z]{2,4})$/";
        $reUserName = "/^[A-z0-9-.]{3,}$/";
        $rePass = "/^[A-z]{6,}[0-9]{1,}$/";
        
        
        if(!preg_match($reFirstName, $firstName)){
            $errors2[] = "Invalid first name.";
        }
        if(!preg_match($reLastName, $lastName)){
            $errors2[] = "Invalid last name.";
        }
        if(!preg_match($reEmail, $email)){
            $errors2[] = "Invalid email.";
        }
        if(preg_match($reUserName, $username)){
            $userNameCheck = "SELECT * FROM users WHERE Username='$username'";
            $result = mysql_query($userNameCheck, $connection);
            if(mysql_num_rows($result) > 0){
                $errors2[] = "Username already taken.";
            }
        }
        else{
            $errors2[] = "Invalid usernmae.";
        }
        if(preg_match($rePass, $password)){
            if($password != $passwordConfirm){
                $errors2[] = "Passwords do not match.";
            }
        }
        else{
            $errors2[] = "Invalid password.";
        }
        
        if($day == "Day" || $month == "Month" || $year == "Year"){
            $errors2[] = "Must select birthdate.";
        }
        if($city == "City"){
            $errors2[] = "Must select a city.";
        }
        if(empty($gender)){
            $errors2[] = "Must select gender.";
        }
        if(count($errors2) != 0){
            echo "<ul>";
            
            foreach($errors2 as $g){
                echo "<li>".$g."</li>";
            }
            echo "</ul>";
        }
        else{
            $password = md5(trim($_POST['tbPassword']));
            $passwordConfirm = md5(trim($_POST['tbPassword2']));
            
            echo "<p>Everything is okay, moving on to Picture upload and checkup.</p><br/>";
            
            if($picSize < 5 * 1024 * 1024){
                if($picType == "image/jpeg" || $picType == "image/jpg" || $picType = "image/png"){
                    if(move_uploaded_file($tmpPath, $permPath)){
                        $newUser = "INSERT INTO users VALUES('','$firstName','$lastName','$email','$username','$password',$date,$city,'$gender','$permPath','2')";
                        $signUp = mysql_query($newUser, $connection);
                        if($signUp){
                            echo "Successfully registered.";
                        }
                        else{
                            echo "Oh snap! Something went wrong, we are already on it.".mysql_error();
                        }
                    }
                    else{
                        $errors[] = "Picture upload failed, please try again.";
                    }
                }
                else{
                    $errors[] = "Only .jpg .jpeg and .png allowed.";
                }
            }
            else{
                $errors[] = "Picture is too large.";
            }
                if(count($errors) > 0){
                echo "<ul>";

                foreach($errors as $g){
                    echo "<li>".$g."</li>";
                }
                echo "</ul>";
                }
                else{
                    header("Location: index.php");
                }

        }
        
       
        
        
    }

?>