<?php
$title='Admin-Login';
    include 'header.php';

?>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Staff Registration</h3>
                        </div>
                        <div class="panel-body">
                            <form ><!--method="POST" action="./php/staff_registration_process.php"-->
                                <fieldset>
                                    <div class="form-group">
                                        <label>Full Name: </label>
                                        <input class="form-control" placeholder="Full Name" name="admin_fullName_in" id="admin_fullName_in" type="text" autofocus required>
                                    </div>

                                    <div class="form-group">
                                        <label>Username: </label>
                                        <input class="form-control" placeholder="Username" name = "admin_username_in" id="admin_username_in" type="text" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password: </label>
                                        <input class="form-control" placeholder="Password" name = "admin_password_in" id="admin_password_in" type="password" required>
                                    </div
                                    <div class="form-group">
                                        <label>Confirm Password: </label>
                                        <input class="form-control" placeholder="Confirm Password" name = "admin_confirm_password_in" id="admin_confirm_password_in" type="password" required>
                                    </div>

                                    <!-- Change this to a button or input when using this as a form -->
                                    <button class="btn btn-lg btn-success btn-block" type="button" onclick="register_admin()">Sign Up</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



   <?php
    include 'footer.php';
   ?>
