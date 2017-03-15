<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title" id='menuText'>Login</h2>
                </div>
                <div class="panel-body">
                  <?php echo "<img src='" . $page_logo . "' height='" . $logo_height . "' width='" . $logo_width . "' class='img-responsive center-block' style='padding-bottom:15px' alt='Logo'>"; ?>
                  <!-- Login Menu -->
                    <div id="loginbox">
                      <form role="form" method="POST">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Username" name="username" type="text" required autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" required>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                </label>
                            </div>
                            <input type="submit" value="Login" class="btn btn-lg btn-success btn-block">
                        </fieldset>
                        <!-- login / register toggle -->
                        <div class="form-group">
                          <div style="padding-top:10px; font-size:85%" >
                            Don't have an account?
                            <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show(); document.getElementById('menuText').innerHTML='Register'">
                                Sign Up Here
                            </a>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- Login Menu end -->

                    <!-- Signup Menu -->
                    <div id="signupbox" style="display:none">
                      <form role="form" method="POST">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Name" name="name" type="text" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Email" name="email" type="email" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Street" name="street" type="text" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="City" name="city" type="text" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Postcode" name="postcode" type="text" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Username" name="username" type="text" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Confirm Password" name="cpassword" type="password">
                            </div>
                            <input type="submit" value="Register" class="btn btn-lg btn-primary btn-block">
                        </fieldset>
                        <!-- login / register toggle -->
                        <div class="form-group">
                          <div style="padding-top:10px; font-size:85%" >
                            Already have an account?
                            <a href="#" onClick="$('#signupbox').hide(); $('#loginbox').show();  document.getElementById('menuText').innerHTML='Login'">
                                Login Here
                            </a>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- Signup Menu end -->

                  </div>
              </div>
        </div>
    </div>
</div>
