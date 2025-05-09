<header id="navbar" class="navbar bg-dark p-0 ">
  <a style="padding: 15px;" class="navbar-brand text-white" href="#">Event Management System  </a>
  @auth()
  <div class="col-md-1">
    
      <a href="" style="color:white;">{{auth()->user()->name}}</a>
   
  </div>
  
  @endauth
 
</header>