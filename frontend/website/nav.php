<div class="header">
    <div class="header-left active">
        <a href="index.php" class="logo">
            <img src="assets/img/logo.png" alt="">
        </a>
        <a href="index.php" class="logo-small">
            <img src="assets/img/logo-small.png" alt="">
        </a>
    </div>

    <a id="mobile_btn" class="mobile_btn" href="#sidebar">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>
    <?php if (!isLogin()) { ?>
        <ul class="nav user-menu">
            <li class="nav-item dropdown has-arrow main-drop">
                <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                    <span class="user-img"><img src="assets/img/avt.jpg" alt=""><span class="status online"></span></span>
                </a>
                <div class="dropdown-menu menu-drop-user">
                    <a class="dropdown-item" href="<?=hUrl('Login')?>">Login</a>
                    <a class="dropdown-item" href="<?=hUrl('Register')?>">Register</a>
                    <!-- <a class="dropdown-item logout pb-0" href="logout.php">Logout</a> -->
                </div>
            </li>
        </ul>
    <?php } else { ?>
        <ul class="nav user-menu">
            <li class="nav-item dropdown has-arrow main-drop">
                <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                    <span class="user-img"><img src="<?=$userinfo['Avt']?>" alt=""><span class="status online"></span></span>
                </a>
                <div class="dropdown-menu menu-drop-user">
                    <a class="dropdown-item" href="<?=hUrl(url: 'Profile')?>">My Profile</a>
                    <a class="dropdown-item logout pb-0" href="<?=hUrl(url: 'Logout')?>">Logout</a>
                </div>
            </li>
        </ul>
    <?php } ?>
</div>
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="active"><a href="<?=hUrl('Home')?>"><span> Dashboard</span></a></li>
                <li><a href="<?=hUrl('Profile')?>">API Key</a></li>
                <li><a href="<?=hUrl('SearchAPI')?>">API Youtube Search</a></li>
                <li><a href="<?=hUrl('MusicAPI')?>">API Get Music</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="page-header">
                <div class="page-title">
                    <h4><?= $title_page ?></h4>
                    <h6><?= $des_page ?></h6>
                </div>
            </div>