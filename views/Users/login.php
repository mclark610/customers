<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <?php file_put_contents($_SERVER['DOCUMENT_ROOT']."/log/test.log","UsersView:login: " . "users/login.php\n",FILE_APPEND);?>
        <?php file_put_contents($_SERVER['DOCUMENT_ROOT']."/log/test.log","UsersView:login: PHP_SELF: " . $_SERVER['PHP_SELF']."\n",FILE_APPEND);?>

        <!--<form class="form-signin" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" > -->
            <form class="form-signin" action="?controller=Users&views=login" method="POST">
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Sign in</h1>
            <input type="email" id="email" class="form-control" placeholder="Email address" required="" autofocus="">
            <input type="password" id="password" class="form-control" placeholder="Password" required="">

            <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Sign in</button>
            <a href="#" id="forgot_pswd">Forgot password?</a>
            <hr>
        </form>
    </div>

    <div class="col-sm-4"></div>
<div class="row">
    <div class="col-sm-12"></div>
</div>
