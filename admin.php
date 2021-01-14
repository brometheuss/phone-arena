<?php 
    @session_start();
    include("connection.inc");
    
    if(!isset($_SESSION['sessUlogaID']) || $_SESSION['sessUlogaID'] != 1){
        header("Location: index.php");
    }

    $userss = "SELECT * FROM users";
    $resultUserss = mysql_query($userss, $connection);

    echo "<div class='container-fluid'>
            <div class='row'>
                    <form method='POST' action='index.php?page=admin' enctype='multipart/form-data'>
                        <div class='table-responsive'>
                        <table class='table' border='1'>
                            <tr>
                                <th>IdUser</th>
                                <th>FirstName</th>
                                <th>LastName</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>BirthDate</th>
                                <th>IdCity</th>
                                <th>Gender</th>
                                <th>Avatar</th>
                                <th>IdUloga</th>
                                <th>Delete</th>
                            </tr>";

    if(mysql_num_rows($resultUserss) > 0){
        while($usersA = mysql_fetch_array($resultUserss)){
            echo "<tr>
                    <td>".$usersA['IdUser']."</td>
                    <td>".$usersA['FirstName']."</td>
                    <td>".$usersA['LastName']."</td>
                    <td>".$usersA['Email']."</td>
                    <td>".$usersA['Username']."</td>
                    <td>".$usersA['Password']."</td>
                    <td>".$usersA['BirthDate']."</td>
                    <td>".$usersA['IdCity']."</td>
                    <td>".$usersA['Gender']."</td>
                    <td>".$usersA['Avatar']."</td>
                    <td>".$usersA['IdUloga']."</td>
                    <td><input type='checkbox' name='forDeletion[]' value='".$usersA['IdUser']."'/></td>
                </tr>";
        }
        echo "<tr>
                    <td><input type='text' class='new' name='tbNewId' disabled/></td>
                    <td><input type='text' class='new' name='tbNewFName'/></td>
                    <td><input type='text' class='new' name='tbNewLName'/></td>
                    <td><input type='text' class='new' name='tbNewEmail'/></td>
                    <td><input type='text' class='new' name='tbNewUser'/></td>
                    <td><input type='password' class='new' name='tbNewPass'/></td>
                    <td><input type='text' class='new' name='tbNewBirthDate'/></td>
                    <td><input type='text' class='new' name='tbNewCityID'/></td>
                    <td><input type='text' class='new' name='tbNewGender'/></td>
                    <td><input type='file' class='new' name='fNewAvatar' id='fNewAvatar'/></td>
                    <td><input type='text' class='new' name='tbNewUlogaID'/></td>
                    <td><input type='checkbox' class='new' disabled/></td>
                </tr>";
        echo "<tr>
                <td colspan='12'><input type='submit' class='btn btn-primary' name='btnAdd' id='btnAdd' value='Add User'/>
                <input type='submit' class='btn btn-primary' name='btnDelete' id='btnDelete' value='Delete'/></td>
            </tr>";
        echo "</div></table></form>";
        
        echo "</div>
            </div>";
    }

    if(isset($_REQUEST['btnDelete'])){
        $forDelete = $_POST['forDeletion'];
        
        foreach($forDelete as $d){
            $deleteUser = "DELETE FROM users WHERE IdUser = ".$d;
            $resultDelete = mysql_query($deleteUser, $connection);
        }
        if(!$resultDelete){
            echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                    <strong>Error!</strong> Failed to delete user, please try again.
                </div>";
        }
        else{
            echo "<div class='alert alert-success alert-dismissible' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                    <strong>Success!</strong> User successfuly deleted.
                </div>";
        }
    }

    if(isset($_REQUEST['btnAdd'])){
        
        $newName = $_POST['tbNewFName'];
        $newLast = $_POST['tbNewLName'];
        $newEmail = $_POST['tbNewEmail'];
        $newUser = $_POST['tbNewUser'];
        $newPass = md5(trim($_POST['tbNewPass']));
        $newDate = $_POST['tbNewBirthDate'];
        $newCity = $_POST['tbNewCityID'];
        $newGender = $_POST['tbNewGender'];
        
        $avatarNew = $_FILES['fNewAvatar']['name'];
        $avatar = $_FILES['fNewAvatar']['tmp_name'];
        
        $newUloga = $_POST['tbNewUlogaID'];
        
        $avatarPerm = "avatars/".time().$avatarNew;
        
        $userCheck = "SELECT * FROM users WHERE Username = '$newUser'";
        $resultCheck = mysql_query($userCheck, $connection);
        if(mysql_num_rows($resultCheck) > 0){
            echo "<div class='alert alert-warning alert-dismissible' role='alert'>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                        <strong>Username </strong>already exists.
                    </div>";
        }
        else{
            if(move_uploaded_file($avatar, $avatarPerm)){
            $addUser = "INSERT INTO users VALUES('','$newName','$newLast','$newEmail','$newUser','$newPass',$newDate,$newCity,'$newGender','$avatarPerm','$newUloga')";
            $resultAdd = mysql_query($addUser, $connection);
            if(!$resultAdd){
                echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                        <strong>Error!</strong> Failed to add user, please try again.
                    </div>";
            }
            else{
                echo "<div class='alert alert-success alert-dismissible' role='alert'>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                        <strong>Success!</strong> User successfuly added.
                    </div>";
            }
        }
        else{
            echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                        <strong>Error!</strong> Failed to upload the file, please try again.
                    </div>";
        }
        }
        
        
        
    }
?>











