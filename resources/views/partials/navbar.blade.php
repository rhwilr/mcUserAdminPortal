<nav class="navbar navbar-default navbar-fixed-top" data-ng-controller="NavbarInstanceCtrl">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-main">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">{{ Config::get('app.appname') }}</a>
        </div>

        <div class="collapse navbar-collapse" id="navbar-main">
            @unless (Auth::guest())
                <ul class="nav navbar-nav">
                    <li class="{{ HTML::set_active('home') }}"><a href="{{ route('home') }}">Dashboard</a></li>
                    <li class="{{ HTML::set_active('patron') }}"><a href="{{ route('patron') }}">Patron</a></li>


                    <li class="" dropdown is-open="status.isopen">
                        <a href="#" class="dropdown-toggle" dropdown-toggle ng-disabled="disabled">
                            Info <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="{{ HTML::set_active('info/rules') }}"><a href="{{ url('info/rules') }}">Rules</a>
                            </li>
                        </ul>
                    </li>


                @if(Entrust::hasRole('admin'))
                        <li class="{{ HTML::set_active('admin.index') }}"><a href="{{ route('admin.index') }}#/servers">Administration</a></li>
                    @endif
                </ul>
            @endif

            <ul class="nav navbar-nav navbar-right">

                @if (Auth::guest())
                    <li class="{{ HTML::set_active('auth/login') }}"><a href="{{ url('/auth/login') }}">Login</a></li>
                    <li class="{{ HTML::set_active('auth/register') }}"><a href="{{ url('/auth/register') }}">Register</a></li>
                @else
                    <li class="dropdown" dropdown on-toggle="toggled(open)">
                      <a href class="dropdown-toggle" dropdown-toggle>{{ Auth::user()->name }} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('/profile')}}">Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                    </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>