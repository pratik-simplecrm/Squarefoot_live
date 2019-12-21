<style>
{literal}
body {
    font-weight: 400;
    background: #F9F9F9;
    padding-top: 0px !important;
}
img#primarylogo {
    margin: 33px;
}
p.mainlogo {display: block;left: 0;right: 0;margin: 0 auto 45px auto;}

.md-form {
    position: relative;
    margin-bottom: 3.5rem;

}
.newlogin, .newform1{
    display: block;
    z-index: 999;
    position: relative;
  
    left: 50%;
    transform: translateX(-50%);
    width: 405px;
    padding: 36px 52px 11px 52px;
    background-color: #FFFFFF;
    
    box-shadow: 5px 5px 12px rgba(0, 0, 0, 0.3);
    margin-top: 40px;
}
.newform1{

    display: block;
    z-index: 999;
    position: relative;
    left: 50%;
    transform: translateX(-50%);
    width: 405px;
    background-color: #FFFFFF;
    padding: 11px 52px;
    box-shadow: none;
}
.md-form label {
    color: #676766;
    position: absolute;
    top: 11px;
    left: 0;
    font-size: 16px;
    font-weight: normal;
    cursor: text;
    -webkit-transition: .2s ease-out;
    -moz-transition: .2s ease-out;
    -o-transition: .2s ease-out;
    -ms-transition: .2s ease-out;
    transition: .2s ease-out;
}
input[type="password"], input[type="text"], textarea.md-textarea {
    background-color: transparent;
    border: none;
    border-bottom: 2px solid #ccc;
    border-radius: 0;
    outline: 0;
    height: 2.1rem;
    width: 100%;
    font-size: 1rem;
    box-shadow: none;
    -webkit-box-sizing: content-box;
    -moz-box-sizing: content-box;
    box-sizing: content-box;
    transition: all .3s;
}
.md-form.btn {
    display: flex;
    justify-content: center;
    margin: 2.5rem 0 1.5rem 0;
}

input.submit_button {
    font-size: .9rem;
    padding: .85rem 2.13rem;
    border-radius: 2px;
    border: 0;
    color: #fff !important;
    background: #0D2340 !important;
    width: 100%;
    font-family: verdana;
    font-size: 15px;
}
.md-form.text {
    text-align: center;
}
.md-form.text p > a {
    text-decoration: none;
    color: #676766;
}
input.submit_button:hover {
    background: #011228;
    border-color: #011228;
    box-shadow: 5px 5px 12px rgba(0, 0, 0, 0.3);
}
 #user_name:focus + label, #user_password:focus + label,#user_name:valid ~ label, #user_password:valid ~ label {

    color: #ea2c32;
    top: -50%;
    font-size: 12px;

}
 #user_name:focus, #user_password:focus, #fp_user_name:focus, #fp_user_mail :focus {
    border-bottom: 2px solid #ea2c32;
    border-top: none;
    border-left: none;
    border-right: none;

}
#fp_user_name:focus + label, #fp_user_mail:focus + label, #fp_user_name:valid ~ label, #fp_user_mail:valid ~ label{

    color: #ea2c32;
    top: -40%;
    font-size: 12px;
}


:focus:-webkit-input-placeholder, :focus::-moz-placeholder, :focus:-moz-placeholder, :focus:-ms-input-placeholder {
    color: #ea2c32;
    -webkit-text-fill-color: initial;
} 
#username, #password{
    color: #ea2c32;
    -webkit-text-fill-color: #ea2c32;
}
.md-form label.active {-webkit-transform: translateY(-140%);transform: translateY(-125%);}
@media (max-width: 1199px) {


.alert.alert-danger.fade.in {margin: -31px auto 0px auto !important;



}}
.message{

    width: 299px;
    margin: auto;

}
.newform {
    position: absolute;
    left: 50%; 
    -webkit-transform: translate(-50%, -50%);  
    transform: translate(-50%, -50%);   
}
#forgotpasslink {
    margin: 10px 0 20px 0;
    text-align: center;

}

{/literal}
</style>
<script type='text/javascript'>
var LBL_LOGIN_SUBMIT = '{sugar_translate module="Users" label="LBL_LOGIN_SUBMIT"}';
var LBL_REQUEST_SUBMIT = '{sugar_translate module="Users" label="LBL_REQUEST_SUBMIT"}';
var LBL_SHOWOPTIONS = '{sugar_translate module="Users" label="LBL_SHOWOPTIONS"}';
var LBL_HIDEOPTIONS = '{sugar_translate module="Users" label="LBL_HIDEOPTIONS"}';
</script>
<!-- Start login container -->
<!-- <img id="primarylogo" src="http://localhost/login/images/main-logo.png" />
 -->



