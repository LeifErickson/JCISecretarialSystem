<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel">
            <div class="pull-left image">
                <img src="{!! access()->user()->picture !!}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{!! access()->user()->name !!}</p> -->
                <!-- Status -->
                <!-- <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('strings.backend.general.status.online') }}</a>
            </div>
        </div> -->

        <!-- search form (Optional) -->
       <!--  <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" id="search" autocomplete="off" placeholder="Search Members.."/>
                  <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                  </span>
            </div>
        </form> -->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('menus.backend.sidebar.general') }}</li>

            <!-- Optionally, you can add icons to the links -->
            <li class="{{ Active::pattern('admin/dashboard') }}">
                <a href="{!! route('admin.dashboard') !!}"><span>{{ trans('menus.backend.sidebar.dashboard') }}</span></a>
            </li>
            <li class="{{ Active::pattern('admin/member*') }} treeview">
                <a href="{!! url('admin/members') !!}">
                <span>Member Management</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>
            <ul class="treeview-menu {{ Active::pattern('admin/members*', 'menu-open') }}" style="display: none; {{ Active::pattern('admin/members*', 'display: block;') }}">
                <li class="{{ Active::pattern('admin/payments') }}">
                    <a href="{!! url('admin/payments') !!}"><span>Manage Payments</span></a>
                </li>
            </ul>
				<!--START OF TEST SIDE BAR -->
				<li class="{{ Active::pattern('admin/event*') }} treeview">
					  <a href="{!! url('admin/events/all') !!}">
					  <span>Event Management</span>
					  <i class="fa fa-angle-left pull-right"></i>
					  </a>
				  </li>   
                <ul class="treeview-menu {{ Active::pattern('admin/events*', 'menu-open') }}" style="display: none; {{ Active::pattern('admin/events*', 'display: block;') }}">
                    <li class="{{ Active::pattern('admin/events/projects') }}">
                        <a href="{!! url('admin/events/projects') !!}">Projects</a>
                    </li>
                    <li class="{{ Active::pattern('admin/events/meetings') }}">
                        <a href="{!! url('admin/events/meetings') !!}">Meetings</a>
                    </li>
							<li class="{{ Active::pattern('admin/events/events') }}">
                        <a href="{!! url('admin/events') !!}">Other Events</a>
                    </li>
							  
							
                </ul>
				<!--
				<ul class="treeview-menu {{ Active::pattern('admin/events/test*', 'menu-open') }}" style="display: none; {{ Active::pattern('admin/events/test*', 'display: block;') }}">
					<li class="{{ Active::pattern('admin/events/test/asdas') }}">
						<a href="{!! url('admin/events/add') !!}">Add Other Events</a>
					</li>
				</ul>-->
				 <li class="{{ Active::pattern('admin/events/add*') }} treeview">
                <a href="{!! url('admin/attendanceMonitoring/0') !!}">
                <span>Attendance Monitoring</span>
                </a>
				</li>
				<!--END OF TEST SIDE BAR -->
				
				
				
            @permission('view-access-management')
                <li class="{{ Active::pattern('admin/access/*') }}">
                    <a href="{!!url('admin/access/users')!!}"><span>{{ trans('menus.backend.access.title') }}</span></a>
                </li>
            @endauth

            <li class="{{ Active::pattern('admin/log-viewer*') }} treeview">
                <a href="#">
                    <span>{{ trans('menus.backend.log-viewer.main') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu {{ Active::pattern('admin/log-viewer*', 'menu-open') }}" style="display: none; {{ Active::pattern('admin/log-viewer*', 'display: block;') }}">
                    <li class="{{ Active::pattern('admin/log-viewer') }}">
                        <a href="{!! url('admin/log-viewer') !!}">{{ trans('menus.backend.log-viewer.dashboard') }}</a>
                    </li>
                    <li class="{{ Active::pattern('admin/log-viewer/logs') }}">
                        <a href="{!! url('admin/log-viewer/logs') !!}">{{ trans('menus.backend.log-viewer.logs') }}</a>
                    </li>
                </ul>
            </li>

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>