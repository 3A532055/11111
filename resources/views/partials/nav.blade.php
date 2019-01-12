<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ action('HomeController@index') }}">勤益「米其林」星級評鑑網</a>
       
        <ul class="nav navbar-nav navbar-right">
            @if(Auth::check())
                <li class="navbar-text">
                    {{ Auth::user()->name }}
                </li>
                <li>
                    <a href="{{ action('Auth\AuthController@logout') }}">登出</a>
                </li>
            @else
                <li>
                    <a href="{{ action('Auth\AuthController@showLoginForm') }}">登入</a>
                </li>
                <li>
                    <a href="{{ action('Auth\AuthController@showRegistrationForm') }}">註冊</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
<div style="padding-top: 70px;"></div>