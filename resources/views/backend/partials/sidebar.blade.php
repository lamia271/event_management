<style>
  #sidebar {
    height: 100vh;
    background: #001f3f; /* Deep blue */
    border-right: 1px solid #dee2e6;
    padding-top: 1rem;
  }

  #sidebar .nav-link {
    color: #ffffffcc;
    font-weight: 500;
    padding: 0.75rem 1rem;
    border-radius: 0.375rem;
    transition: all 0.3s ease;
  }

  #sidebar .nav-link:hover,
  #sidebar .nav-link.active {
    background-color:rgb(95, 6, 36);
    color: white;
  }

  #sidebar .nav-link i {
    font-size: 1rem;
  }
</style>


<div id="sidebar" class="col-md-3 col-lg-2 d-flex flex-column p-0">
  <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
    <ul class="nav flex-column">

      <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.home.page') ? 'active' : '' }}" href="{{ route('admin.home.page') }}">
          <i class="bi bi-house-fill"></i> Home Page
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.event.list') ? 'active' : '' }}" href="{{ route('admin.event.list') }}">
          <i class="bi bi-calendar-event"></i> Events
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.package.list') ? 'active' : '' }}" href="{{ route('admin.package.list') }}">
          <i class="bi bi-box-seam"></i> Packages
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.food.list') ? 'active' : '' }}" href="{{ route('admin.food.list') }}">
          <i class="bi bi-basket"></i> Foods
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.decoration.list') ? 'active' : '' }}" href="{{ route('admin.decoration.list') }}">
          <i class="bi bi-stars"></i> Decorations
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.package.service.list') ? 'active' : '' }}" href="{{ route('admin.package.service.list') }}">
          <i class="bi bi-gear-wide-connected"></i> Package Services
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.booking') ? 'active' : '' }}" href="{{ route('admin.booking') }}">
          <i class="bi bi-journal-bookmark-fill"></i> Bookings
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.customize.food.list') ? 'active' : '' }}" href="{{ route('admin.customize.food.list') }}">
          <i class="bi bi-sliders"></i> Customize Foods
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.customize.decoration.list') ? 'active' : '' }}" href="{{ route('admin.customize.decoration.list') }}">
          <i class="bi bi-brush-fill"></i> Customize Decorations
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.customize.booking') ? 'active' : '' }}" href="{{ route('admin.customize.booking') }}">
          <i class="bi bi-calendar2-check"></i> Customize Bookings
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.customer.list') ? 'active' : '' }}" href="{{ route('admin.customer.list') }}">
          <i class="bi bi-people-fill"></i> Customers
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.appointment.details') ? 'active' : '' }}" href="{{ route('admin.appointment.details') }}">
          <i class="bi bi-clipboard-check"></i> Appointment
        </a>
      </li>

      <li class="nav-item mt-3">
        <a class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.logout') ? 'active' : '' }}" href="{{ route('admin.logout') }}">
          <i class="bi bi-door-closed-fill"></i> Log Out
        </a>
      </li>

    </ul>
  </div>
</div>
