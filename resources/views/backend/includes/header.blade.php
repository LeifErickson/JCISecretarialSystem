<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{!! route('frontend.index') !!}" class="logo">{!! app_name() !!}</a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">{{ trans('labels.general.toggle_navigation') }}</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

<!--                 @if (config('locale.status') && count(config('locale.languages')) > 1)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ trans('menus.language-picker.language') }} <span class="caret"></span></a>
                        @include('includes.partials.lang')
                    </li>
                @endif
 -->
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{{ access()->user()->name }}</span>
                    </a>

                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header" style="height: 85px">
                            <p>
                                {!! access()->user()->name !!}
                                <small>{!! access()->user()->email !!}</small>
                            </p>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="/" class="btn btn-default btn-flat">Home</a>
                            </div>
                            <div class="pull-right">
                                <a href="{!! route('auth.logout') !!}" class="btn btn-default btn-flat">{{ trans('navs.general.logout') }}</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
