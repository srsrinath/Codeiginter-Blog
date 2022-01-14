<div id="wrapper">
    <!-- Top Bar Start -->
    <div class="topbar">
        <!-- LOGO -->
        <div class="topbar-left"><a href="index.html" class="logo"><span><img src="<?=base_url('assets1/images/logo-light.png')?>" alt="" height="18"> </span><i><img src="assets1/images/logo-sm.png" alt="" height="22"></i></a></div>
        <nav class="navbar-custom">
            <ul class="navbar-right d-flex list-inline float-right mb-0">
                <li class="dropdown notification-list d-none d-sm-block">
                    <form role="search" class="app-search">
                        <div class="form-group mb-0"><input type="text" class="form-control" placeholder="Search..">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </li>

                <li class="dropdown notification-list">
                    <div class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdown" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                            <?= session()->get('type') ?></a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                            <!-- item--> <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5"></i> Profile</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="<?= base_url('/logout') ?>"><i class="mdi mdi-power text-danger"></i> Logout</a>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="list-inline menu-left mb-0">
                <li class="float-left"><button class="button-menu-mobile open-left waves-effect"><i class="mdi mdi-menu"></i></button></li>

            </ul>
        </nav>
    </div><!-- Top Bar End -->
    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
        <div class="slimscroll-menu" id="remove-scroll">
            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu" id="side-menu">
                    <li class="menu-title">Main</li>
                    <li><a href="<?= base_url('/dashboard'); ?>" class="waves-effect"><i class="mdi mdi-view-dashboard"></i>
                            <span>Dashboard</span></a>
                    </li>
                    <li><a href="javascript:void(0);" class="waves-effect"><i class="ion-person">
                            </i><span> Users <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span></span></a>
                        <ul class="submenu">
                            <li><a href="<?=base_url('/users')?>">Userslist</a></li>
                            <li><a href="<?=base_url('users/create')?>">Add User</a></li>
                        </ul>
                    </li>
                   
                    <li><a href="<?= base_url('/categories'); ?>" class="waves-effect"><i class="ion-clipboard"></i>
                            <span>Categories</span></a>
                    </li>
                    <li><a href="javascript:void(0);" class="waves-effect"><i class="ion-card"></i><span> Posts 
                        <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span></span></a>
                        <ul class="submenu">
                            <li><a href="/posts">Posts list</a></li>
                            <li><a href="/addPost">CreatePost</a></li>
                            <li><a href="/editPost">EditPost</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- Sidebar -->

            <div class="clearfix"></div>
        </div><!-- Sidebar -left -->
    </div><!-- Left Sidebar End -->
    <!-- ============================================================== -->
    <!-- Start right Content here -->

</div>