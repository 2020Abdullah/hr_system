<div data-active-color="white" data-background-color="black" data-image="{{asset('assets/images/sidebar-bg/01.jpg')}}" class="app-sidebar">
    <div class="sidebar-header">
      <div class="logo clearfix"><a href="index.html" class="logo-text float-left">
          <div class="logo-img"><img src="{{asset('assets/images/logo.png')}}" alt="Convex Logo"></div><span class="text align-middle">Hr System</span></a>
          <a id="sidebarToggle" href="javascript:;" class="nav-toggle d-none d-sm-none d-md-none d-lg-block"></a><a id="sidebarClose" href="javascript:;" class="nav-close d-block d-md-block d-lg-none d-xl-none">
               </a></div>
    </div>
    <div class="sidebar-content ps-container ps-theme-default ps-active-y" data-ps-id="4201096a-39e5-05ee-a211-1908c8a569fd">
      <div class="nav-container">
         <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
            <li class="nav-item home"><a href="#"><i class="icon-home"></i><span data-i18n="" class="menu-title">Dashboard</span></a>
            </li>
            <li class="has-sub nav-item">
               <a href="#"><i class="icon-users"></i><span data-i18n="" class="menu-title"> Employees</span></a>
               <ul class="menu-content">
                  <li><a href="employees.html" class="menu-item"> <i class="icon-bar"></i> Employees Statistics</a>
                  </li>
                  <li><a href="{{route("add_employee")}}" class="menu-item">Add Employee</a>
                  </li>
               </ul>
            </li>
            <li class=" nav-item"><a href="{{route("add_employee")}}"><i class="icon-note"></i><span data-i18n="" class="menu-title">Add Employee</span></a>
            </li>
            <li class=" nav-item"><a href="{{route('system')}}"><i class="icon-pie-chart"></i><span data-i18n="" class="menu-title">
               General Settings</span></a>
            </li>
            <li class=" nav-item"><a href="{{route('Attendance')}}"><i class="icon-support"></i><span data-i18n="" class="menu-title">
               Attendance</span></a>
            </li>
            <li class=" nav-item"><a href="{{route('Reports')}}"><i class="icon-layers"></i><span data-i18n="" class="menu-title">Salary report</span></a>
            </li>
            <li class=" nav-item"><a href="users.html"><i class="icon-users"></i><span data-i18n="" class="menu-title">Users</span></a>
            </li>
            <li class=" nav-item"><a href="permissions.html"><i class="icon-equalizer"></i><span data-i18n="" class="menu-title">Permissions</span></a>
            </li>
            <li class=" nav-item"><a href="chat.html"><i class="icon-puzzle"></i><span data-i18n="" class="menu-title">Chat</span></a>
            </li>

            <li class=" nav-item"><a href="login.html"><i class="icon-pin"></i><span data-i18n="" class="menu-title">Login Page </span></a>
             </li>
      </ul></div>
   <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 234px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 96px;"></div></div></div>
    <div class="sidebar-background" style="background-image: url(&quot;{{asset("assets/images/sidebar-bg/01.jpg")}}&quot;);"></div>
  </div>
