@extends('template.front.layout')
@section('content')
<div class="container" style="margin-top:50px;margin-bottom:50px;">

    <div class="row justify-content-around">
        <div class="col-6">
            @if (\Session::has('danger'))
                <div class="mb-5 alert alert-danger alert-dismissible fade show text-center" role="alert">
                    <strong>{!! \Session::get('danger') !!}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif (\Session::has('success'))
                <div class="mb-5 alert alert-success alert-dismissible fade show text-center" role="alert">
                    <strong>{!! \Session::get('success') !!}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div>
                @php
                    $total = 0;
                @endphp
                @if(count($carts) > 0)
                    @foreach($carts as $cart)
                    <div class="border-5 border-bottom border-secondary border-opacity-10 py-3 mb-2">
                        <div class="row">
                            <div class="col-2">
                                <img class="card-img-top"  src="{{asset($cart->product_photo)}}" alt="{{$cart->product_name}}" />
                            </div>
                            <div class="col-8">
                                <p>{{$cart->product_name}}</p>
                                <p>{{idrFormat($cart->product_price)}}</p>
                                <button onclick="return confirm('Apakah anda yakin?')" class="btn btn-sm btn-danger">
                                    <a href="{{url('cart/delete/'.$cart->id)}}" style="text-decoration:none;color:white;">
                                        <i class="bi bi-trash-fill"></i>
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
                    @php
                        $total += $cart->product_price;
                    @endphp
                    @endforeach
                @endif
            </div>
        </div>
        <div class="col-3">
            <div class="rounded-2 p-4 shadow">
            <span>
                <p class="fw-bolder">Ringkasan Belanja</p>
            </span>
                <span class="d-flex justify-content-between">
                <p class="fw-bolder ">Total Harga</p>
                <p>{{idrFormat($total)}}</p>
            </span>
                <form method="POST" action="{{url('cart/checkout')}}">
                    @csrf
                    <button class="btn btn-sm btn-success py-3 rounded-2" style="width:100%;margin-top:100px;">Check Out</button>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection
