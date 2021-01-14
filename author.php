<div class="container-fluid">
    <div class="row">
        <div class="col col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <?php 
                $authorPic = "SELECT * FROM author";
                $result = mysql_query($authorPic, $connection);
                
                if(mysql_num_rows($result) == 1){
                    $author = mysql_fetch_array($result);
                    
                    echo "<img class='img-responsive borders' src='".$author['AuthorPicturePath']."' alt='".$author['Alt']."'/>";
                }
            ?>
        </div>
        <div class="col col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <p id="pAuthor">About author</p>
            <?php
                $authorBio = "SELECT * FROM author";
                $result = mysql_query($authorBio, $connection);
                
                if(mysql_num_rows($result) == 1){
                    $author = mysql_fetch_array($result);

                    echo "<p>".$author['AboutAuthor']."</p>";
                }
            ?>
        </div>
        <div class="col col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <form method="POST" action="index.php?page=author" class="form-horizontal">
                <p id="pSurvey"><i class="glyphicon glyphicon-list-alt"></i> Quick survey</p>
                <span id="spanSurvey">How would you rate my website ?</span><br/>
                <div class="btn-group btn-group-vertical">
                    <?php 
                        $surveys = "SELECT * FROM survey";
                        $result = mysql_query($surveys, $connection);
                        if(mysql_num_rows($result) > 0){
                            while($survey = mysql_fetch_array($result)){
                                echo "<label class='surveyLabel'>
                                            <input type='radio' name='rbSurvey' value='".$survey['IdSurvey']."' />
                                            <span class='spanSurvey'>".$survey['LabelSpan']."&nbsp;&nbsp;(".$survey['Counter']." votes)"."</span>
                                        </label>";
                            }
                        }
                    ?>
                <input type="submit" class="btn btn-primary" name="btnSurvey" id="btnSurvey" value="Submit my vote!"/>
                 </div>   
            </form>
            <?php 
                
                if(isset($_REQUEST['btnSurvey'])){

                            
                    $survey = $_POST['rbSurvey'];
                            
                    if(empty($survey)){
                        echo "<div class='alert alert-warning alert-dismissible' role='alert'>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                    <strong>Please submit a vote first.</strong> 
                                </div>";
                    }
                    else{
                        
                        $counter = "UPDATE survey SET Counter = Counter + 1 WHERE IdSurvey = '$survey'";
                        $resultCounter = mysql_query($counter, $connection);
                        
                                
                        echo "Successfully submitted your vote.";
                    }
                            
                }
            ?>
        </div>
    </div>
</div>















