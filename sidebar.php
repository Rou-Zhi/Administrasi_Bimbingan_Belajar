<?php 
    $menu = isset($_GET['menu'])?$_GET['menu']:"";
    if($menu == "") { $m[1] = "active"; }
    if($menu == "mapel") { $m[2] = "active"; } 
    if($menu == "jadwal") { $m[3] = "active"; } 
    if($menu == "pengajar") { $m[4] = "active"; } 
    if($menu == "murid") { $m[5] = "active"; } 
    if($menu == "absensi") { $m[6] = "active"; } 
    if($menu == "spp") { $m[7] = "active"; } 
    if($menu == "laporan") { $m[8] = "active"; } 
?>


<div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Jhon Doe</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link <?=$m[1];?>"><i class="fa fa-home me-2"></i>Dashboard</a>

                    <a href="index.php?menu=mapel" class="nav-item nav-link <?=$m[2];?>"><i class="fa fa-book me-2"></i>Mata Pelajaran</a>

                    <a href="index.php?menu=jadwal" class="nav-item nav-link <?=$m[3];?>"><i class="fa fa-clipboard-list me-2"></i>Jadwal</a>
                    
                    <a href="index.php?menu=pengajar" class="nav-item nav-link <?=$m[4];?>"><i class="fa fa-fas fa-chalkboard-teacher me-2"></i>Pengajar</a>

                    <a href="index.php?menu=murid" class="nav-item nav-link <?=$m[5];?>"><i class="fa fa-users-cog me-2"></i>Murid</a>

                    <a href="index.php?menu=absensi" class="nav-item nav-link <?=$m[6];?>"><i class="fas fa-calendar-alt me-2"></i>Absensi</a>

                    <a href="index.php?menu=spp" class="nav-item nav-link <?=$m[7];?>"><i class="fas fa-money-bill-wave me-2"></i>SPP</a>

                    <a href="index.php?menu=laporan" class="nav-item nav-link <?=$m[8];?>"><i class="fas fa-file-alt me-2"></i>Laporan</a>
                    
                    <a href="#" class="nav-item nav-link" id="signout"><i class="fa fa-sign-out-alt me-2"></i>Sign Out</a>
                    <?php /*
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Elements</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="button.html" class="dropdown-item">Buttons</a>
                            <a href="typography.html" class="dropdown-item">Typography</a>
                            <a href="element.html" class="dropdown-item">Other Elements</a>
                        </div>
                    </div>
                    <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Widgets</a>
                    <a href="form.html" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Forms</a>
                    <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
                    <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item">Blank Page</a>
                        </div>
                    </div>
                    */ ?>
                </div>
            </nav>
        </div>