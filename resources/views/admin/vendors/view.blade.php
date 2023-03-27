<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">

    <title>EduAdmin - Dashboard  Profile </title>
  
	<!-- Vendors Style-->
	<link rel="stylesheet" href="css/vendors_css.css">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/skin_color.css">	


</head>
<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">
	<div id="loader"></div>

  <header class="main-header">
	<div class="d-flex align-items-center logo-box justify-content-start">
		<a href="#" class="waves-effect waves-light nav-link d-none d-md-inline-block mx-10 push-btn bg-transparent text-white" data-toggle="push-menu" role="button">
			<span class="icon-Align-left"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
		</a>	
		<!-- Logo -->
		<a href="index.html" class="logo">
		  <!-- logo-->
		  <div class="logo-lg">
			  <span class="light-logo"><img src="../images/logo-light-text.png" alt="logo"></span>
			  <span class="dark-logo"><img src="../images/logo-dark-text.png" alt="logo"></span>
		  </div>
		</a>	
	</div>  
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
	  <div class="app-menu">
		<ul class="header-megamenu nav">
			<li class="btn-group nav-item d-md-none">
				<a href="#" class="waves-effect waves-light nav-link push-btn" data-toggle="push-menu" role="button">
					<span class="icon-Align-left"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
			    </a>
			</li>
			<li class="btn-group nav-item d-none d-xl-inline-block">
				<a href="contact_app_chat.html" class="waves-effect waves-light nav-link svg-bt-icon" title="Chat">
					<i class="icon-Chat"><span class="path1"></span><span class="path2"></span></i>
			    </a>
			</li>
			<li class="btn-group nav-item d-none d-xl-inline-block">
				<a href="mailbox.html" class="waves-effect waves-light nav-link svg-bt-icon" title="Mailbox">
					<i class="icon-Mailbox"><span class="path1"></span><span class="path2"></span></i>
			    </a>
			</li>
			<li class="btn-group nav-item d-none d-xl-inline-block">
				<a href="extra_taskboard.html" class="waves-effect waves-light nav-link svg-bt-icon" title="Taskboard">
					<i class="icon-Clipboard-check"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
			    </a>
			</li>
		</ul> 
	  </div>
		
      <div class="navbar-custom-menu r-side">
        <ul class="nav navbar-nav">	
			<li class="btn-group nav-item d-lg-inline-flex d-none">
				<a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link full-screen" title="Full Screen">
					<i class="icon-Expand-arrows"><span class="path1"></span><span class="path2"></span></i>
			    </a>
			</li>	  
			<li class="btn-group d-lg-inline-flex d-none">
				<div class="app-menu">
					<div class="search-bx mx-5">
						<form>
							<div class="input-group">
							  <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
							  <div class="input-group-append">
								<button class="btn" type="submit" id="button-addon3"><i class="ti-search"></i></button>
							  </div>
							</div>
						</form>
					</div>
				</div>
			</li>
		  <!-- Notifications -->
		  <li class="dropdown notifications-menu">
			<a href="#" class="waves-effect waves-light dropdown-toggle" data-bs-toggle="dropdown" title="Notifications">
			  <i class="icon-Notifications"><span class="path1"></span><span class="path2"></span></i>
			</a>
			<ul class="dropdown-menu animated bounceIn">

			  <li class="header">
				<div class="p-20">
					<div class="flexbox">
						<div>
							<h4 class="mb-0 mt-0">Notifications</h4>
						</div>
						<div>
							<a href="#" class="text-danger">Clear All</a>
						</div>
					</div>
				</div>
			  </li>

			  <li>
				<!-- inner menu: contains the actual data -->
				<ul class="menu sm-scrol">
				  <li>
					<a href="#">
					  <i class="fa fa-users text-info"></i> Curabitur id eros quis nunc suscipit blandit.
					</a>
				  </li>
				  <li>
					<a href="#">
					  <i class="fa fa-warning text-warning"></i> Duis malesuada justo eu sapien elementum, in semper diam posuere.
					</a>
				  </li>
				  <li>
					<a href="#">
					  <i class="fa fa-users text-danger"></i> Donec at nisi sit amet tortor commodo porttitor pretium a erat.
					</a>
				  </li>
				  <li>
					<a href="#">
					  <i class="fa fa-shopping-cart text-success"></i> In gravida mauris et nisi
					</a>
				  </li>
				  <li>
					<a href="#">
					  <i class="fa fa-user text-danger"></i> Praesent eu lacus in libero dictum fermentum.
					</a>
				  </li>
				  <li>
					<a href="#">
					  <i class="fa fa-user text-primary"></i> Nunc fringilla lorem 
					</a>
				  </li>
				  <li>
					<a href="#">
					  <i class="fa fa-user text-success"></i> Nullam euismod dolor ut quam interdum, at scelerisque ipsum imperdiet.
					</a>
				  </li>
				</ul>
			  </li>
			  <li class="footer">
				  <a href="#">View all</a>
			  </li>
			</ul>
		  </li>	
		  
	      <!-- User Account-->
          <li class="dropdown user user-menu">
            <a href="#" class="waves-effect waves-light dropdown-toggle" data-bs-toggle="dropdown" title="User">
				<i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
            </a>
            <ul class="dropdown-menu animated flipInX">
              <li class="user-body">
				 <a class="dropdown-item" href="#"><i class="ti-user text-muted me-2"></i> Profile</a>
				 <a class="dropdown-item" href="#"><i class="ti-wallet text-muted me-2"></i> My Wallet</a>
				 <a class="dropdown-item" href="#"><i class="ti-settings text-muted me-2"></i> Settings</a>
				 <div class="dropdown-divider"></div>
				 <a class="dropdown-item" href="#"><i class="ti-lock text-muted me-2"></i> Logout</a>
              </li>
            </ul>
          </li>	
		  
          <!-- Control Sidebar Toggle Button -->
          <li>
              <a href="#" data-toggle="control-sidebar" title="Setting" class="waves-effect waves-light">
			  	<i class="icon-Settings"><span class="path1"></span><span class="path2"></span></i>
			  </a>
          </li>
			
        </ul>
      </div>
    </nav>
  </header>
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">	
	  	<div class="multinav">
		  <div class="multinav-scroll" style="height: 100%;">	
			  <!-- sidebar menu-->
			  <ul class="sidebar-menu" data-widget="tree">	
				<li class="header">Dashboard & Apps</li>
				<li class="treeview">
				  <a href="#">
					<i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
					<span>Dashboard</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="index.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Dashboard 1</a></li>
					<li><a href="index2.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Dashboard 2</a></li>
					<li><a href="index3.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Dashboard 3</a></li>
					<li><a href="index4.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Dashboard 4</a></li>
					<li><a href="index5.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Dashboard 5</a></li>
					<li><a href="index6.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Dashboard 6</a></li>
				  </ul>
				</li>
				<li class="treeview">
				  <a href="#">
					<i span class="icon-Layout-grid"><span class="path1"></span><span class="path2"></span></i>
					<span>Apps</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="extra_calendar.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Calendar</a></li>
					<li><a href="contact_app.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Contact List</a></li>
					<li><a href="contact_app_chat.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Chat</a></li>
					<li><a href="extra_taskboard.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Todo</a></li>
					<li><a href="mailbox.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Mailbox</a></li>
				  </ul>
				</li>
				<li class="header">Components & UI </li>
				<li class="treeview">
				  <a href="#">
					<i class="icon-Write"><span class="path1"></span><span class="path2"></span></i>
					<span>UI Elements</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">			
					<li><a href="ui_grid.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Grid System</a></li>								
					<li class="treeview">
						<a href="#">
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Card
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="box_cards.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>User Card</a></li>
							<li><a href="box_advanced.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Advanced Card</a></li>
							<li><a href="box_basic.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Basic Card</a></li>
							<li><a href="box_color.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Card Color</a></li>
							<li><a href="box_group.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Card Group</a></li>
						</ul>
					</li>
					<li><a href="ui_badges.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Badges</a></li>
					<li><a href="ui_border_utilities.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Border</a></li>
					<li><a href="ui_buttons.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Buttons</a></li>	
					<li><a href="ui_color_utilities.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Color</a></li>
					<li><a href="ui_dropdown.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Dropdown</a></li>
					<li><a href="ui_dropdown_grid.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Dropdown Grid</a></li>
					<li><a href="ui_progress_bars.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Progress Bars</a></li>					
					<li class="treeview">
						<a href="#">
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Icons
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="icons_fontawesome.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Font Awesome</a></li>
							<li><a href="icons_glyphicons.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Glyphicons</a></li>
							<li><a href="icons_material.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Material Icons</a></li>	
							<li><a href="icons_themify.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Themify Icons</a></li>
							<li><a href="icons_simpleline.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Simple Line Icons</a></li>
							<li><a href="icons_cryptocoins.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Cryptocoins Icons</a></li>
							<li><a href="icons_flag.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Flag Icons</a></li>
							<li><a href="icons_weather.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Weather Icons</a></li>
						</ul>
					</li>
					<li><a href="ui_ribbons.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Ribbons</a></li>
					<li><a href="ui_sliders.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Sliders</a></li>
					<li><a href="ui_typography.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Typography</a></li>
					<li><a href="ui_tab.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Tabs</a></li>
					<li><a href="ui_timeline.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Timeline</a></li>
					<li><a href="ui_timeline_horizontal.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Horizontal Timeline</a></li>
					<li class="treeview">
						<a href="#">
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Components
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="component_bootstrap_switch.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Bootstrap Switch</a></li>
							<li><a href="component_date_paginator.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Date Paginator</a></li>
							<li><a href="component_media_advanced.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Advanced Medias</a></li>
							<li><a href="component_rangeslider.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Range Slider</a></li>
							<li><a href="component_rating.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Ratings</a></li>
							<li><a href="component_animations.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Animations</a></li>
							<li><a href="extension_fullscreen.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Fullscreen</a></li>
							<li><a href="extension_pace.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pace</a></li>
							<li><a href="component_nestable.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Nestable</a></li>
							<li><a href="component_portlet_draggable.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Draggable Portlets</a></li>	
						</ul>
					</li>  
				  </ul>
				</li>			
				<li class="treeview">
				  <a href="#">
					<i class="icon-File"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
					<span>Forms & Tables</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
				  </a>					
				  <ul class="treeview-menu">					
					<li class="treeview">
						<a href="#">
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Forms
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="forms_advanced.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Form Elements</a></li>
							<li><a href="forms_general.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Form Layout</a></li>
							<li><a href="forms_wizard.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Form Wizard</a></li>	
							<li><a href="forms_validation.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Form Validation</a></li>
							<li><a href="forms_mask.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Formatter</a></li>
							<li><a href="forms_xeditable.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Xeditable Editor</a></li>
							<li><a href="forms_dropzone.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Dropzone</a></li>
							<li><a href="forms_code_editor.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Code Editor</a></li>
							<li><a href="forms_editors.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Editor</a></li>
							<li><a href="forms_editor_markdown.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Markdown</a></li>
						</ul>
					</li> 		
					<li class="treeview">
						<a href="#">
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Tables
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="tables_simple.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Simple tables</a></li>
							<li><a href="tables_data.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Data tables</a></li>
							<li><a href="tables_editable.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Editable Tables</a></li>
							<li><a href="tables_color.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Table Color</a></li>
						</ul>
					</li> 					
				  </ul>
				</li>
				<li class="treeview">
				  <a href="#">
					<i class="icon-Chart-pie"><span class="path1"></span><span class="path2"></span></i>
					<span>Charts</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="charts_chartjs.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>ChartJS</a></li>
					<li><a href="charts_flot.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Flot</a></li>
					<li><a href="charts_inline.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Inline charts</a></li>
					<li><a href="charts_morris.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Morris</a></li>
					<li><a href="charts_peity.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Peity</a></li>
					<li><a href="charts_chartist.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Chartist</a></li>
					<li><a href="charts_c3_axis.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Axis Chart</a></li>
					<li><a href="charts_c3_bar.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Bar Chart</a></li>
					<li><a href="charts_c3_data.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Data Chart</a></li>
					<li><a href="charts_c3_line.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Line Chart</a></li>
					<li><a href="charts_echarts_basic.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Basic Charts</a></li>
					<li><a href="charts_echarts_bar.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Bar Chart</a></li>
					<li><a href="charts_echarts_pie_doughnut.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pie & Doughnut Chart</a></li>
				  </ul>
				</li> 
				<li class="header">COLLECTIONS</li>
				<li class="treeview">
				  <a href="#">
					<i class="icon-Library"><span class="path1"></span><span class="path2"></span></i>
					<span>Widgets</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="widgets_blog.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Blog</a></li>
					<li><a href="widgets_chart.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Chart</a></li>
					<li><a href="widgets_list.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>List</a></li>
					<li><a href="widgets_social.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Social</a></li>
					<li><a href="widgets_statistic.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Statistic</a></li>
					<li><a href="widgets_weather.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Weather</a></li>
					<li><a href="widgets.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Widgets</a></li>
					<li><a href="email_index.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Emails</a></li>					  	
					<li class="treeview">
						<a href="#">
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Maps
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="map_google.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Google Map</a></li>
							<li><a href="map_vector.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Vector Map</a></li>
						</ul>
					</li>					  	
					<li class="treeview">
						<a href="#">
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Modals
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="component_modals.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Modals</a></li>
							<li><a href="component_sweatalert.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Sweet Alert</a></li>
							<li><a href="component_notification.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Toastr</a></li>
						</ul>
					</li>
				  </ul>
				</li> 				 
				<li class="treeview">
				  <a href="#">
					<i class="icon-Cart"><span class="path1"></span><span class="path2"></span></i>
					<span>Ecommerce</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="ecommerce_products.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Products</a></li>
					<li><a href="ecommerce_cart.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Products Cart</a></li>
					<li><a href="ecommerce_products_edit.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Products Edit</a></li>
					<li><a href="ecommerce_details.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Product Details</a></li>
					<li><a href="ecommerce_orders.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Product Orders</a></li>
					<li><a href="ecommerce_checkout.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Products Checkout</a></li>
				  </ul>
				</li>  		
				<li class="treeview">
				  <a href="#">
					<i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
					<span>Pages</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="invoice.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Invoice</a></li>
					<li><a href="invoicelist.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Invoice List</a></li>	
					<li><a href="extra_app_ticket.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Support Ticket</a></li>
					<li><a href="extra_profile.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>User Profile</a></li>
					<li><a href="contact_userlist_grid.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Userlist Grid</a></li>
					<li><a href="contact_userlist.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Userlist</a></li>	
					<li><a href="sample_faq.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>FAQs</a></li>
					<li><a href="sample_blank.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Blank</a></li>
					<li><a href="sample_coming_soon.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Coming Soon</a></li>
					<li><a href="sample_custom_scroll.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Custom Scrolls</a></li>
					<li><a href="sample_gallery.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Gallery</a></li>
					<li><a href="sample_lightbox.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Lightbox Popup</a></li>
					<li><a href="sample_pricing.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Pricing</a></li>
				  </ul>
				</li>
				<li class="header">LOGIN & ERROR </li>
				<li class="treeview">
				  <a href="#">
					<i class="icon-Chat-locked"><span class="path1"></span><span class="path2"></span></i>
					<span>Authentication</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="auth_login.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Login</a></li>
					<li><a href="auth_register.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Register</a></li>
					<li><a href="auth_lockscreen.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Lockscreen</a></li>
					<li><a href="auth_user_pass.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Recover password</a></li>	
				  </ul>
				</li>
				<li class="treeview">
				  <a href="#">
					<i class="icon-Chat-check"><span class="path1"></span><span class="path2"></span></i>
					<span>Miscellaneous</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="error_404.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Error 404</a></li>
					<li><a href="error_500.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Error 500</a></li>
					<li><a href="error_maintenance.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Maintenance</a></li>	
				  </ul>
				</li>	 	     
			  </ul>
		  </div>
		</div>
    </section>
	<div class="sidebar-footer">
		<a href="javascript:void(0)" class="link" data-bs-toggle="tooltip" title="Settings"><span class="icon-Settings-2"></span></a>
		<a href="mailbox.html" class="link" data-bs-toggle="tooltip" title="Email"><span class="icon-Mail"></span></a>
		<a href="javascript:void(0)" class="link" data-bs-toggle="tooltip" title="Logout"><span class="icon-Lock-overturning"><span class="path1"></span><span class="path2"></span></span></a>
	</div>
  </aside> 
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->	  
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h3 class="page-title">Profile</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Extra</li>
								<li class="breadcrumb-item active" aria-current="page">Profile</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>

		<!-- Main content -->
		<section class="content">

		  <div class="row">
			<div class="col-12 col-lg-7 col-xl-8">
				
			  <div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
				  <li><a href="#usertimeline" data-bs-toggle="tab">Timeline</a></li>
				  <li><a class="active" href="#activity" data-bs-toggle="tab">Activity</a></li>
				  <li><a href="#settings" data-bs-toggle="tab">Settings</a></li>
				</ul>

				<div class="tab-content">

				 <div class="tab-pane" id="usertimeline">
					<div class="publisher publisher-multi bg-white b-1 mb-30">
					  <textarea class="publisher-input auto-expand" rows="4" placeholder="Write something"></textarea>
					  <div class="flexbox">
						<div class="gap-items">
						  <span class="publisher-btn file-group">
							<i class="fa fa-image file-browser"></i>
							<input type="file">
						  </span>
						  <a class="publisher-btn" href="#"><i class="fa fa-map-marker"></i></a>
						  <a class="publisher-btn" href="#"><i class="fa fa-smile-o"></i></a>
						</div>

						<button class="btn btn-sm btn-bold btn-primary">Post</button>
					  </div>
					</div> 

					<div class="box b-1 no-shadow">
					  <div class="media bb-1 border-fade">
						<img class="avatar avatar-lg" src="../images/avatar/3.jpg" alt="...">
						<div class="media-body">
						  <p>
							<strong>Denial Webar</strong>
							<time class="float-end text-fade" datetime="2017">24 min ago</time>
						  </p>
						  <p><small>Designer</small></p>
						</div>
					  </div>

					  <div class="box-body bb-1 border-fade">
						<p class="lead">Authoritatively syndicate goal-oriented leadership skills for clicks-and-mortar outsourcing. Synergistically reconceptualize enabled catalysts for change.</p>

						<div class="gap-items-4 mt-10">
						  <a class="text-fade hover-light" href="#">
							<i class="fa fa-thumbs-up me-1"></i> 1254
						  </a>
						  <a class="text-fade hover-light" href="#">
							<i class="fa fa-comment me-1"></i> 25
						  </a>
						  <a class="text-fade hover-light" href="#">
							<i class="fa fa-share-alt me-1"></i> 12
						  </a>
						</div>
					  </div>


					  <div class="media-list media-list-divided bg-lighter">
						<div class="media">
						  <a class="avatar" href="#">
							<img src="../images/avatar/6.jpg" alt="...">
						  </a>
						  <div class="media-body">
							<p>
							  <a href="#"><strong>Rock Tele</strong></a>
							  <time class="float-end text-fade" datetime="2017-07-14 20:00">Just now</time>
							</p>
							<p>Uniquely enhance world-class channels with just in time schemas.</p>

							<div class="media px-0 mt-20">
							  <a class="avatar" href="#">
								<img src="../images/avatar/8.jpg" alt="...">
							  </a>
							  <div class="media-body">
								<p>
								  <a href="#"><strong>Brock Lensar</strong></a>
								  <time class="float-end text-fade" datetime="2017-07-14 20:00">26 mins ago</time>
								</p>
								<p>Thank you for your nice comment.</p>
							  </div>
							</div>

						  </div>
						</div>

						<div class="media">
						  <a class="avatar" href="#">
							<img src="../images/avatar/9.jpg" alt="...">
						  </a>
						  <div class="media-body">
							<p>
							  <a href="#"><strong>Tony Stark</strong></a>
							  <time class="float-end text-fade" datetime="2017-07-14 20:00">2 hours ago</time>
							</p>
							<p>Continually drive user friendly solutions through performance based infomediaries.</p>
						  </div>
						</div>
					  </div>

					  <form class="publisher bt-1 border-fade">
						<img class="avatar avatar-sm" src="../images/avatar/4.jpg" alt="...">
						<input class="publisher-input" type="text" placeholder="Add Your Comment">
						<a class="publisher-btn" href="#"><i class="fa fa-smile-o"></i></a>
						<span class="publisher-btn file-group">
						  <i class="fa fa-camera file-browser"></i>
						  <input type="file">
						</span>
					  </form>

					</div>


					<div class="box p-15"> 
						<div class="timeline timeline-single-column timeline-single-full-column">
							
							<span class="timeline-label">
								<span class="badge badge-info badge-pill">Images</span>
							</span>

							<div class="timeline-item">
								<div class="timeline-point timeline-point-success">
									<i class="fa fa-image"></i>
								</div>
								<div class="timeline-event">
									<div class="timeline-heading">
										<h4 class="timeline-title"><a href="#">Rakesh Kumar</a><small> uploaded new photos</small></h4>
									</div>
									<div class="timeline-body">
										<img src="../images/150x100.png" alt="..." class="m-10">
										<img src="../images/150x100.png" alt="..." class="m-10">
										<img src="../images/150x100.png" alt="..." class="m-10">
										<img src="../images/150x100.png" alt="..." class="m-10">
									</div>
									<div class="timeline-footer">
										<p class="text-end"><i class="fa fa-clock-o"></i> 8 days ago</p>
									</div>
								</div>
							</div>

							<div class="timeline-item">
								<div class="timeline-point timeline-point-info">
									<i class="ion ion-chatbubble-working"></i>
								</div>
								<div class="timeline-event">
									<div class="timeline-heading">
										<h4 class="timeline-title"><a href="#">Jone Doe</a><small> commented on your post</small></h4>
									</div>
									<div class="timeline-body">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus numquam facilis enim eaque, tenetur nam id qui vel velit similique nihil iure molestias aliquam, voluptatem totam quaerat, magni commodi quisquam.</p>									
									</div>
									<div class="timeline-footer">
										<a class="btn btn-success btn-sm" href="#">View comment</a>
										<p class="pull-right"><i class="fa fa-clock-o"></i> 8 days ago</p>
									</div>
								</div>
							</div>

							<div class="timeline-item">
								<div class="timeline-point timeline-point-danger">
									<i class="ion ion-ios-videocam"></i>
								</div>
								<div class="timeline-event">
									<div class="timeline-heading">
										<h4 class="timeline-title"><a href="#">Jone Doe</a><small> shared a video</small></h4>
									</div>
									<div class="timeline-body">
										<div class="ratio ratio-16x9">
											<iframe src="https://www.youtube.com/embed/k85mRPqvMbE" frameborder="0" allowfullscreen></iframe>
										</div>									
									</div>
									<div class="timeline-footer">
										<a class="btn btn-success btn-sm" href="#">View comment</a>
										<p class="pull-right"><i class="fa fa-clock-o"></i> 8 days ago</p>
									</div>
								</div>
							</div>

							<span class="timeline-label">
								<button class="btn btn-danger"><i class="fa fa-clock-o"></i></button>
							</span>
						</div>
					</div>  
				  </div>    
				  <!-- /.tab-pane -->

				  <div class="active tab-pane" id="activity">			

					<div class="box no-shadow">				
					<!-- Post -->
					<div class="post">
					  <div class="user-block">
						<img class="img-bordered-sm rounded-circle" src="../images/user1-128x128.jpg" alt="user image">
							<span class="username">
							  <a href="#">Brayden</a>
							  <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
							</span>
						<span class="description">5 minutes ago</span>
					  </div>
					  <!-- /.user-block -->
					  <div class="activitytimeline">
						  <p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum.
						  </p>
						  <ul class="list-inline">
							<li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
							<li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
							</li>
							<li class="pull-right">
							  <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
								(5)</a></li>
						  </ul>
						  <form class="form-element">
							  <input class="form-control input-sm" type="text" placeholder="Type a comment">
						 </form>
					  </div>
					</div>
					<!-- /.post -->

					<!-- Post -->
					<div class="post">
					  <div class="user-block">
						<img class="img-bordered-sm rounded-circle" src="../images/user6-128x128.jpg" alt="user image">
							<span class="username">
							  <a href="#">Evan</a>
							  <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
							</span>
						<span class="description">5 minutes ago</span>
					  </div>
					  <!-- /.user-block -->
					  <div class="activitytimeline">
						  <div class="row mb-20">
							<div class="col-sm-6">
							  <img class="img-fluid" src="../images/photo1.png" alt="Photo">
							</div>
							<!-- /.col -->
							<div class="col-sm-6">
							  <div class="row">
								<div class="col-sm-6">
								  <img class="img-fluid" src="../images/photo2.png" alt="Photo">
								  <br><br>
								  <img class="img-fluid" src="../images/photo3.jpg" alt="Photo">
								</div>
								<!-- /.col -->
								<div class="col-sm-6">
								  <img class="img-fluid" src="../images/photo4.jpg" alt="Photo">
								  <br><br>
								  <img class="img-fluid" src="../images/photo1.png" alt="Photo">
								</div>
								<!-- /.col -->
							  </div>
							  <!-- /.row -->
							</div>
							<!-- /.col -->
						  </div>
						  <!-- /.row -->

						  <ul class="list-inline">
							<li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
							<li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
							</li>
							<li class="pull-right">
							  <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
								(5)</a></li>
						  </ul>

						  <form class="form-element">
							  <input class="form-control input-sm" type="text" placeholder="Type a comment">
						 </form>
						</div>
					</div>
					<!-- /.post -->

					<!-- Post -->
					<div class="post clearfix">
					  <div class="user-block">
						<img class="img-bordered-sm rounded-circle" src="../images/user7-128x128.jpg" alt="user image">
							<span class="username">
							  <a href="#">Nicholas</a>
							  <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
							</span>
						<span class="description">5 minutes ago</span>
					  </div>
					  <!-- /.user-block -->
						<div class="activitytimeline">
						  <p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum.
						  </p>

						  <form class="form-horizontal form-element">
							<div class="form-group row g-0">
							  <div class="col-sm-9">
								<input class="form-control input-sm" placeholder="Response">
							  </div>
							  <div class="col-sm-3">
								<button type="submit" class="btn btn-danger pull-right w-p100">Send</button>
							  </div>
							</div>
						  </form>
						</div>
					</div>
					<!-- /.post -->
				   </div>

				  </div>
				  <!-- /.tab-pane -->

				  <div class="tab-pane" id="settings">		

					<div class="box no-shadow">		
						<form class="form-horizontal form-element col-12">
						  <div class="form-group row">
							<label for="inputName" class="col-sm-2 form-label">Name</label>

							<div class="col-sm-10">
							  <input type="email" class="form-control" id="inputName" placeholder="">
							</div>
						  </div>
						  <div class="form-group row">
							<label for="inputEmail" class="col-sm-2 form-label">Email</label>

							<div class="col-sm-10">
							  <input type="email" class="form-control" id="inputEmail" placeholder="">
							</div>
						  </div>
						  <div class="form-group row">
							<label for="inputPhone" class="col-sm-2 form-label">Phone</label>

							<div class="col-sm-10">
							  <input type="tel" class="form-control" id="inputPhone" placeholder="">
							</div>
						  </div>
						  <div class="form-group row">
							<label for="inputExperience" class="col-sm-2 form-label">Experience</label>

							<div class="col-sm-10">
							  <textarea class="form-control" id="inputExperience" placeholder=""></textarea>
							</div>
						  </div>
						  <div class="form-group row">
							<label for="inputSkills" class="col-sm-2 form-label">Skills</label>

							<div class="col-sm-10">
							  <input type="text" class="form-control" id="inputSkills" placeholder="">
							</div>
						  </div>
						  <div class="form-group row">
							<div class="ms-auto col-sm-10">
							  <div class="checkbox">
								<input type="checkbox" id="basic_checkbox_1" checked="">
								<label for="basic_checkbox_1"> I agree to the</label>
								  &nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Terms and Conditions</a>
							  </div>
							</div>
						  </div>
						  <div class="form-group row">
							<div class="ms-auto col-sm-10">
							  <button type="submit" class="btn btn-success">Submit</button>
							</div>
						  </div>
						</form>
					</div>			  
				  </div>
				  <!-- /.tab-pane -->
				</div>
				<!-- /.tab-content -->
			  </div>
			  <!-- /.nav-tabs-custom -->
			</div>
			<!-- /.col -->		

			  <div class="col-12 col-lg-5 col-xl-4">
				 <div class="box box-widget widget-user">
					<!-- Add the bg color to the header using any of the bg-* classes -->
					<div class="widget-user-header bg-img bbsr-0 bber-0" style="background: url('../images/gallery/full/10.jpg') center center;" data-overlay="5">
					  <h3 class="widget-user-username text-white">Michael Jorden</h3>
					  <h6 class="widget-user-desc text-white">Designer</h6>
					</div>
					<div class="widget-user-image">
					  <img class="rounded-circle" src="../images/user3-128x128.jpg" alt="User Avatar">
					</div>
					<div class="box-footer">
					  <div class="row">
						<div class="col-sm-4">
						  <div class="description-block">
							<h5 class="description-header">12K</h5>
							<span class="description-text">FOLLOWERS</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4 be-1 bs-1">
						  <div class="description-block">
							<h5 class="description-header">550</h5>
							<span class="description-text">FOLLOWERS</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4">
						  <div class="description-block">
							<h5 class="description-header">158</h5>
							<span class="description-text">TWEETS</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
					  </div>
					  <!-- /.row -->
					</div>
				  </div>
				  <div class="box">
					<div class="box-body box-profile">            
					  <div class="row">
						<div class="col-12">
							<div>
								<p>Email :<span class="text-gray ps-10">David@yahoo.com</span> </p>
								<p>Phone :<span class="text-gray ps-10">+11 123 456 7890</span></p>
								<p>Address :<span class="text-gray ps-10">123, Lorem Ipsum, Florida, USA</span></p>
							</div>
						</div>
						<div class="col-12">
							<div class="pb-15">						
								<p class="mb-10">Social Profile</p>
								<div class="user-social-acount">
									<button class="btn btn-circle btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></button>
									<button class="btn btn-circle btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></button>
									<button class="btn btn-circle btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></button>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div>
								<div class="map-box">
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2805244.1745767146!2d-86.32675167439648!3d29.383165774894163!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88c1766591562abf%3A0xf72e13d35bc74ed0!2sFlorida%2C+USA!5e0!3m2!1sen!2sin!4v1501665415329" width="100%" height="100" frameborder="0" style="border:0" allowfullscreen></iframe>
								</div>
							</div>
						</div>
					  </div>
					</div>
					<!-- /.box-body -->
				  </div>
				<div class="box">
					<div class="box-body">
						<div class="flexbox align-items-baseline mb-20">
						  <h6 class="text-uppercase ls-2">Friends</h6>
						  <small>20</small>
						</div>
						<div class="gap-items-2 gap-y">
						  <a class="avatar" href="#"><img src="../images/avatar/1.jpg" alt="..."></a>
						  <a class="avatar" href="#"><img src="../images/avatar/3.jpg" alt="..."></a>
						  <a class="avatar" href="#"><img src="../images/avatar/4.jpg" alt="..."></a>
						  <a class="avatar" href="#"><img src="../images/avatar/5.jpg" alt="..."></a>
						  <a class="avatar" href="#"><img src="../images/avatar/6.jpg" alt="..."></a>
						  <a class="avatar" href="#"><img src="../images/avatar/7.jpg" alt="..."></a>
						  <a class="avatar" href="#"><img src="../images/avatar/8.jpg" alt="..."></a>
						  <a class="avatar avatar-more" href="#">+15</a>
						</div>
					</div>
					<div class="box-footer">
						<a class="text-uppercase d-blockls-1 text-fade" href="#">Invite People</a>
					</div>
				</div>
				<div class="box box-inverse" style="background-color: #3b5998">
				  <div class="box-header no-border">
					<span class="fa fa-facebook fs-30"></span>
					  <div class="box-tools pull-right">
						<h5 class="box-title">Facebook feed</h5>
					  </div>
				  </div>

				  <blockquote class="blockquote blockquote-inverse no-border m-0 py-15">
					<p>Holisticly benchmark plug imperatives for multifunctional deliverables. Seamlessly incubate cross functional action.</p>
					<div class="flexbox">
					  <time class="text-white" datetime="2017-11-21 20:00">21 November, 2021</time>
					  <span><i class="fa fa-heart"></i> 75</span>
					</div>
				  </blockquote>
				</div>

			  </div>

		  </div>
		  <!-- /.row -->

		</section>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->
 

  <!-- Control Sidebar -->
  <aside class="control-sidebar">
	  
	<div class="rpanel-title"><span class="pull-right btn btn-circle btn-danger"><i class="ion ion-close text-white" data-toggle="control-sidebar"></i></span> </div>  <!-- Create the tabs -->
    <ul class="nav nav-tabs control-sidebar-tabs">
      <li class="nav-item"><a href="#control-sidebar-home-tab" data-bs-toggle="tab" class="active"><i class="mdi mdi-message-text"></i></a></li>
      <li class="nav-item"><a href="#control-sidebar-settings-tab" data-bs-toggle="tab"><i class="mdi mdi-playlist-check"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
          <div class="flexbox">
			<a href="javascript:void(0)" class="text-grey">
				<i class="ti-more"></i>
			</a>	
			<p>Users</p>
			<a href="javascript:void(0)" class="text-end text-grey"><i class="ti-plus"></i></a>
		  </div>
		  <div class="lookup lookup-sm lookup-right d-none d-lg-block">
			<input type="text" name="s" placeholder="Search" class="w-p100">
		  </div>
          <div class="media-list media-list-hover mt-20">
			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-success" href="#">
				<img src="../images/avatar/1.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="fs-16">
				  <a class="hover-primary" href="#"><strong>Tyler</strong></a>
				</p>
				<p>Praesent tristique diam...</p>
				  <span>Just now</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-danger" href="#">
				<img src="../images/avatar/2.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="fs-16">
				  <a class="hover-primary" href="#"><strong>Luke</strong></a>
				</p>
				<p>Cras tempor diam ...</p>
				  <span>33 min ago</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-warning" href="#">
				<img src="../images/avatar/3.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="fs-16">
				  <a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
				  <span>42 min ago</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-primary" href="#">
				<img src="../images/avatar/4.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="fs-16">
				  <a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
				  <span>42 min ago</span>
			  </div>
			</div>			
			
			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-success" href="#">
				<img src="../images/avatar/1.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="fs-16">
				  <a class="hover-primary" href="#"><strong>Tyler</strong></a>
				</p>
				<p>Praesent tristique diam...</p>
				  <span>Just now</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-danger" href="#">
				<img src="../images/avatar/2.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="fs-16">
				  <a class="hover-primary" href="#"><strong>Luke</strong></a>
				</p>
				<p>Cras tempor diam ...</p>
				  <span>33 min ago</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-warning" href="#">
				<img src="../images/avatar/3.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="fs-16">
				  <a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
				  <span>42 min ago</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-primary" href="#">
				<img src="../images/avatar/4.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="fs-16">
				  <a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
				  <span>42 min ago</span>
			  </div>
			</div>
			  
		  </div>

      </div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
          <div class="flexbox">
			<a href="javascript:void(0)" class="text-grey">
				<i class="ti-more"></i>
			</a>	
			<p>Todo List</p>
			<a href="javascript:void(0)" class="text-end text-grey"><i class="ti-plus"></i></a>
		  </div>
        <ul class="todo-list mt-20">
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_1" class="filled-in">
			  <label for="basic_checkbox_1" class="mb-0 h-15"></label>
			  <!-- todo text -->
			  <span class="text-line">Nulla vitae purus</span>
			  <!-- Emphasis label -->
			  <small class="badge bg-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
			  <!-- General tools such as edit or delete-->
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_2" class="filled-in">
			  <label for="basic_checkbox_2" class="mb-0 h-15"></label>
			  <span class="text-line">Phasellus interdum</span>
			  <small class="badge bg-info"><i class="fa fa-clock-o"></i> 4 hours</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_3" class="filled-in">
			  <label for="basic_checkbox_3" class="mb-0 h-15"></label>
			  <span class="text-line">Quisque sodales</span>
			  <small class="badge bg-warning"><i class="fa fa-clock-o"></i> 1 day</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_4" class="filled-in">
			  <label for="basic_checkbox_4" class="mb-0 h-15"></label>
			  <span class="text-line">Proin nec mi porta</span>
			  <small class="badge bg-success"><i class="fa fa-clock-o"></i> 3 days</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_5" class="filled-in">
			  <label for="basic_checkbox_5" class="mb-0 h-15"></label>
			  <span class="text-line">Maecenas scelerisque</span>
			  <small class="badge bg-primary"><i class="fa fa-clock-o"></i> 1 week</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_6" class="filled-in">
			  <label for="basic_checkbox_6" class="mb-0 h-15"></label>
			  <span class="text-line">Vivamus nec orci</span>
			  <small class="badge bg-info"><i class="fa fa-clock-o"></i> 1 month</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_7" class="filled-in">
			  <label for="basic_checkbox_7" class="mb-0 h-15"></label>
			  <!-- todo text -->
			  <span class="text-line">Nulla vitae purus</span>
			  <!-- Emphasis label -->
			  <small class="badge bg-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
			  <!-- General tools such as edit or delete-->
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_8" class="filled-in">
			  <label for="basic_checkbox_8" class="mb-0 h-15"></label>
			  <span class="text-line">Phasellus interdum</span>
			  <small class="badge bg-info"><i class="fa fa-clock-o"></i> 4 hours</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_9" class="filled-in">
			  <label for="basic_checkbox_9" class="mb-0 h-15"></label>
			  <span class="text-line">Quisque sodales</span>
			  <small class="badge bg-warning"><i class="fa fa-clock-o"></i> 1 day</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_10" class="filled-in">
			  <label for="basic_checkbox_10" class="mb-0 h-15"></label>
			  <span class="text-line">Proin nec mi porta</span>
			  <small class="badge bg-success"><i class="fa fa-clock-o"></i> 3 days</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
		  </ul>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
	
	<!-- ./side demo panel -->
	<div class="sticky-toolbar">	    
	    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="Buy Now" class="waves-effect waves-light btn btn-success btn-flat mb-5 btn-sm" target="_blank">
			<span class="icon-Money"><span class="path1"></span><span class="path2"></span></span>
		</a>
	    <a href="https://themeforest.net/user/multipurposethemes/portfolio" data-bs-toggle="tooltip" data-bs-placement="left" title="Portfolio" class="waves-effect waves-light btn btn-danger btn-flat mb-5 btn-sm" target="_blank">
			<span class="icon-Image"></span>
		</a>
	    <a id="chat-popup" href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="Live Chat" class="waves-effect waves-light btn btn-warning btn-flat btn-sm">
			<span class="icon-Group-chat"><span class="path1"></span><span class="path2"></span></span>
		</a>
	</div>
	<!-- Sidebar -->
	
	<div id="chat-box-body">
		<div id="chat-circle" class="waves-effect waves-circle btn btn-circle btn-lg btn-warning l-h-70">
            <div id="chat-overlay"></div>
            <span class="icon-Group-chat fs-30"><span class="path1"></span><span class="path2"></span></span>
		</div>

		<div class="chat-box">
            <div class="chat-box-header p-15 d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button class="waves-effect waves-circle btn btn-circle btn-primary-light h-40 w-40 rounded-circle l-h-45" type="button" data-bs-toggle="dropdown">
                      <span class="icon-Add-user fs-22"><span class="path1"></span><span class="path2"></span></span>
                  </button>
                  <div class="dropdown-menu min-w-200">
                    <a class="dropdown-item fs-16" href="#">
                        <span class="icon-Color me-15"></span>
                        New Group</a>
                    <a class="dropdown-item fs-16" href="#">
                        <span class="icon-Clipboard me-15"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
                        Contacts</a>
                    <a class="dropdown-item fs-16" href="#">
                        <span class="icon-Group me-15"><span class="path1"></span><span class="path2"></span></span>
                        Groups</a>
                    <a class="dropdown-item fs-16" href="#">
                        <span class="icon-Active-call me-15"><span class="path1"></span><span class="path2"></span></span>
                        Calls</a>
                    <a class="dropdown-item fs-16" href="#">
                        <span class="icon-Settings1 me-15"><span class="path1"></span><span class="path2"></span></span>
                        Settings</a>
                    <div class="dropdown-divider"></div>
					<a class="dropdown-item fs-16" href="#">
                        <span class="icon-Question-circle me-15"><span class="path1"></span><span class="path2"></span></span>
                        Help</a>
					<a class="dropdown-item fs-16" href="#">
                        <span class="icon-Notifications me-15"><span class="path1"></span><span class="path2"></span></span> 
                        Privacy</a>
                  </div>
                </div>
                <div class="text-center flex-grow-1">
                    <div class="text-dark fs-18">Mayra Sibley</div>
                    <div>
                        <span class="badge badge-sm badge-dot badge-primary"></span>
                        <span class="text-muted fs-12">Active</span>
                    </div>
                </div>
                <div class="chat-box-toggle">
                    <a id="chat-box-toggle" class="waves-effect waves-circle btn btn-circle btn-danger-light h-40 w-40 rounded-circle l-h-45" href="#">
                      <span class="icon-Close fs-22"><span class="path1"></span><span class="path2"></span></span>
                    </a>                    
                </div>
            </div>
            <div class="chat-box-body">
                <div class="chat-box-overlay">   
                </div>
                <div class="chat-logs">
                    <div class="chat-msg user">
                        <div class="d-flex align-items-center">
                            <span class="msg-avatar">
                                <img src="../images/avatar/2.jpg" class="avatar avatar-lg">
                            </span>
                            <div class="mx-10">
                                <a href="#" class="text-dark hover-primary fw-bold">Mayra Sibley</a>
                                <p class="text-muted fs-12 mb-0">2 Hours</p>
                            </div>
                        </div>
                        <div class="cm-msg-text">
                            Hi there, I'm Jesse and you?
                        </div>
                    </div>
                    <div class="chat-msg self">
                        <div class="d-flex align-items-center justify-content-end">
                            <div class="mx-10">
                                <a href="#" class="text-dark hover-primary fw-bold">You</a>
                                <p class="text-muted fs-12 mb-0">3 minutes</p>
                            </div>
                            <span class="msg-avatar">
                                <img src="../images/avatar/3.jpg" class="avatar avatar-lg">
                            </span>
                        </div>
                        <div class="cm-msg-text">
                           My name is Anne Clarc.         
                        </div>        
                    </div>
                    <div class="chat-msg user">
                        <div class="d-flex align-items-center">
                            <span class="msg-avatar">
                                <img src="../images/avatar/2.jpg" class="avatar avatar-lg">
                            </span>
                            <div class="mx-10">
                                <a href="#" class="text-dark hover-primary fw-bold">Mayra Sibley</a>
                                <p class="text-muted fs-12 mb-0">40 seconds</p>
                            </div>
                        </div>
                        <div class="cm-msg-text">
                            Nice to meet you Anne.<br>How can i help you?
                        </div>
                    </div>
                </div><!--chat-log -->
            </div>
            <div class="chat-input">      
                <form>
                    <input type="text" id="chat-input" placeholder="Send a message..."/>
                    <button type="submit" class="chat-submit" id="chat-submit">
                        <span class="icon-Send fs-22"></span>
                    </button>
                </form>      
            </div>
		</div>
	</div>
	
	<!-- Page Content overlay -->
	
	
	<!-- Vendor JS -->
	<script src="js/vendors.min.js"></script>
	<script src="js/pages/chat-popup.js"></script>
    <script src="../assets/icons/feather-icons/feather.min.js"></script>	
	
	<!-- EduAdmin App -->
	<script src="js/template.js"></script>
	
	<script src="js/pages/timeline.js"></script>
    <script>
            $('input').bind('input', function() {
        var c = this.selectionStart,
            r = /[^a-z0-9 .]/gi,
            v = $(this).val();
        if(r.test(v)) {
            $(this).val(v.replace(r, ''));
            c--;
        }
        this.setSelectionRange(c, c);
        });
    </script>
	
	
</body>
</html>
