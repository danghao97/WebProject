<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="http://{{$_SERVER['SERVER_NAME']}}">
            <img src="{{asset('images/logo.png')}}" width="200" height="35" alt="">
        </a>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        {{$user->fullname}} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        {{-- <li>
                            <a class="dropdown-item" href="http://{{$_SERVER['SERVER_NAME']}}/#">Xóa hết dữ liệu</a>
                        </li> --}}
                        <li>
                            <a class="dropdown-item" href="http://{{$_SERVER['SERVER_NAME']}}/Signout">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
