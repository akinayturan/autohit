<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-hand-peace-o font-blue-sharp"></i>
            <span class="caption-subject font-blue-sharp bold uppercase">Register - <?php echo lang("welcome"); ?></span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="row">
            <div class="col-md-12">
                <form id="form_sample_4" class="form-horizontal">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-2">Username</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="Enter Name.."
                                       name="userName" id="userName">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2"> Email address </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control"
                                       placeholder="Enter Mail Adress.."
                                       name="e_mail_member" id="e_mail_member">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2"> Password </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="Enter Password.."
                                       name="password_member" id="password_member">
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <button class="btn blue btn-block">New Member</button>

                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

    function insertNewMember() {

        var userName = document.getElementById("userName").value;
        var userSurname = document.getElementById("userSurname").value;
        var e_mail_member = document.getElementById("e_mail_member").value;
        var password_member = document.getElementById("password_member").value;

        var dataString = "user_name=" + userName + "&user_surname=" + userSurname + "&e_mail=" + e_mail_member + "&password=" + password_member;

        $.ajax({
            type: "POST",
            url: base_url + "/index.php/Register/insertFreelancer",
            data: dataString,
            cache: false,
            success: function (result) {

                alert("Basarili");
            }
        });


    }

    function insertNewFirm() {

        var firmName = document.getElementById("firmName").value;
        var userName = document.getElementById("userName_firm").value;
        var userSurname = document.getElementById("userSurname_firm").value;
        var e_mail_member = document.getElementById("e_mail_firm").value;
        var password_member = document.getElementById("password_firm").value;

        var dataString = "firm_name=" + firmName + "&user_name=" + userName + "&user_surname=" + userSurname + "&e_mail=" + e_mail_member + "&password=" + password_member;

        $.ajax({
            type: "POST",
            url: base_url + "/index.php/Register/insertFirm",
            data: dataString,
            cache: false,
            success: function (result) {

                alert("Basarili Firma");
            }
        });


    }

</script>
