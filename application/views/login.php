<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-hand-peace-o font-blue-sharp"></i>
            <span class="caption-subject font-blue-sharp bold uppercase">NearlyWeb <?php echo lang("login_Login"); ?></span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="row">
            <div class="col-md-12 login-container bs-reset">
                <div class="login-content">
                    <?php echo validation_errors(); ?>
                    <?php echo form_open('index.php/VerifyLogin', array('class' => 'login-form')); ?>

                    <div class="alert alert-danger display-hide">
                        <button class="close" data-close="alert"></button>
                        <span><?php echo lang("login_Enter_username_and_password"); ?> </span>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <input class="form-control form-control-solid placeholder-no-fix form-group" type="text"
                                   autocomplete="off" placeholder="Email" name="email" required/></div>
                        <div class="col-xs-6">
                            <input class="form-control form-control-solid placeholder-no-fix form-group" type="password"
                                   autocomplete="off" placeholder="Password" name="password" required/></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="rem-password">
                                <label class="rememberme mt-checkbox mt-checkbox-outline">
                                    <input type="checkbox" name="remember"
                                           value="1"/> <?php echo lang("login_Remember_me"); ?> <span></span> </label>
                            </div>
                        </div>
                        <div class="col-sm-8 text-right">
                            <div class="forgot-password">
                                <a href="javascript:;" id="forget-password"
                                   class="forget-password"><?php echo lang("login_Forgot_Password"); ?></a>
                            </div>
                            <button class="btn green" type="submit">Sign In</button>
                        </div>
                    </div>
                    </form>
                    <!-- BEGIN FORGOT PASSWORD FORM -->
                    <form class="forget-form" action="javascript:;" method="post">
                        <h3 class="font-green"><?php echo lang("login_Forgot_Password"); ?></h3>
                        <p> <?php echo lang("login_Enter_your_e_mail"); ?> </p>

                        <div class="form-group">
                            <input class="form-control placeholder-no-fix form-group" type="text" id="email_forgetpwd"
                                   autocomplete="off" placeholder="Email" name="email"/>
                        </div>

                        <div class="note success font-green" id="email_notification"
                             style="display:none;background-color:#ecf0f1;"></div>

                        <div class="form-actions">
                            <button type="button" id="back-btn"
                                    class="btn green btn-outline"><?php echo lang("login_Back"); ?></button>
                            <button type="button" onclick="sendPassword();" id="forgetpwd_email"
                                    class="btn btn-success uppercase pull-right"><?php echo lang("login_Submit"); ?>
                            </button>
                        </div>
                    </form>
                    <!-- END FORGOT PASSWORD FORM -->
                </div>
                <div class="login-footer">
                    <div class="row bs-reset">
                        <div class="col-xs-5 bs-reset">
                            <ul class="login-social">

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
//load the js function
if (isset($js_function)) {
    foreach ($js_function as $js) {
        $js = $js . '.js';
        ?>

        <script src="<?php echo base_url(); ?>assets/apps/<?php echo $js; ?>"></script>

        <?php
    }
}
?>
<script type="text/javascript">

    function sendPassword() {
        var dataString = "email=" + $.trim($("#email_forgetpwd").val());
        $.ajax({
            type: "POST",
            url: base_url + "/index.php/VerifyLogin/getNewPassword/",
            data: dataString,
            cache: false,

            success: function (data, textStatus, jqXHR) {
                alert(data);
                $("#email_notification").html("<strong>Password Change Offer has been sent to your email address</strong>").fadeIn(100);
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
        return false;
    }
</script>
