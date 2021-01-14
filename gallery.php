<div class="row">
        <?php 
        
            $selectPhotos = "SELECT * FROM pictures";
            $resultSelectPhotos = mysql_query($selectPhotos, $connection);
        
            if(mysql_num_rows($resultSelectPhotos) > 0){
                while($p = mysql_fetch_array($resultSelectPhotos)){
                    echo "<div class='col col-lg-4 col-md-4 col-sm-6 col-xs-12'>
                            <a href='".$p['Picture']."' data-title='".$p['AltTag']."' class='fancybox' rel='group'>
                                <img src='".$p['Picture']."'  alt='".$p['AltTag']."' class='img-thumbnail' />
                            </a>
                         </div>";
                }
            }
        
        ?>
</div>