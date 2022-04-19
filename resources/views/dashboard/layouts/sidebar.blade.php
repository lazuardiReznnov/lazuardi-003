<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/') ? 'active' : '' }} " aria-current="page" href="/">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file"></span>
            Orders
          </a>
        </li>
      
      </ul>

      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>UNIT MANAGEMENT</span>
      </h6>
      <ul class="nav flex-column mb-2">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/units*') ? 'active' : '' }}" href="/dashboard/units">
            <span data-feather="grid"></span>
            UNIT LIST
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/unit/types*') ? 'active' : '' }}" href="/dashboard/unit/types">
            <span data-feather="grid"></span>
            TYPE UNIT LIST
          </a>
        </li>
      </ul>
    </div>
  </nav>