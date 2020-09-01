<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-20 p-r-20 p-t-25 p-b-25">
            <form id="fLogin" action="<?php echo site_url('auth/login'); ?>"
                class="login100-form validate-form flex-sb flex-w"></form>

            <span class="login100-form-title p-b-25">
                <img class="img-header" src="<?php echo base_url('assets/login/images/'); ?>login-logo.png" alt="">
            </span>

            <span class="login100-form-title p-b-28 text-center">
                Kanaya
            </span>

            <span class="txt1 p-b-11">
                Username
            </span>
            <div id="validusrname" class="wrap-input100 validate-input m-b-36" data-validate="Username is required">
                <span class="btn-show-character">
                    <i class="fa fa-user"></i>
                </span>
                <input form="fLogin" id="fLoginUser" class="input100" type="text" name="nama"
                    placeholder="Ex: administrator">
                <span class="focus-input100"></span>
            </div>

            <span class="txt1 p-b-11">
                Password
            </span>
            <div id="validpass" class="wrap-input100 validate-input m-b-12" data-validate="Password is required">
                <span class="btn-show-character">
                    <i class="fa fa-key"></i>
                </span>
                <span class="btn-show-pass">
                    <i class="fa fa-eye"></i>
                </span>
                <input form="fLogin" id="fLoginPassword" class="input100" type="password" name="kata_sandi"
                    placeholder="Ex: admin12345">
                <span class="focus-input100"></span>
            </div>

            <div class="flex-sb-m w-full p-b-48">
                <div class="contact100-form-checkbox">
                    <input class="input-checkbox100" id="remember_me" type="checkbox" name="remember-me">
                    <label class="label-checkbox100" for="remember_me">
                        Remember me
                    </label>
                </div>

                <div>
                    <a href="javascript:void(0)" class="txt3">
                        Forgot Password?
                    </a>
                </div>
            </div>

            <div class="container-login100-form-btn">
                <button form="fLogin" type="submit" id="btnLogin" class="login100-form-btn">
                    Login
                </button>
            </div>

        </div>
    </div>
</div>