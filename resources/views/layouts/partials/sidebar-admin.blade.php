<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" style="background: hsl(204, 57%, 51%) !important">
        <img class="img-profile" src="<?php echo url('/'); ?>/images/logo.png" style="height: 65px;width: 65px;">
        
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('admin') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
          <!--  <li class="nav-item active">
        <a class="nav-link" href="{{ url('admin/income-settings') }}">
          <i class="far fa-money-bill-alt"></i>
          <span>Income Settings</span></a>
      </li> -->

            <li class="nav-item active">
        <a class="nav-link" href="{{ url('admin/users') }}">
          <i class="fas fa-user-tie"></i>
          <span>All Users</span></a>
      </li>

            <li class="nav-item active">
        <a class="nav-link" href="{{ url('admin/payouts') }}">
          <i class="fas fa-sort-amount-down-alt"></i>
          <span>Payout</span></a>
      </li>

            <li class="nav-item active">
        <a class="nav-link" href="{{ url('admin/payment-methods') }}">
         <i class="fas fa-cog"></i>
          <span>Payment Method</span></a>
      </li>

            <li class="nav-item active">
        <a class="nav-link" href="{{ url('admin/product-orders') }}">
          <i class="fas fa-donate"></i>
          <span>Product Order</span></a>
      </li>

            <li class="nav-item active">
        <a class="nav-link" href="{{ url('admin/products') }}">
          <i class="fas fa-suitcase-rolling"></i>
          <span>Product List</span></a>
      </li>

            <li class="nav-item active">
        <a class="nav-link" href="{{ url('admin/incentive-settings') }}">
         <i class="fas fa-plane-departure"></i>
          <span>Incentive Settings</span></a>
      </li>

          <li class="nav-item active">
        <a class="nav-link" href="{{ url('admin/incentive-qualifier') }}">
          <i class="fas fa-mobile-alt"></i> 
          <span>Incentive Qualifier</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="{{ url('admin/account-upgrade') }}">
          <i class="fas fa-cart-plus"></i>
          <span>Account Upgrade</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="{{ url('admin/video-tutorial') }}">
          <i class="fas fa-user-friends"></i>
          <span>Video Tutorial</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="{{ url('admin/vip-training') }}">
          <i class="far fa-thumbs-up"></i>
          <span>VIP Training</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="{{ url('admin/announcements') }}">
          <i class="far fa-thumbs-up"></i>
          <span>Announcements</span></a>
      </li>



    

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->