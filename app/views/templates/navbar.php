<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
  
      <div class="d-flex align-items-center justify-content-end">
        <img src="https://superapp.lpp.co.id/template/fe/assets/img/lpp_logo.png" style=" width:130px;" alt="">
        <a href="index.php" class="logo d-flex align-items-center">
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
      </div><!-- End Logo -->
  
   
  
      <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
          <li class="nav-item dropdown pe-3">
            <?php if (!isset($_SESSION['Login'])): ?>
              <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                <img src="<?= BASEURL ?>/img/user.png" alt="Profile" class="rounded-circle">
                <span class="d-none d-md-block dropdown-toggle ps-2"><?= $_SESSION['user'] ?></span>
              </a><!-- End Profile Image Icon -->
  
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <!--<li>-->
                  <!--<a class="dropdown-item d-flex align-items-center" href="<?= BASEURL ?>/master">-->
                <!--    <i class="bi bi-person"></i>-->
                <!--    <span>My Profile</span>-->
                <!--  </a>-->
                <!--</li>-->
                <!--<li>-->
                <!--  <hr class="dropdown-divider">-->
                <!--</li>-->
  
                <li>
                  <a class="dropdown-item d-flex align-items-center" href="<?= BASEURL ?>/settings">
                    <i class="bi bi-gear"></i>
                    <span>Account Settings</span>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
  
                <li>
                  <a class="dropdown-item d-flex align-items-center" href="<?= BASEURL ?>/help">
                    <i class="bi bi-question-circle"></i>
                    <span>Need Help?</span>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
  
                <li>
                  <a class="dropdown-item d-flex align-items-center" href="<?= BASEURL ?>/auth/logout">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Sign Out</span>
                  </a>
                </li>
              </ul><!-- End Profile Dropdown Items -->
            <?php else: ?>
              <a class="nav-link nav-profile d-flex align-items-center pe-0" href="<?= BASEURL ?>/auth/logout">
                <i class="bi bi-box-arrow-in-right"></i>
                <span class="d-none d-md-block ps-2">Logout</span>
              </a>
            <?php endif; ?>
          </li><!-- End Profile Nav -->
  
        </ul>
      </nav><!-- End Icons Navigation -->
  
    </header><!-- End Header -->
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
      <ul class="sidebar-nav" id="sidebar-nav">
      
        <li class="nav-item">
          <a class="nav-link <?= $data['judul'] == HOME ? '-' : 'collapsed' ?>" href="<?= BASEURL ?>/home">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
          </a>
        </li><!-- End Dashboard Nav -->
      
        <li class="nav-item">
          <a class="nav-link <?= $data['judul'] == TRANSAKSI ? '-' : 'collapsed' ?>" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>Transaction</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="forms-nav" class="nav-content collapse <?= $data['judul'] == TRANSAKSI ? 'show' : '' ?>" data-bs-parent="#sidebar-nav">
            <li>
              <a href="<?= BASEURL ?>/transaksi" class="<?= $data['judul'] == TRANSAKSI ? 'active' : '' ?>">
                <i class="bi bi-circle"></i><span>Daftar Transaction</span>
              </a>
            </li>
          </ul>
        </li><!-- End Forms Nav -->
      
        <li class="nav-item">
          <a class="nav-link <?=( $data['judul'] == CLIENT || $data['judul'] == PROJECT || $data['judul'] == KATEGORI) ? '' : 'collapsed' ?>" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-layout-text-window-reverse"></i><span>Data</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="tables-nav" class="nav-content collapse <?= ( $data['judul'] == CLIENT || $data['judul'] == PROJECT || $data['judul'] == KATEGORI) ? 'show' : '' ?>" data-bs-parent="#sidebar-nav">
            <li>
              <a href="<?= BASEURL ?>/data" class="<?= $data['judul'] == CLIENT ? 'active' : '' ?>">
                <i class="bi bi-circle"></i><span>Data Entitas</span>
              </a>
            </li>
            <li>
              <a href="<?= BASEURL ?>/data/project" class="<?= $data['judul'] == PROJECT ? 'active' : '' ?>">
                <i class="bi bi-circle"></i><span>Data Project</span>
              </a>
            </li>
            <li>
              <a href="<?= BASEURL ?>/data/kategori" class="<?= $data['judul'] == KATEGORI ? 'active' : '' ?>">
                <i class="bi bi-circle"></i><span>Kategori Project</span>
              </a>
            </li>
          </ul>
        </li> 
        <li class="nav-item">
          <a class="nav-link <?= $data['judul'] == OPERASIONAL ? '' : 'collapsed' ?>" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-bar-chart"></i><span>Operasional</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="charts-nav" class="nav-content collapse <?= $data['judul'] == OPERASIONAL ? 'show' : '' ?>" data-bs-parent="#sidebar-nav">
            <li>
              <a href="<?= BASEURL ?>/operasional" class="<?= $data['judul'] == OPERASIONAL ? 'active' : '' ?>">
                <i class="bi bi-circle"></i><span>Daftar Realisasi Project</span>
              </a>
            </li>
          </ul>
        </li><!-- End Charts Nav -->
      
        <li class="nav-item">
          <a class="nav-link <?= $data['judul'] == MASTER ? '' : 'collapsed' ?>" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-gem"></i><span>Master</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="icons-nav" class="nav-content collapse <?= $data['judul'] == MASTER ? 'show' : '' ?>" data-bs-parent="#sidebar-nav">
            <li>
              <a href="<?= BASEURL ?>/master" class="<?= $data['judul'] == MASTER ? 'active' : '' ?>">
                <i class="bi bi-circle"></i><span>User Setting</span>
              </a>
            </li>
          </ul>
        </li><!-- End Icons Nav -->
      
        <li class="nav-heading">Pages</li>
      
        <li class="nav-item">
          <a class="nav-link <?= ($view == 'logout') ? 'active' : 'collapsed' ?>" href="<?= BASEURL ?>/auth/logout">
            <i class="bi bi-box-arrow-in-right"></i>
            <span>Logout</span>
          </a>
        </li><!-- End Login Page Nav -->
      
      </ul>
    </aside><!-- End Sidebar-->
    

  <main id="main" class="main">

    <div class="pagetitle">
      <h1><?= $data['judul'] ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= BASEURL ?>">Home</a></li>
          <li class="breadcrumb-item active"><?= $data['method'] ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
