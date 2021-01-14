<?php 

    if(isset($_POST['btnLogIn'])){
        
        $user = $_POST['tbUsername'];
        $pass = md5(trim($_POST['tbPassword']));
        
        $findUser = "SELECT * FROM users WHERE Username = '$user' AND Password = '$pass'";
        $result = mysql_query($findUser, $connection);
        
        if(mysql_num_rows($result) == 1){
            $user = mysql_fetch_array($result);
            
            $idUser = $user['IdUser'];
            $idUloga = $user['IdUloga'];
            $username = $user['Username'];
            $firstName = $user['FirstName'];
            $lastName = $user['LastName'];
            $email = $user['Email'];
            $birthDate = $user['BirthDate'];
            $idCity = $user['IdCity'];
            $gender = $user['Gender'];
            
            //creating a session
            $_SESSION['sessUserID'] = $idUser;
            $_SESSION['sessUlogaID'] = $idUloga;
            $_SESSION['sessUserName'] = $username;
            $_SESSION['sessFirstName'] = $firstName;
            $_SESSION['sessLastName'] = $lastName;
            $_SESSION['sessEmail'] = $email;
            $_SESSION['sessBirthDate'] = $birthDate;
            $_SESSION['sessCityID'] = $idCity;
            $_SESSION['sessGender'] = $gender;
            
            //creating a cookie
            setcookie($idUser, $username, time() + 86400 * 180);
            
            
        }
        else{
            echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                    <strong style='text-align:center'>Access denied!</strong><br/> Incorrect username or password.
                </div>";
        }
    }
   

?>