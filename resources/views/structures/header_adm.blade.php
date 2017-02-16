<!-- Main Header -->
<header class="main-header">
    @php
        if( $guard == 'admin' ):
            $uri = '/admin/login/logout';
            $uri_logo = 'admin::home_admin';
        else:
            $uri = '/logout';                            
            $uri_logo = 'doctor::home_doctor';
        endif;
        $auth = Auth::guard($guard)->user();
    @endphp
    <!-- Logo -->
    <a href="{!! route($uri_logo) !!}" class="logo">Odonto<b>localiza</b></a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Menu</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account Menu -->
                <li class="dropdown">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        @if( !empty($auth->thumb) && file_exists(public_path('storage/images/doctor/profile/'.$auth->thumb)) )
                            <img src="{{ asset('storage/images/doctor/profile/'.$auth->thumb) }}" alt="{!! $auth->name !!}" class="user-image img-circle" height="25">
                        @else
                            <img src="{{ asset('images/profile.jpg') }}" alt="Sem Imagem" class="user-image img-circle" height="25">
                        @endif
                        <span class="hidden-xs"> {{ ucwords( $auth->name ) }} <span class="caret"></span> </span>
                    </a>
                    <ul class="dropdown-menu">
                        @if( $guard == 'admin' )
                            <li>
                                <a href="{!! route('admin::profile') !!}"><i class="fa fa-user" aria-hidden="true"></i> Meu Perfil</a>
                            </li>
                        @endif
                        <li>
                            <a href="{{ url( $uri ) }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off" aria-hidden="true"></i> Sair
                            </a>

                            <form id="logout-form" action="{{ url( $uri ) }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>