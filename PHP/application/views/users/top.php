<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed-top justify-content-between">
  <div class="row">
    <div class="navbar-brand">
      Kazkas bus
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
      <?php echo($this->session->userdata('fname')) ?>
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href="profile"><i class="fas fa-user"></i> <?php echo lang('profile')?></a>
      <div class="dropdown-divider"></div>
      <a class="btn btn-danger btn-block" href="end" role="button"><?php echo lang('logout')?></a>
    </div>
  </div>
</nav>
