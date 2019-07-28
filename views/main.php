<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Customers</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!--    <script src="https://code.jquery.com/jquery-1.3.1.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
            <li><a href="<?php echo ROOT_URL;?>">Home</a></li>

          <li><a href="https://cust.casualcoder.net/?controller=Transactions&action=index">Transactions</a></li>

          </ul>

          <ul class="nav navbar-nav navbar-right">
            <?php if(isset($_SESSION['is_logged_in'])) : ?>
            <li><a href="<?php echo ROOT_URL; ?>">Welcome <?php echo $_SESSION['user_data']['name']; ?></a></li>
            <li><a href="https://cust.casualcoder.net/?controller=Users&action=logout">Logout</a></li>
          <?php else : ?>
            <li><a href="https://cust.casualcoder.net/?controller=Users&action=login">Login eh</a></li>
            <li><a href="https://cust.casualcoder.net/?Users/register">Register</a></li>
          <?php endif; ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container">
     <div class="row">
       <!--
         <h2>Logged in: <?php echo isset($_SESSION['is_logged_in']) ?></h2>
         <h2>REQUEST_URI:isset <?php echo isset($_SERVER['REQUEST_URI']) ?></h2>
         <h2>REQUEST_URI:basename: <?php echo basename($_SERVER['REQUEST_URI']) ?></h2>
         <h2>REQUEST_URI: <?php echo $_SERVER['REQUEST_URI'] ?></h2>
         <h2>logged in<?php echo $_SESSION['user_data']['name']; ?></h2>
       -->
         <!-- Logged in? Proceed -->
         <?php if (isset($_SESSION['is_logged_in'])): ?>
     	    <?php      require($view); ?>
         <?php else : ?>
                <h1>LOGIN TO ME</h1>
                <?php require($view); ?>
         <?php endif; ?>
    </div><!-- /.container -->
</body>
</html>
