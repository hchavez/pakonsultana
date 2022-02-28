<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('dashboard') }}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="{{ url('patients') }}">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Patients</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ url('billing') }}">
              <i class="ti-credit-card menu-icon"></i>
              <span class="menu-title">Billing</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ url('reports') }}">
              <i class="ti-bar-chart menu-icon" aria-hidden="true"></i>
              <span class="menu-title">Reports</span>
            </a>
          </li>

        </ul>
      </nav>