<div class="form-bottom">
    <div class="container container-test">
    <div class="row row-bg">
        
        <div class="col col-lg-4 col-lg-offset-4 col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 col-xs-12">
            <?php 
                include("letmein.php");
            ?>
            <form role="form" action="index.php?page=login" method="POST">
                <div class="form-group">
                     <label class="sr-only" for="tbUsername">First name</label>
                     <input type="text" name="tbUsername" placeholder="Username..." class="form-control" id="tbUsername">
                </div>
                <div class="form-group">
                     <label class="sr-only" for="tbPassword">Last name</label>
                     <input type="password" name="tbPassword" placeholder="Password..." class="form-control" id="tbPassword">
                </div>
                <button type="submit" name="btnLogIn" class="btn btn-primary">Let me in!</button>
                <a href="index.php?page=signup">Don't have an account?</a>
            </form>
        </div>
    </div>
    </div>
</div>