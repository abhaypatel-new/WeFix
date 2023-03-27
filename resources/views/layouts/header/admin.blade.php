<header class="main-header">
	<div class="d-flex align-items-center logo-box justify-content-start">
		<a href="#" class="waves-effect waves-light nav-link d-none d-md-inline-block mx-10 push-btn bg-transparent text-white" data-toggle="push-menu" role="button">
			<span class="icon-Align-left"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
		</a>	
		<!-- Logo -->
		<a href="{{url('admin/dashboard')}}" class="logo">
		  <!-- logo-->
		  <div class="logo-lg">
			  <span class="light-logo"><img src="{{ asset('images/services-icon-png-2296.png')}}" alt="logo" height="60"></span>
			  <span class="dark-logo"><img src="{{ asset('images/logo-dark-text.png')}}" alt="logo"></span>
		  </div>
		</a>	
	</div>  
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
	  <div class="app-menu">
		<ul class="header-megamenu">
			
		
		</ul> 
	  </div>
		
      <div class="navbar-custom-menu ">
        <ul class="nav navbar-nav">	
		
	
		  <!-- Notifications -->
		  <li class="dropdown user user-menu">
          <a href="#" class="waves-effect waves-light dropdown-toggle" data-bs-toggle="dropdown" title="User">
				<i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
            </a>
            <ul class="dropdown-menu animated flipInX">
              <li class="user-body">
				 <a class="dropdown-item" href="{{url('admin/view')}}"><i class="ti-user text-muted me-2"></i> Profile</a>
				 <div class="dropdown-divider"></div>
				 <a class="dropdown-item" href="{{ url('admin/logout')}}"><i class="ti-lock text-muted me-2"></i> Logout</a>
              </li>
            </ul>
		  </li>	
		        
			
        </ul>
      </div>
    </nav>
  </header>