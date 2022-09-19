<div data-active-color="white" data-background-color="black" data-image="{{asset('assets/images/sidebar-bg/01.jpg')}}" class="app-sidebar">
    <div class="sidebar-header">
      <div class="logo clearfix"><a href="index.html" class="logo-text float-left">
          <div class="logo-img"><img src="{{asset('assets/images/logo.png')}}" alt="Convex Logo"></div><span class="text align-middle">{{__('sidebar.logo')}}</span></a>
          <a id="sidebarToggle" href="javascript:;" class="nav-toggle d-none d-sm-none d-md-none d-lg-block"></a><a id="sidebarClose" href="javascript:;" class="nav-close d-block d-md-block d-lg-none d-xl-none">
               </a></div>
    </div>
    <div class="sidebar-content ps-container ps-theme-default ps-active-y" data-ps-id="4201096a-39e5-05ee-a211-1908c8a569fd">
      <div class="nav-container">
         <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
            <li class="nav-item home"><a href="{{url('/')}}"><i class="icon-home"></i><span data-i18n="" class="menu-title">{{__('sidebar.Dashboard')}}</span></a>
            </li>
            <li class="has-sub nav-item">
                <a href="#">
                    <span data-i18n="" class="menu-title">
                        إدارة العمليات اليومية
                    </span>
                </a>
                <ul class="menu-content">
                   <li class="has-sub nav-item">
                     <a href="#" class="menu-item">
                        <i class="icon-layers"></i>
                         إدارة المشتريات
                     </a>
                     <ul class="menu-content">
                        <li class="nav-item">
                            <a href="{{route("empty")}}" class="menu-item">
                               <i class="icon-layers"></i>
                                طلبات الشراء
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route("empty")}}" class="menu-item">
                               <i class="icon-layers"></i>
                                أوامر الشراء
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route("empty")}}" class="menu-item">
                               <i class="icon-layers"></i>
                                فواتير الشراء
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route("empty")}}" class="menu-item">
                               <i class="icon-layers"></i>
                                مرتجعات الشراء
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route("empty")}}" class="menu-item">
                               <i class="icon-layers"></i>
                                حركات المورد
                            </a>
                        </li>
                     </ul>
                   </li>
                   <li class="has-sub nav-item">
                       <a href="#">
                        <i class="icon-layers"></i>
                         <span data-i18n="" class="menu-title">
                            إدارة المبيعات
                        </span>
                       </a>
                       <ul class="menu-content">
                        <li class="nav-item">
                            <a href="{{route("empty")}}" class="menu-item">
                               <i class="icon-layers"></i>
                                أوامر البيع
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route("empty")}}" class="menu-item">
                               <i class="icon-layers"></i>
                                فواتير البيع
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route("empty")}}" class="menu-item">
                               <i class="icon-layers"></i>
                                إشعار مدين
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route("empty")}}" class="menu-item">
                               <i class="icon-layers"></i>
                                مرتجعات المبيعات
                            </a>
                        </li>
                     </ul>
                    </li>
                  <li class="nav-item">
                      <a href="{{route('Attendance')}}">
                        <i class="icon-layers"></i>
                         <span data-i18n="" class="menu-title">
                            إدارة المخازن
                         </span>
                      </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{route('Reports')}}">
                         <i class="icon-layers"></i>
                         <span data-i18n="" class="menu-title">
                             إدارة النقدية
                         </span>
                     </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('Reports')}}">
                        <i class="icon-layers"></i>
                        <span data-i18n="" class="menu-title">
                            إدارة البنوك
                        </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('Reports')}}">
                        <i class="icon-layers"></i>
                        <span data-i18n="" class="menu-title">
                            إدارة الشيكات
                        </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('Reports')}}">
                        <i class="icon-layers"></i>
                        <span data-i18n="" class="menu-title">
                            التسويات
                        </span>
                    </a>
                  </li>
                </ul>
             </li>
            <li class="has-sub nav-item">
               <a href="#"><i class="icon-user"></i><span data-i18n="" class="menu-title"> {{__('sidebar.Employees')}}</span></a>
               <ul class="menu-content">
                  <li>
                    <a href="{{route("add_employee")}}" class="menu-item">
                        <i class="fa fa-user-plus"></i>
                        {{__('sidebar.Add Employee')}}
                    </a>
                  </li>
                  <li class=" nav-item">
                      <a href="{{route('system')}}"><i class="icon-pie-chart"></i>
                        <span data-i18n="" class="menu-title">
                        {{__('sidebar.employee_Settings')}}</span>
                      </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{route('Attendance')}}"><i class="icon-support"></i>
                        <span data-i18n="" class="menu-title">
                        {{__('sidebar.Attendance')}}</span>
                     </a>
                 </li>
                 <li class="nav-item">
                    <a href="{{route('Reports')}}">
                        <i class="icon-layers"></i>
                        <span data-i18n="" class="menu-title">{{__('sidebar.Salary report')}}</span>
                    </a>
                 </li>
               </ul>
            </li>
            </li>

            <li class="nav-item has-sub">
                <a href="#"><i class="icon-users"></i><span data-i18n="" class="menu-title"> {{__('sidebar.customers')}}</span></a>
                <ul class="menu-content">
                    <li>
                      <a href="{{route('empty')}}" class="menu-item">
                          <i class="fa fa-user-plus"></i>
                          {{__('sidebar.add_customers')}}
                      </a>
                    </li>
                    <li class=" nav-item">
                        <a href="{{route('empty')}}"><i class="icon-pie-chart"></i>
                          <span data-i18n="" class="menu-title">
                          {{__('sidebar.customers_info')}}</span>
                        </a>
                   </li>
                   <li class="nav-item">
                       <a href="{{route('empty')}}"><i class="icon-support"></i>
                          <span data-i18n="" class="menu-title">
                          {{__('sidebar.customers_accounts')}}</span>
                       </a>
                   </li>
                </ul>
            </li>

            <li class="has-sub nav-item">
                <a href="#"><i class="fa fa-users"></i><span data-i18n="" class="menu-title">{{ __('sidebar.Suppliers') }}</span></a>
                <ul class="menu-content">
                    <li>
                      <a href="{{route("empty")}}" class="menu-item">
                          <i class="fa fa-user-plus"></i>
                          {{__('sidebar.Add_Suppliers')}}
                      </a>
                    </li>
                    <li class=" nav-item">
                        <a href="{{route('empty')}}"><i class="icon-pie-chart"></i>
                          <span data-i18n="" class="menu-title">
                          {{__('sidebar.All_Suppliers')}}</span>
                        </a>
                   </li>
                   <li class="nav-item">
                       <a href="{{route('empty')}}"><i class="icon-support"></i>
                          <span data-i18n="" class="menu-title">
                          {{__('sidebar.Suppliers_accounts')}}</span>
                       </a>
                   </li>
                </ul>
            </li>

            <li class="has-sub nav-item">
                <a href="#">
                    <i class="fas fa-store"></i>
                    <span data-i18n="" class="menu-title">{{ __('sidebar.Stores') }}</span>
                </a>
                <ul class="menu-content">
                    <li>
                      <a href="{{route("empty")}}" class="menu-item">
                          <i class="fa fa-user-plus"></i>
                          {{__('sidebar.Add_store')}}
                      </a>
                    </li>
                    <li class=" nav-item">
                        <a href="{{route('empty')}}"><i class="icon-pie-chart"></i>
                          <span data-i18n="" class="menu-title">
                          {{__('sidebar.store')}}</span>
                        </a>
                   </li>
                </ul>
            </li>

            <li class="has-sub nav-item">
                <a href="#">
                    <span data-i18n="" class="menu-title">إدارة المنتجات</span>
                </a>
                <ul class="menu-content">
                    <li>
                      <a href="{{route("empty")}}" class="menu-item">
                          <span data-i18n="" class="menu-title">
                            <i class="fa fa-plus"></i>
                            إضافة منتجات
                          </span>
                      </a>
                    </li>
                    <li class=" nav-item">
                        <a href="{{route('empty')}}">
                          <span data-i18n="" class="menu-title">
                            <i class="fa fa-plus"></i>
                              تصنيفات المنتجات
                          </span>
                        </a>
                   </li>
                    <li class=" nav-item">
                        <a href="{{route('empty')}}">
                          <span data-i18n="" class="menu-title">
                            <i class="fa fa-plus"></i>
                              المنتجات
                          </span>
                        </a>
                   </li>
                </ul>
             </li>

             <li class="has-sub nav-item">
                <a href="#">
                    <span data-i18n="" class="menu-title">تقارير القياسي</span>
                </a>
                <ul class="menu-content">
                    <li>
                      <a href="{{route("empty")}}" class="menu-item">
                          <span data-i18n="" class="menu-title">
                            <i class="fas fa-coins"></i>
                             الحسابات المالية
                          </span>
                      </a>
                    </li>
                    <li class=" nav-item">
                        <a href="{{route('empty')}}">
                          <span data-i18n="" class="menu-title">
                            <i class="fas fa-coins"></i>
                              الحركات المالية
                          </span>
                        </a>
                   </li>
                    <li class="nav-item">
                        <a href="{{route('empty')}}">
                          <span data-i18n="" class="menu-title">
                            <i class="fas fa-coins"></i>
                              حركات المنتجات
                          </span>
                        </a>
                   </li>
                    <li class="nav-item">
                        <a href="{{route('empty')}}">
                          <span data-i18n="" class="menu-title">
                            <i class="fas fa-coins"></i>
                              حركات مركز التكلفة
                          </span>
                        </a>
                   </li>
                    <li class="nav-item">
                        <a href="{{route('empty')}}">
                          <span data-i18n="" class="menu-title">
                            <i class="fas fa-coins"></i>
                              أنواع الحساب المالي
                          </span>
                        </a>
                   </li>
                    <li class="nav-item">
                        <a href="{{route('empty')}}">
                          <span data-i18n="" class="menu-title">
                            <i class="fas fa-coins"></i>
                              رصيد المخازن
                          </span>
                        </a>
                   </li>
                </ul>
             </li>
             <li class="nav-item">
                <a href="{{url('/')}}">
                <span data-i18n="" class="menu-title">
                    إعدادات
                </span>
                </a>
           </li>
        </ul>
    </div>
   <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 234px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 96px;"></div></div></div>
    <div class="sidebar-background" style="background-image: url(&quot;{{asset("assets/images/sidebar-bg/01.jpg")}}&quot;);"></div>
  </div>
