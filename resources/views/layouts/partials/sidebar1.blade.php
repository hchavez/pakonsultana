<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="background: hsl(195deg, 79%, 47%) !important">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" style="background: hsl(195deg, 79%, 47%) !important">
        <img class="img-profile" src="<?php echo url('/'); ?>/images/logo-front.jpg" style="height: 65px;width: 200px;">
        
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('dashboard') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
            <li class="nav-item">
        <a class="nav-link" href="{{ url('earn') }}">
          <i class="far fa-money-bill-alt"></i>
          <span>Earn Money</span></a>
      </li>

            <li class="nav-item">
        <a class="nav-link" href="{{ url('profile') }}">
          <i class="fas fa-user-tie"></i>
          <span>My Account</span></a>
      </li>

            <li class="nav-item ">
        <a class="nav-link" href="{{ url('monoline') }}">
          <i class="fas fa-sort-amount-down-alt"></i>
          <span>Monoline</span></a>
      </li>

            <li class="nav-item ">
        <a class="nav-link" href="{{ url('transactions') }}">
         <i class="fas fa-cog"></i>
          <span>Transactions</span></a>
      </li>

            <li class="nav-item ">
        <a class="nav-link" href="{{ url('withdraw') }}">
          <i class="fas fa-donate"></i>
          <span>Money Withdraw</span></a>
      </li>

            <li class="nav-item ">
        <a class="nav-link" href="{{ url('travel-portal') }}">
          <i class="fas fa-suitcase-rolling"></i>
          <span>Travel Portal</span></a>
      </li>

            <li class="nav-item ">
        <a class="nav-link" href="{{ url('travel-tours') }}">
         <i class="fas fa-plane-departure"></i>
          <span>Travel & Tours</span></a>
      </li>

          <li class="nav-item ">
        <a class="nav-link" href="{{ url('e-loading') }}">
          <i class="fas fa-mobile-alt"></i> 
          <span>E-Loading</span></a>
      </li>

      <li class="nav-item ">
        <a class="nav-link" href="{{ url('products') }}">
          <i class="fas fa-cart-plus"></i>
          <span>Products</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="{{ url('social') }}">
          <i class="fas fa-user-friends"></i>
          <span>Social</span></a>
      </li>

      <li class="nav-item ">
        <a class="nav-link" href="{{ url('incentives') }}">
          <i class="far fa-thumbs-up"></i>
          <span>Incentives</span></a>
      </li>

      <li class="nav-item ">
        <a class="nav-link" href="{{ url('video-tutorial') }}">
          <i class="fas fa-photo-video"></i>
          <span>Video Tutorial</span></a>
      </li>

      <li class="nav-item ">
        <a class="nav-link" href="{{ url('vip-trainings') }}">
         <i class="far fa-star"></i>
          <span>VIP Trainings</span></a>
      </li>


    

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar)
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>  -->

    </ul>
    <!-- End of Sidebar -->