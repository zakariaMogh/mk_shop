<nav class="sb-topnav navbar navbar-expand navbar-light bg-clr">
    <a class="navbar-brand logo-brand" href="{{route('admin.dashboard')}}">Mk shop</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" ><i class="fas fa-bars"></i></button>
    <ul class="navbar-nav ml-auto mr-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <form action="{{route('admin.logout')}}" method="post">
                    @csrf
                    <button class="dropdown-item admin-dropdown-item w-100" >Logout</button>
                </form>
            </div>
        </li>
    </ul>
</nav>
