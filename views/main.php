<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Customers</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
      .blue_text {
          color: cadetblue;    
      }
      .red_text {
          color: indianred;
      }
      .center-table {
          margin: 0 auto;
          width:  80%;
          text-align: center;
      }
    </style>

</head>
<body>
	<nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo ROOT_URL; ?>">Customers</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo ROOT_URL; ?>">Home</a></li>
            <li><a href="<?php echo ROOT_URL; ?>billing">Billing</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <?php if(isset($_SESSION['is_logged_in'])) : ?>
            <li><a href="<?php echo ROOT_URL; ?>">Welcome <?php echo $_SESSION['user_data']['name']; ?></a></li>
            <li><a href="<?php echo ROOT_URL; ?>users/logout">Logout</a></li>
          <?php else : ?>
            <li><a href="<?php echo ROOT_URL; ?>users/login">Login</a></li>
            <li><a href="<?php echo ROOT_URL; ?>users/register">Register</a></li>
          <?php endif; ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
    
     <div class="row">
         <?php if (isset($_SESSION['is_logged_in'])): ?>
     	   <?php     require($view); ?>
         <?php elseif( isset($_SERVER['REQUEST_URI']) && 
                       basename($_SERVER['REQUEST_URI'] ) == "login"
                     ) : ?>
                
         <h2> logging in now!</h2>    
         <?php require($view);?>
         <?php else : ?>
         <div class="panel panel-default">
            <div class="panel-body">
             <h2 class='text-center'> please log in.</h2>
            </div>
        </div>
         <?php endif; ?>
     </div>

    </div><!-- /.container -->
</body>
</html>
