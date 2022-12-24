<!-- Navigation-->
<nav class="sticky-top navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand d-flex justify-content-between align-items-center" href="{{url('/shop')}}">
            <i class="bi bi-shop fs-1"></i>
            <span class="ms-3">Yans Mart</span>
        </a>
        @if(getCustSessions())
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    {{--                <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{url('')}}">Home</a></li>--}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">{{getCustSessions()->name}}</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{url('logout')}}">Keluar</a></li>
                    </ul>
                </li>
            </ul>
            <a href="{{url('cart')}}" style="text-decoration:none;">
                <button class="btn btn-outline-dark">
                    <i class="bi-cart-fill me-1"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill">{{getCountCart()}}</span>
                </button>
            </a>
        </div>
        @endif

    </div>
</nav>
