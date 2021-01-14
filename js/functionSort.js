function sortM(){
    
    var ms = document.getElements
    
    var sortChoice = "";
    
    
      <div class="btn-group btn-group-vertical" data-toggle="buttons">
                    <?php 
                        $surveys = "SELECT * FROM survey";
                        $result = mysql_query($surveys, $connection);
                        if(mysql_num_rows($result) > 0){
                            while($survey = mysql_fetch_array($result)){
                                echo "<label class='btn active'>
                                            <input type='radio' name='rbSurvey' ><i class='fa fa-circle-o fa-2x' /></i><i class='fa fa-dot-circle-o fa-2x'></i>
                                            <span>".$survey['LabelSpan']."</span>
                                        </label>";
                            }
                        }
                    ?>
                    <input type="submit" class="btn btn-primary" name="nesto" id="btnSurvey" value="Submit my vote!"/>
                    
                </div>
}