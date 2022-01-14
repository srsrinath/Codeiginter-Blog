 <!-- Navigation-->
 <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
     <div class="container px-4 px-lg-5">
         <a class="navbar-brand" href="index.html">Simple Blog Site</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
             Menu
             <i class="fas fa-bars"></i>
         </button>
         <div class="collapse navbar-collapse" id="navbarResponsive">
             <?php if (session()->get('loggedUser')) : ?>
                 <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
                     <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?= base_url('/'); ?>">Home</a></li>
                     <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?= base_url('/about'); ?>">About</a></li>
                     <!-- <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="post.html">User Posts</a></li> -->
                     <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?= base_url('/contact'); ?>">Contact</a></li>
                     </li>
                     </ul>

                 </ul>
                 
                     <ul class="navbar-nav  py-4  py-lg-0">
                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" 
                         aria-expanded="false"><?= session()->get('name') ?></a>
                         <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                             <li><a class="dropdown-item" href="<?= base_url('/dashboard') ?>">Dashboard</a></li>
                             <li><a class="dropdown-item" href="<?= base_url('/profile') ?>">Profile</a></li>
                             <li><a class="dropdown-item" href="<?= base_url('/changepassword') ?>">Change Password</a></li>
                             <li><a class="dropdown-item" href="<?= base_url('/logout') ?>">Logout</a></li>
                     </li>
                     </ul>
                 </ul>
                 
             <?php else : ?>
                 <ul class="navbar-nav ms-auto py-4 py-lg-0">
                     <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?= base_url('/'); ?>">Home</a></li>
                     <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?= base_url('/about'); ?>">About</a></li>
                     <!-- <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="post.html">Sample Post</a></li> -->
                     <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?= base_url('/contact'); ?>">Contact</a></li>
                     <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?= base_url('/login'); ?>">Login</a></li>
                     <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?= base_url('/register'); ?>">Register</a></li>
                 </ul>
         </div>
     <?php endif; ?>
     </div>
 </nav>