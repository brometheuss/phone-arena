<?php 
    @session_start();
    @ob_start();
    include("connection.inc");

    include("functions.inc");

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Phone Arena</title>
        <meta charset="UTF-8"/>
        <link rel="icon" href="logo.ico" type="image/gif" sizes="16x16">
        <script src="jquery/jquery-3.1.1.min.js"></script>
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="js/regEx.js"></script>
        <!-- Add jQuery library -->
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

		<!-- Add mousewheel plugin (this is optional) -->
		<script type="text/javascript" src="fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

		<!-- Add fancyBox -->
		<link rel="stylesheet" href="fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
		<script type="text/javascript" src="fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

		<!-- Optionally add helpers - button, thumbnail and/or media -->
		<link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
		<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
		<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

		<link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
		<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
		<script type="text/javascript">
			var $= jQuery.noConflict();
		</script>
		<script type="text/javascript">
			$(document).ready(function() {
				$(".fancybox").fancybox();
			});
		</script>
        <!--<script language="text/javascript">
            $(document).ready(function(){
                $('.surveyLabel').hover(function(){
                    $('.spanSurvey').css("margin-left", "20px");
                });
            });
        </script>-->
        
        
        <!--<link src="lightbox2-master/lightbox2-master/dist/css/lightbox.min.css" rel="stylesheet">-->
        
        <!--<link rel="stylesheet" type="text/css" href="css/jquery.lightbox-0.5.css" media="screen"/>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.lightbox-0.5.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function()
            {
                $('#galerija a').lightBox();
            });
        </script>-->
        
        <link rel="stylesheet" type="text/css" href="css/footer.css">  
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0">
    <body>
        <div class="container-fluid">
            <div id="header" class="container-fluid">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                    <!-- The whole NavMenu groups together in order to adjust for mobile screen size -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        <a class="navbar-brand" href="index.php">Phone<i class="company-name">Arena</i></a>
                        </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <?php 
                            
                        $menu = "SELECT * FROM menu WHERE ParentId = 0 AND Text NOT LIKE '%Users%'";
                        $resultMenu = mysql_query($menu, $connection);
                        
                        if(mysql_num_rows($resultMenu) > 0){
                            while($r = mysql_fetch_array($resultMenu)){
                                echo "<ul class='nav navbar-nav'>
                                    <li class='dropdown'>";
                                
                                echo "<a href='".$r['Path']."' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>".$r['Text']."<span class='caret'></span></a>";
                                
                                $child = "SELECT * FROM menu WHERE ParentId = ".$r['IdLink'];
                                $resultChild = mysql_query($child, $connection);
                                
                                if(mysql_num_rows($resultChild) > 0){
                                    echo '<ul class="dropdown-menu">';
                                    $counter = 1;
                                    
                                    while($v = mysql_fetch_array($resultChild)){
                                        echo '<li><a href="index.php?page='.$v['Path'].'">'.$v['Text'].'</a></li>';
                                        if($counter % 3 == 0 ){
                                            echo '<li role="separator" class="divider"></li>';
                                        }
                                        $counter++;
                                    }
                                    echo "</ul>";   
                                }
                                echo "</li></ul>";
                            }
                        }
                        
                        ?>
                      <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Users <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <?php
                                
                                if(isset($_SESSION['sessUserID'])){
                                    
                                }
                                else{ ?>
                                    <li><a href="index.php?page=login" aria-hidden="true"><i class="fa fa-sign-in"></i> Log in</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="index.php?page=signup" aria-hidden="true"><i class="fa fa-user-plus"></i> Sign up</a></li>
                          <?php } ?>
                            
                              <?php 
                                if(isset($_SESSION['sessUserID'])){ ?>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="index.php?page=logout" aria-hidden="true"><i class="glyphicon glyphicon-log-out"></i>Logout</a></li>
                               <?php } ?> 
                          </ul>
                        </li>
                      </ul>
                    <form class="navbar-form navbar-left">
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-search"></span>  
                            <input type="text" class="form-control" placeholder="Under construction." disabled>
                        </div>
                        <button type="submit" class="btn btn-primary" disabled>Submit</button>
                        <?php 
                            if(isset($_SESSION['sessUlogaID']) && $_SESSION['sessUlogaID'] == 1){ ?>
                                <button type="submit" name="btnAdmin" class="btn btn-primary"><a href="index.php?page=admin" class="adminLink">Admin panel</a></button>
                        <?php }
                            
                        ?>   
                    </form> 
                    </div>
                  </div>
                </nav>
            </div>
        </div>
        <div id="middle" class="container-fluid">
            <?php      
            
                if(isset($_GET['page'])){
                    $typ = $_GET['page'];
                    
                    switch($typ){

                        case 'shop':
                            include("shop.php");
                            break;

                        case 'slider':
                            include("slider.php");
                            break;
                            
                        case 'signup':
                            include("signup.php");
                            break;
                        
                        case 'login':
                            include("login.php");
                            break;
                            
                        case 'gallery':
                            include("gallery.php");
                            break;
                            
                        case 'logout':
                            include("logout.php");
                            break;
                        
                        case 'author':
                            include("author.php");
                            break;
                            
                        case 'admin':
                            include("admin.php");
                            break;

                        default:
                            include("slider.php");
                            break;
                    }
                }else{
                     include("slider.php");  
                }
            
                
                /*if(isset($_GET['page'])){
                    if($_GET['page'] == 'shop'){
                        include("shop.php");
                    }
                    if($_GET['page'] == 'slider'){
                        include("slider.php");
                    }
                }*/
                
            ?>
        </div>
        <div id="footer" class="container-fluid">
            <footer class="footer-distributed">
                <div class="footer-left">
                    <h3>Phone<span>Arena</span></h3>
                    <p class="footer-links">
                        <?php 
                            $footerMenu = "SELECT * FROM menu WHERE ParentId = 1 AND Text NOT LIKE '%Useres%'";
                            $resultFooterMenu = mysql_query($footerMenu, $connection);
                        
                            if(mysql_num_rows($resultFooterMenu) > 0){
                                while($x = mysql_fetch_array($resultFooterMenu)){
                                    echo "<a href='index.php?page=".$x['Path']."'>".$x['Text']."</a>";
                                    echo " - ";
                                }
                                
                            }
                        ?>
                    </p>
                    <p class="footer-company-name">Phone Arena &copy; 2017</p>
                </div>
                <div class="footer-center">
                    <div>
                        <i class="fa fa-map-marker"></i>
                        <p><span>Dimitrija Tucovica</span> Belgrade, Serbia</p>
                    </div>
                    <div>
                        <i class="fa fa-phone"></i>
                        <p>+381 63 8899 1010</p>
                    </div>
                    <div>
                        <i class="fa fa-envelope"></i>
                        <p><a href="mailto:uros.markov.42.15@ict.edu.rs">uros.markov.42.15@ict.edu.rs</a></p>
                    </div>
                </div>
                <div class="footer-right">
				<p class="footer-company-about">
					<span>About the site</span>
					This is just a fictive website, and was constructed as project during my fifth trimester.
                    <a href="documentation.pdf">Documentation</a>
				</p>
				<div class="footer-icons">
					<a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
					<a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
					<a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a>
					<a href="https://github.com/"><i class="fa fa-github"></i></a>
				</div>
                </div>
            </footer>
        </div>
    </body>
</html>




















