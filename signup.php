<div class="jumbotron">
    <div class="row">
        <div class="col col-lg-8 col-md-7 col-sm-6 col-xs-12">
            <form method="POST" action="serverRegEx.php" name="regFormm" id="regFormm" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="tbFirstName">First name:</label>
                    <label for="tbFirstName" id="labelFirstName">*</label>
                    <input type="text" class="form-control" onBlur="checkForm();" name="tbFirstName" id="tbFirstName" placeholder="Your real name in here.."/>
                </div>
                <div class="form-group">
                    <label for="tbLastName">Last name:</label>
                    <label for="tbLastName" id="labelLastName">*</label>
                    <input type="text" class="form-control" onBlur="checkForm();" name="tbLastName" id="tbLastName" placeholder="Your last name.."/>
                </div>
                <div class="form-group">
                    <label for="tbEmail">Email:</label>
                    <label for="tbEmail" id="labelEmail">*</label>
                    <input type="text" class="form-control" onBlur="checkForm();" name="tbEmail" id="tbEmail" placeholder="john.smith@yahoo.com"/>
                </div>
                <div class="form-group">
                    <label for="tbUsername">Username:</label>
                    <label for="tbUsername" id="labelUsername">*</label>
                    <input type="text" class="form-control" onBlur="checkForm();" name="tbUsername" id="tbUsername" placeholder="Your username in here"/>
                </div>
                <div class="form-group">
                    <label for="tbPassword">Password:</label>
                    <label for="tbPassword" id="labelPassword">*</label>
                    <input type="password" class="form-control" name="tbPassword" id="tbPassword" placeholder="Password.."/>
                </div>
                <div class="form-group">
                    <label for="tbPassword2">Confirm Password:</label>
                    <label for="tbPassword2" id="labelPassword2">*</label>
                    <input type="password" class="form-control" onBlur="passCheck();" name="tbPassword2" id="tbPassword2" placeholder="Confirm Password.."/>
                </div>
                <div class="form-group">
                    <label for="ddlDay">Birth date: *</label>
                    <select name="ddlDay" id="ddlDay" class="custom-select" onChange="checkForm();">
                        <option value="Day">Day</option>
                        <?php 
                            dynamicList(1, 31);
                        ?>
                    </select>
                    <select name="ddlMonth" id="ddlMonth" class="custom-select" onChange="checkForm();">
                        <option value="Month">Month</option>
                        <?php 
                            dynamicMonthList();
                        ?>
                    </select>
                    <select name="ddlYear" id="ddlYear" class="custom-select" onChange="checkForm();">
                        <option value="Year">Year</option>
                        <?php 
                            dynamicList(1921, 2017); 
                        ?>
                    </select>
                    <label for="ddlYear" id="labelDate"></label>
                </div>
                <div class="form-group">
                    <label for="ddlCity">City: *</label>
                    <select name="ddlCity" class="custom-select" id="ddlCity">
                        <option value="City">City..</option>
                        <?php 
                            $queryCities = "SELECT * FROM cities";
                            $queryAction = mysql_query($queryCities, $connection);
                        
                            if(mysql_num_rows($queryAction) > 0){
                                while($city = mysql_fetch_array($queryAction)){
                                    echo("<option value='".$city['IdCity']."'>".$city['City']."</option>");
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="custom-controls-stacked">
                    <label for="rbGender">Gender: *</label><br/>
                    <label class="custom-control custom-radio">
                        <input id="rbMale" name="rbGender" value="Male" type="radio" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Male</span>
                        <span id="spanGender"></span>
                    </label><br/>
                    <label class="custom-control custom-radio">
                        <input id="rbFemale" name="rbGender" value="Female" type="radio" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Female</span>
                    </label>
                </div>
                <div class="form-group">
                    <label for="fileAvatar">Avatar:</label>
                    <input type="file" id="fileAvatar" name="fileAvatar" class="btn btn-primary"/>
                    <span id="spanAvatar">Picture formats(5 Mb max)</span>
                </div>
                <input type="button" class="btn btn-primary btn-lg btn-block" name="btnSignUp" onClick="checkForm1();" value="Sign up!"/>
            </form>
            <?php 
                include("serverRegEx.php");
            ?>
        </div>
        <div class="col col-lg-4 col-md-5 col-sm-6 col-xs-12">
            <div class="panel panel-default">
                <ul class="list-group">
                    <li class="list-group-item">First name should start with a capital letter and can not contain any numbers.</li>
                    <li class="list-group-item">Last name should be the same as the first name with the possibility of additonal names(e.g. Smith Doe)</li>
                    <li class="list-group-item">Email should contain only small letters and digits,including some special characters(-_. etc)</li>
                    <li class="list-group-item">Username can contain letters, digits and some special characters..</li>
                    <li class="list-group-item">Password must have at least 6 letters and 1 digit.</li>
                    <li class="list-group-item">Birth date, city, gender and an avatar are all required.</li>
                </ul>
            </div>
        </div>
    </div>
</div>