      <div class="header">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="/">Home</a></li>
            <?php if(isset($user_logged_in) && $user_logged_in == '1') {
              echo '<li role="presentation"><a href="/login/logout">Logout</a></li>';
            } else {
              echo '<li role="presentation"><a href="/login">Login</a></li>';
            }
            ?>
          </ul>
        </nav>
        <h3 class="text-muted">Spoonity Technical Coding Challenge</h3>

        <div class="nav">
        <?php if(isset($user_logged_in) && $user_logged_in == '1') {
          echo '<div class="pull-right"><p>Welcome, '. $name .'</p></div>';
        } 
        ?>      
        </div>   
      </div>