<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-main">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">mc UAP</a>
        </div>

        <div class="collapse navbar-collapse" id="navbar-main">
            @unless (Auth::guest())
                <ul class="nav navbar-nav">
                    <li class="{{ HTML::set_active('home') }}"><a href="{{ route('home') }}">Dashboard</a></li>
                    <li class="{{ HTML::set_active('sunscription') }}"><a href="#">Subscription</a></li>
                    <li class="{{ HTML::set_active('admin.index') }}"><a href="{{ route('admin.index') }}">Administration</a></li>

                </ul>
            @endif

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li class="{{ HTML::set_active('auth/login') }}"><a href="{{ url('/auth/login') }}">Login</a></li>
                    <li class="{{ HTML::set_active('auth/register') }}"><a href="{{ url('/auth/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{url('profile/'.Auth::user()->id)}}">Profile</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>