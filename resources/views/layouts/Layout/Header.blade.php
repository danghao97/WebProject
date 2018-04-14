<nav class="navbar navbar-expand-md bg-secondary fixed-top">
    <div class="container">
        <a class="navbar-brand" href="http://{{$_SERVER['SERVER_NAME']}}">
            <img src="{{asset('images/logo.png')}}" width="200" height="35" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers">
                <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                <polyline points="2 17 12 22 22 17"></polyline>
                <polyline points="2 12 12 17 22 12"></polyline>
            </svg>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <div class="navbar-nav dropdown ml-auto">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                    Cài đặt
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="http://{{$_SERVER['SERVER_NAME']}}/#">Xóa hết dữ liệu</a>
                    <a class="dropdown-item" href="http://{{$_SERVER['SERVER_NAME']}}/#">Logout</a>
                </div>
            </div>
        </div><!--/.nav-collapse -->
    </div>
</nav>
