<div class="row">
                <div class="col col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <p class="h3">Manufacturer</p>
                    <form method="POST" action="index.php?page=shop">
                        <?php
                            
                            $manus = "SELECT * FROM manufacturer";
                            $result = mysql_query($manus, $connection);
                            if(mysql_num_rows($result) > 0){
                                while($m = mysql_fetch_array($result)){
                                    echo "<label class='form-control custom-checkbox'>
                                            <input type='radio' class='custom-control-input' value='".$m['IdManufacturer']."' name='rbManufacturer' >
                                            <span class='custom-control-indicator'></span>
                                            <span class='custom-control-description'>".$m['Name']."
                                        </label>";
                                    }
                                }
                            
                        ?>
                        <input type="submit" class="btn btn-primary" name="btnSort" id="btnSort" value="Sort"/>
                    </form>
                </div>
                <?php 
                   if(isset($_REQUEST['btnSort'])){
                       
                       $test = $_POST['rbManufacturer'];
                       
                       if(empty($test)){
                           echo "Select manufacturer.";
                       }
                       else{
                           $sorted = "SELECT * FROM smartphones WHERE IdManufacturer = '$test'";
                           $resultSorted = mysql_query($sorted, $connection);
                           
                           echo "<div class='col col-lg-9 col-md-6 col-sm-9 col-xs-12'>
                                    <div class='row'>
                                        <p class='h3'><i class='fa fa-mobile' aria-hidden='true'></i>&nbsp;&nbsp;Mobile phones</p>
                                    </div>";
                           
                           if(mysql_num_rows($resultSorted) > 0){
                               while($xx = mysql_fetch_array($resultSorted)){
                                   echo "<div class='col col-lg-5 col-md-8 col-sm-8 col-xs-12 img-thumb'>
                                                <img src='".$xx['Picture']."'alt='".$xx['Model']."'/><br/><a href='#'>".$xx['Model']."</a>
                                            </div>";
                               }
                               echo "</div>";
                           }
                       }
                   } 
                ?>
                <?php
                    
                     
                        if(isset($_REQUEST['btnSort'])){
                            
                        }
                        else{ ?>
                        <div class="col col-lg-9 col-md-9 col-sm-12 col-xs-12"> <!--Ovde dodati ID-->
                           <div class="row">
                                <p class="h3"><i class="fa fa-mobile" aria-hidden="true"></i>&nbsp;&nbsp;Mobile phones</p>
                            </div> 
                       <?php }
                    ?>
                    
                    <div class="row">
                        <?php
                            if(isset($_REQUEST['btnSort'])){
                                
                            }
                            else{
                                $phones = "SELECT * FROM smartphones";
                                $result = mysql_query($phones, $connection);

                                if(mysql_num_rows($result) > 0){
                                    while($phone = mysql_fetch_array($result)){
                                        echo "<div class='col col-lg-5 col-md-6 col-sm-12 col-xs-12 img-thumb'>
                                                <img src='".$phone['Picture']."'alt='".$phone['Model']."'/><br/><a href='#'>".$phone['Model']."</a>
                                            </div>";
                                        //U href-u staviti javascript:show($phone['IdSmartphone']);
                                    }
                                }
                            }
                        ?>
                    <?php 
                        if(isset($_REQUEST['btnSort'])){
                            
                        }
                        else{ ?>
                           </div> 
                    <?php }
                    ?>    
                    
                </div>
            </div>