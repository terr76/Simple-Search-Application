<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Spoonity Technical Coding Challenge</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom CSS -->
    <link href="<?php echo URL; ?>public/css/style.css" rel="stylesheet">    
  </head>

<body>

  <div class="container">
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
          echo '<div class="pull-right"><p>Welcome, '. $user_info .'</p></div>';
        } 
        ?>      
      </div>   
    </div>
