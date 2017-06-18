<?=$message?>
<div class="login-box well">
    <form action="/login/login" method="post">
        <legend>Sign In</legend>
        <div class="form-group">
            <label for="username-email">E-mail</label>
            <input name="email" id="username-email" placeholder="E-mail" type="email" pattern="(.*){3,64}"  class="form-control" required />
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" name="password" placeholder="Password" type="password" class="form-control" required />
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-default btn-login-submit btn-block m-t-md" name="Login" />
        </div>

        <input type="hidden" name="redirect" value="<?= urlencode($_SERVER['REQUEST_URI']) ?>" />

        <div class="form-group">
            <p class="text-center m-t-xs text-sm">Do not have an account?</p> 
            <a href="/register/" class="btn btn-default btn-block m-t-md">Create an account</a>
        </div>
    </form>
</div>