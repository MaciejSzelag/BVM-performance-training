<?php  include "includes/header.php" ;?>

        <div class="main-wrap">
            <div class="row">
                <div class="form-wrap">

                    <form action="includes/login.php" method="post">
                        <div class="form-title">
                            <h1>Sign in to your account</h1>
                        </div>
                        <div class="input-group">
                            <label for="">User Login</label>
                            <input type="text" name="user_login" placeholder="Your login" required>
                        </div>
                        <div class="input-group">
                            <label for="">Password</label>
                            <input type="password" name="user_password" placeholder="Password" required>
                        </div>
                        <div class="input-group">
                            <input type="submit" name="login">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include "includes/footer.php" ;?>
