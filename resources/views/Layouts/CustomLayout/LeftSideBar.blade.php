<div class="left-sidebar">
    <nav class="navbar">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#leftbar" aria-expanded="false">
            <span class="sr-only">Menu chức năng</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <div class="collapse navbar-collapse" id="leftbar">
            <div class="list-group">
                <a id="HomeNav" class="list-group-item" href="/">
                    Home
                </a>
                <a id="ChartNav" class="list-group-item" href="/Chart">
                    Chart
                </a>
                <a id="StartNav" class="list-group-item" href="/Start">
                    Start Challenge
                </a>
                <a id="MessageNav" class="list-group-item" href="/Message">
                    Message
                </a>
                <a id="AboutNav" class="list-group-item" href="/About">
                    About
                </a>
                @if ($user->type == 1)
                    <a id="AdminNav" class="list-group-item" href="/Admin">
                        Admin
                    </a>
                @endif
            </div>
        </div>
    </nav>
</div>
