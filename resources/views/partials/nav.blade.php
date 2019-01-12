<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ action('HomeController@index') }}">勤益「米其林」星級評鑑網</a>
        <form class="navbar-form navbar-left" role="search" method="GET" action="{{ action('HomeController@search') }}">
            <div class="form-group">
                <input type="text" class="form-control" name="keyword" placeholder="搜尋評論">
            </div>
            <button type="submit" class="btn btn-default">搜尋</button>
        </form>
        <ul class="nav navbar-nav navbar-right">
            @if(Auth::check())
                <li class="navbar-text">
                    {{ Auth::user()->name }}
                </li>
                <li>
                    <a href="{{ route('logout') }}">登出</a>
                </li>
            @else
                <li>
                    <a href="{{ route('login') }}">登入</a>
                </li>
                <li>
                    <a href="{{ route('register') }}">註冊</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
<div style="padding-top: 70px;"></div>