<nav class="navbar navbar-dark navbar-expand-md sticky-top smsp-navbar">
    <div class="container-fluid"><a class="navbar-brand text-body" href="#"><img class="img-fluid smsp-logo"
                src="/assets/img/pemmz.png"></a><button data-toggle="collapse" class="navbar-toggler"
            data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <form action="/logout" method="post" style="display: inline;">
                        @csrf
                        <button class="nav-link btn btn-link p-0" type="submit"
                            style="border: none; background: none;">
                            <i class="fa fa-power-off icon-off"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
