<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="\dashboard">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/product*') ? 'active' : '' }}" href="\dashboard\product">
            <span data-feather="box"></span>
            Products
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/category*') ? 'active' : '' }}" href="\dashboard\category">
            <span data-feather="clipboard"></span>
            Categories
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/team*') ? 'active' : '' }}" href="\dashboard\team">
            <span data-feather="user"></span>
            Team
          </a>
        </li>
      </ul>
      
    </div>
  </nav>