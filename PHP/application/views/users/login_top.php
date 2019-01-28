<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed-top justify-content-between">
  <div class="row">
    <div class="navbar-brand">
      Kazkas
    </div>
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
  <div class="dropdown">
    <button class="btn btn-primary btn-lg" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-bars fa-lg"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-right">
      <form method="post" accept-charset="utf-8" class="px-2 py-2">
        <div class="form-row">
          <div class="col">
            <label for="mail"><?php echo lang('login_name') ?></label>
            <input type="email" name="login_name" class="form-control" id="mail" placeholder="<?php echo lang('login_name') ?>@example.com">
          </div>
        </div>
        <div class="form-row">
          <div class="col">
            <label for="pass"><?php echo lang('password') ?></label>
            <input type="password" name="password" class="form-control" id="pass" placeholder="<?php echo lang('password') ?>">
          </div>
        </div>
        <button name="submit" class="btn btn-outline-success" type="submit"><?php echo lang('login') ?></button>
      </form>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="register"><?php echo lang('ask_if_new') ?></a>
      <a class="dropdown-item" href="#"><?php echo lang('forgot_pass') ?></a>
    </div>
  </div>
</nav>
