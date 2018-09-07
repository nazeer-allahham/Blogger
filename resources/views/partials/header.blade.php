<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse navbarSupportedContent justify-content-start">
        <ul class="navbar-nav d-flex align-items-center">
            <li class="nav-item">
                <div>
                @guest
                <div>
                    <a href="{{ route('login') }}" class="btn btn-success btn-sm">
                        <span class="fa fa-sign-in-alt"></span> Login
                    </a>

                    <a href="{{ route('register') }}" class="btn btn-danger btn-sm">
                        <span class="fa fa-sign-out-alt"></span> Register
                    </a>
                </div>
                @else
                <b-btn id="navigation-view-toggler" variant="dark">
                    <img src="{{ asset(auth()->user()->gender === 'male' ? '/images/male-user.png' : '/images/female-user.png') }}" class="img-responsive rounded" style="width:48px"/>
                </b-btn>
                @endguest
                </div>
            </li>
            <li class="nav-item">
                <a href="/" class="btn btn-dark btn-sm">
                    Home
                </a>
            </li>
            <li class="nav-item">
                <a href="/posts" class="btn btn-dark btn-sm">
                    Posts
                </a>
            </li>
        </ul>
    </div>

    <a class="navbar-brand mx-auto" href="/" >
        <div class="text-center">
            <img src="{{ asset('/images/logo.png') }}" style="width:48px;"/>
            <p>Blogger</p>
        </div>
    </a>


    <div class="collapse navbar-collapse navbarSupportedContent justify-content-end">
        <div style="text-align:center">
            <form class="form-inline d-inline mx-auto  my-lg-0" method="post" action="/search">
                @csrf
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>

    @auth
    <b-popover target="navigation-view-toggler" triggers="hover focus" placement="bottomright">
        <b-list-group>
            <b-list-group-item variant="light" class="list-group-item">
                <a href="/profile" class="user-option-link">
                    <span class="fa fa-home"></span> Profile <i>@guest guest @else ( {{ Auth::user()->name }} ) @endguest</i>
                </a>
            </b-list-group-item>
            <b-list-group-item variant="light" class="list-group-item">
                <a href="/profile/edit" class="user-option-link btn  p-0 m-0">
                    <span class="fa fa-cog" width="32px" height="32px"></span> Settings
                </a>
            </b-list-group-item>
            <b-list-group-item variant="light" class="list-group-item">
                <a href="{{ route('logout') }}" class="user-option-link" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                    <span class="fa fa-sign-out-alt" width="32px" height="32px"></span> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </b-list-group-item>
        </b-list-group>
    </b-popover>
    @endauth
</nav>