<p>&nbsp;</p>
<span class="error message" id="browser_warning" style="width: 405px;  display:none">
      {sugar_translate label="WARN_BROWSER_VERSION_WARNING"}
</span>
                                    
<span class="error message" id="ie_compatibility_mode_warning" style="display:none">
      {sugar_translate label="WARN_BROWSER_IE_COMPATIBILITY_MODE_WARNING"}
</span>

{if $LOGIN_ERROR !=''}
   <p class="error message">{$LOGIN_ERROR}</p>
{if $WAITING_ERROR !=''}
   <p class="error message">{$WAITING_ERROR}</p>
                                               
{/if}
                                
{else}
  <p id='post_error message' class="error"></p>
                                   
{/if}
<div class="newlogin" id=""> 
<form class="login_form" action="#" method="post" name="DetailView" id="form1" onsubmit="return document.getElementById('cant_login').value == ''">
                <p align="center" class="mainlogo">

               <!--  <img src="http://localhost/login/images/main-logo.png" alt="Simple" style="margin: 5px 0;"> -->
                {$LOGIN_IMAGE}
                </p>
                                

                                <input type="hidden" name="module" value="Users">
                                <input type="hidden" name="action" value="Authenticate">
                                <input type="hidden" name="return_module" value="Users">
                                <input type="hidden" name="return_action" value="Login">
                                <input type="hidden" id="cant_login" name="cant_login" value="">
                                                                <input type="hidden" name="login_module" value="">
                                                                <input type="hidden" name="login_action" value="">
                                                                <input type="hidden" name="login_record" value="">
                                                                <input type="hidden" name="login_token" value="">
                                                                <input type="hidden" name="login_oauth_token" value="">
                                                                <input type="hidden" name="login_mobile" value="">
                                
                                
                <div class="md-form">
                            <input type="text" k7pdwid="3" tabindex="1" id="user_name" name="user_name" value="" style="width: 100%; padding: 0px 5px; font-size: 18px;" required>
                            <label class="active" for="user_name">Username</label>
                        </div>

                <div class="md-form">
                            <input type="password" k7pdwid="4" tabindex="2" id="user_password" name="user_password" value="" style="width: 100%; padding: 0px 5px;font-size: 18px;" required>
                           
                            <label class="active" for="user_password">Password</label>
                        </div>

                <!--<div class="md-form form-group">
                        <a href="" class="btn btn-primary btn-lg">Login</a>
                    </div>-->
                <div class="md-form">
                           <!--  <button class="submit_button" type="submit" value="LOGIN">Log In</button> -->

                           <input title="Log In" class="submit_button" type="submit" tabindex="3" id="login_button" name="Login" value="Log In">
                </div>


               
</form>
          <div class="newform1">
           <div id="forgotpasslink" style="cursor: pointer; display:{$DISPLAY_FORGOT_PASSWORD_FEATURE};" onclick='toggleDisplay("forgot_password_dialog");'>
            <a href='javascript:void(0)'>{sugar_translate module="Users" label="LBL_LOGIN_FORGOT_PASSWORD"}</a>
        </div>
            
            <form class="" role="form" action="index.php" method="post" name="DetailView" name="fp_form" id="fp_form" >
            <div id="forgot_password_dialog" style="display:none" >
                <input type="hidden" name="entryPoint" value="GeneratePassword">


                <span id="generate_success" class='error' style="display:inline;"></span>
               <p>&nbsp;</p>
                <p>&nbsp;</p>
               <div class="md-form">
                    
                    <input type="text" k7pdwid="3" tabindex="1" id="fp_user_name" name="fp_user_name"  value='{$LOGIN_USER_NAME}' style="margin-bottom: 0px; width: 100%; padding: 0px 5px;font-size: 18px;" required />
                     <label class="active" for="fp_user_name">{sugar_translate module="Users" label="LBL_USER_NAME"}</label>
                </div>
               
               <div class="md-form">
                   
                   
                    <input type="text" size='26' id="fp_user_mail" name="fp_user_mail"  value='' style="margin-bottom: 0px;width: 100%; padding: 0px 5px;font-size: 18px;" required>
                     <label class="active" for="fp_user_mail">{sugar_translate module="Users" label="LBL_EMAIL"}</label>
                </div>
                
                {$CAPTCHA}
                <div id='wait_pwd_generation'></div>
                 <div class="md-form">
                <input title="Email Temp Password" class="submit_button" type="button" onclick="validateAndSubmit(); return document.getElementById('cant_login').value == ''" id="generate_pwd_button" name="fp_login" value="{sugar_translate module="Users" label="LBL_LOGIN_SUBMIT"}">
                </div>

                 <!-- <input title="Log In" class="submit_button" type="submit" tabindex="3" id="login_button" name="Login" value="Log In"> -->

                 
            </div>
        </form>
            </div>
</div>
</div>


<!-- End login container 