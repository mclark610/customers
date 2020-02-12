<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Customers</title>
    <!--
    <script src="/assets/js/jquery-3.4.1.min.js"></script>
    -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css" />
    <link rel="stylesheet" href="<?php echo ROOT_URL;?>/assets/css/styles.css">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
      #test2 {
        width:80%;
        margin-left: 10%;
        margin-top:15%;
      }

    </style>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a id="customer" class="navbar-brand" href="<?php echo ROOT_URL; ?>">Customers</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <?php if(isset($_SESSION['is_logged_in'])) : ?>
            <li class="nav-item"><a class="nav-link" href="<?php echo ROOT_URL;?>/?controller=Transactions&action=index">Transactions<span class="sr-only">(current)</span></a></li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Metrics
               </a>

               <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                 <a class="dropdown-item" href="<?php echo ROOT_URL;?>/?controller=Metrics&action=reportYearly">Yearly Sales Report</a>
                 <a class="dropdown-item" href="<?php echo ROOT_URL;?>/?controller=Metrics&action=reportMonthly">Monthly Sales Report</a>
                 <!--
                 <a class="dropdown-item" href="<?php echo ROOT_URL;?>/?controller=Metrics&action=weekly">Weekly Sales Report</a>
               -->
                 <div class="dropdown-divider"></div>
               </div>
            </li>
          <?php else : ?>
            <li class="nav-item"><a class="nav-link disabled " href="<?php echo ROOT_URL;?>/?controller=Transactions&action=index">Transactions<span class="sr-only">(current)</span></a></li>
            <li class="nav-item"><a class="nav-link disabled " href="<?php echo ROOT_URL;?>/?controller=Metrics&action=index">Metrics<span class="sr-only">(current)</span></a></li>
          <?php endif; ?>

        </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <?php if(isset($_SESSION['is_logged_in'])) : ?>
            <li class="nav-item"><a class="nav-link" href="<?php echo ROOT_URL; ?>">Welcome <?php echo $_SESSION['user_data']['name']; ?></a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo ROOT_URL;?>Users/logout">Logout</a></li>
        <?php else : ?>
            <li class="nav-item"><a class="nav-link" href="<?php echo ROOT_URL;?>/?controller=Users&action=login">Login</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>

  <div class="container">
      <?php Messages::display(); ?>
      <?php require($view); ?>
 </div><!-- /.container -->

 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>

  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</body>
</html>
