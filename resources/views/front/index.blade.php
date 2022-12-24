@extends('template.front.layout')
@section('content')


        <!-- Alert -->
        @if (\Session::has('danger'))
            <div class="container mx-auto alert alert-success alert-dismissible fade show text-center" role="alert">
                <strong>{!! \Session::get('danger') !!}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (\Session::has('success'))
            <div class="container mx-auto alert alert-success alert-dismissible fade show text-center" role="alert">
                <strong>{!! \Session::get('success') !!}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <!-- end Alert -->

        <!-- Section-->
        <section>
            <div class="container px-4 px-lg-5 my-5">
                <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{asset("assets/img/banner1.jpg")}}" class="bd-placeholder-img" width="100%" height="100%"  aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></img>
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset("assets/img/banner2.jpg")}}" class="bd-placeholder-img" width="100%" height="100%"  aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></img>
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset("assets/img/banner3.jpg")}}" class="bd-placeholder-img" width="100%" height="100%"  aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></img>
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset("assets/img/banner4.jpg")}}" class="bd-placeholder-img" width="100%" height="100%"  aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></img>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @if(count($products) > 0)
                        @foreach($products as $product)
                            <div class="col my-3">
                                <div class="card h-100">
                                    <!-- Product image-->
                                    <img class="card-img-top" src="{{asset($product->product_photo)}}" alt="{{$product->product_name}}" />
                                    <!-- Product details-->
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <a href="{{url('product/'.$product->id)}}" style="text-decoration:none;color:black;">
                                                <h5 class="fw-bolder">{{$product->product_name}}</h5>
                                            </a>

                                            <!-- Product price-->
                                            {{idrFormat($product->product_price)}}
                                        </div>
                                    </div>
                                    <!-- Product actions-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{url('cart/add?products_id='.$product->id)}}">Add to cart</a></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
        <!-- end Section -->
@endsection
