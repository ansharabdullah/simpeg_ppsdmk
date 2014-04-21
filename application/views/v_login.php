<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>PPSDMK</title>

        <!--icon-->
        <link rel="icon" type="image/png" href="<?php echo base_url(); ?>/assets/shamcey/images/logi1.png">

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/shamcey/css/style.default.css" type="text/css" />
        <link rel="stylesheet" href="css/style.shinyblue.css" type="text/css" />

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/shamcey/js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/shamcey/js/jquery-migrate-1.1.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/shamcey/js/jquery-ui-1.9.2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/shamcey/js/modernizr.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/shamcey/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/shamcey/js/jquery.cookie.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/shamcey/js/custom.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery('#login').submit(function() {
                    var u = jQuery('#username').val();
                    var p = jQuery('#password').val();
                    if (u == 'supervisor' && p == 'supervisor') {

                    } else if (u == 'manager' && p == 'manager') {

                    } else {
                        jQuery('.login-alert').fadeIn();
                        return false;
                    }
                });
            });
        </script>
    </head>

    <body class="loginpage">
    <center>
        <hr />
        <div class="loginpanel">
            <div class="loginpanelinner">
                <div class="logo animate0 bounceIn"><img src="<?php echo base_url(); ?>assets/shamcey/images/logo_ppsdmk.png" alt="" width="55%"/>
                <br><font color="white" size="2" align="left">SISTEM INFORMASI MANAJEMEN KEPEGAWAIAN PPSDMK</font></div>
                <form action='<?php echo base_url(); ?>login/process' method='post' name='process'>
                    <div class="inputwrapper login-alert">
                        <div class="alert alert-error">Invalid username or password</div>
                    </div>
                    <div class="inputwrapper animate1 bounceIn" style="width:45%;">
                        <input type="text" name="username" id="username" placeholder="NIP" />
                    </div>
                    <div class="inputwrapper animate2 bounceIn" style="width:45%;">
                        <input type="password" name="password" id="password" placeholder="PASSWORD" />
                    </div>
                    <div class="inputwrapper animate3 bounceIn" style="width:45%;">
                        <button name="submit">Log In</button>
                    </div>
                    
                    <?php if(! is_null($msg)) echo "<div class='inputwrapper animate1 bounceIn' style='width:100%; margin-left:60px';>".$msg."</div>";?>
                </form>
            </div><!--loginpanelinner-->
        </div><!--loginpanel-->
        <div class="loginfooter">
            <p>&copy; 2014. PUSAT PENGEMBANGAN SUMBERDAYA MANUSIA KEMETROLOGIAN. All Rights Reserved.</p>
        </div>
    </center>
</body>
</html>
