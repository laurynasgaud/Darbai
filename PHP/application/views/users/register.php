<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed-top justify-content-between">
    <div class="row">
      <a class="navbar-brand" href="index">
        Didziulkei dalykai
      </a>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo lang('language') ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="switchlang/lt">Lietuviu</a>
            <a class="dropdown-item" href="switchlang/en">English</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <?php echo validation_errors();?>
  <div class="container-fluid">
    <div class="row justify-content-md-center">
      <form method="post" accept-charset="utf-8">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="fname"><?php echo lang('fname') ?></label>
            <input id="fname" name="fname" type="text" class="form-control" placeholder="<?php echo lang('fname') ?>" required>
          </div>
          <div class="form-group col-md-6">
            <label for="lname"><?php echo lang('lname') ?></label>
            <input id="lname" name="lname" type="text" class="form-control" placeholder="<?php echo lang('lname') ?>" required>
          </div>
        </div>
        <div class="form-group">
          <label for="email"><?php echo lang('login_name') ?></label>
          <input name="login_name" type="text" class="form-control" id="email" placeholder="<?php echo lang('login_name') ?>@example.com" required>
        </div>
        <div class="form-group">
          <label for="<?php echo lang('password') ?>"><?php echo lang('password') ?></label>
          <input name="password1" type="text" class="form-control" id="<?php echo lang('password') ?>" placeholder="<?php echo lang('password') ?>" required>
          <input name="password2" type="text" class="form-control" id="<?php echo lang('password_again') ?>" placeholder="<?php echo lang('password_again') ?>" required>
        </div>
        <div class="form-row">
          <div class="col">
            <hr />
            <button name="submit" class="btn btn-outline-success btn-block" type="submit"><?php echo lang('register') ?></button>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
