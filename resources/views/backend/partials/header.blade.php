<header id="navbar" class="navbar p-0" style="background-color: #001f3f;">
  <a style="padding: 15px;" class="navbar-brand text-white" href="{{ route('admin.home.page') }}">Event Management System</a>
  @auth()
  <div class="col-md-1" style="margin-left: auto;">
      <a href="" style="color:white;">{{ auth()->user()->name }}</a>
  </div>
  @endauth
</header>

<style>
  #navbar {
    background-color: #001f3f; /* Deep blue */
    color: white;
    display: flex;
    justify-content: space-between; /* Spread items apart */
    align-items: center; /* Vertically center items */
    padding: 10px;
  }
  
  #navbar .navbar-brand {
    font-size: 1.5rem;
    font-weight: bold;
    text-align: center;
    margin: 0;
  }

  #navbar .nav-link {
    color: white;
  }

  #navbar .nav-link:hover {
    color: #ffcc00; /* Gold */
  }
</style>
