{{-- sidebar.blade.php --}}
<style>
  .active-link {
    font-weight: bold;
    background-color: rgba(13, 110, 253, 0.1); /* Light Bootstrap blue */
    border-left: 4px solid #0d6efd;
    color: #0d6efd !important;
    border-radius: 0 5px 5px 0;
  }

  .nav-link {
    color: #333;
    padding: 10px 15px;
    transition: background-color 0.2s ease;
  }

  .nav-link:hover {
    background-color: #e9ecef;
    border-radius: 0 5px 5px 0;
  }

  .sidebar {
    min-height: 100vh;
  }
</style>

<div id="sidebar" class="sidebar border-end col-md-3 col-lg-2 p-0 bg-light">
  <div class="offcanvas-body d-md-flex flex-column p-3 pt-lg-4 overflow-y-auto">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.home.page') ? 'active-link' : '' }}"
           href="{{ route('admin.home.page') }}">
          <i class="bi bi-house-fill"></i> Home
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.vendor.*') ? 'active-link' : '' }}"
           href="{{ route('admin.vendor.list') }}">
          <i class="bi bi-calendar-event"></i> Vendor
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.event.*') ? 'active-link' : '' }}"
           href="{{ route('admin.event.list') }}">
          <i class="bi bi-calendar-event"></i> Events
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.package.*') ? 'active-link' : '' }}"
           href="{{ route('admin.package.list') }}">
          <i class="bi bi-box"></i> Packages
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.food.*') ? 'active-link' : '' }}"
           href="{{ route('admin.food.list') }}">
          <i class="bi bi-cup-straw"></i> Foods
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.decoration.*') ? 'active-link' : '' }}"
           href="{{ route('admin.decoration.list') }}">
          <i class="bi bi-stars"></i> Decorations
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.package.service.*') ? 'active-link' : '' }}"
           href="{{ route('admin.package.service.list') }}">
          <i class="bi bi-gear-fill"></i> Package Services
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.booking') ? 'active-link' : '' }}"
           href="{{ route('admin.booking') }}">
          <i class="bi bi-journal-check"></i> Bookings
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.customize.food.*') ? 'active-link' : '' }}"
           href="{{ route('admin.customize.food.list') }}">
          <i class="bi bi-egg-fried"></i> Custom Foods
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.customize.decoration.*') ? 'active-link' : '' }}"
           href="{{ route('admin.customize.decoration.list') }}">
          <i class="bi bi-lamp"></i> Custom Decorations
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.customize.booking') ? 'active-link' : '' }}"
           href="{{ route('admin.customize.booking') }}">
          <i class="bi bi-calendar2-plus"></i> Custom Bookings
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.customer.*') ? 'active-link' : '' }}"
           href="{{ route('admin.customer.list') }}">
          <i class="bi bi-people-fill"></i> Customers
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('admin.appointment.*') ? 'active-link' : '' }}"
           href="{{ route('admin.appointment.details') }}">
          <i class="bi bi-clipboard-check"></i> Appointments
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2"
           href="{{ route('admin.logout') }}">
          <i class="bi bi-box-arrow-right"></i> Logout
        </a>
      </li>
    </ul>
  </div>
</div>
