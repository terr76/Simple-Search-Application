<?php 
$this->layout('template', [
    'title'             => 'Register',
    'user_logged_in'    => null
]) 
?>

<div class="container">
    <div class="row">
        <?=$message?>
        <div class='col-md-3'></div>
        <div class="col-md-6">
            <div class="login-box well">
                <form action="/register/adduser" method="post">
                    <legend>Register</legend>
                    <div class="form-group">
                        <label for="useremail">E-mail</label>
                        <input name="email" id="useremail" placeholder="E-mail" type="email" pattern="(.*){3,64}" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label for="username">Name</label>
                        <input name="name" id="username" placeholder="Name" type="text" pattern="[a-zA-Z0-9]{2,64}" class="form-control" required />
                    </div>                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" name="password" placeholder="Password" type="password" class="form-control" required />
                    </div>

                    <div class="form-group">
                        <label for="password_repeat">Password Repeat</label>
                        <input id="password_repeat" name="password_repeat" placeholder="Password Repeat" type="password" class="form-control" required />
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-default btn-login-submit btn-block m-t-md" name="submit_add_user" value="Register" />
                    </div>

                </form>
            </div>
        </div>
        <div class='col-md-3'></div>
    </div>
</div>