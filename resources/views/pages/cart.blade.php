@extends('home', ['cart' => 'active'])

@section('content')
    <!-- Page Header Start -->
    {{-- <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping Cart</p>
            </div>
        </div>
    </div> --}}
    <!-- Page Header End -->

    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">

                        @if (Session::has('cart'))
                            @foreach (session('cart') as $key => $item)
                                <tr>
                                    {{-- title --}}
                                    <td class="align-middle d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('product_images/' . $item['image']['image_path']) }}"
                                                alt="" style="width: 50px;">
                                            <p class="mt-4 px-3">{{ $item['title'] }}</p>
                                        </div>
                                    </td>
                                    {{-- price --}}
                                    <td class="align-middle" style="width: 90px">
                                        $ {{ $item['price'] * $item['quantity'] }}
                                    </td>
                                    {{-- quantity --}}
                                    <td class="align-middle">

                                        {{ $item['quantity'] }}
                                        {{-- <div class="input-group quantity mx-auto" style="width: 100px;">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-primary btn-minus">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text"
                                                class="form-control form-control-sm bg-secondary text-center"
                                                value="{{ $item['quantity'] }}" name="quantity">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-primary btn-plus">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div> --}}
                                    </td>

                                    {{-- delete button --}}
                                    <td class="align-middle">
                                        <form action="{{ route('deleteCartItem', ['id' => $key]) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-sm btn-primary">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="align-middle">
                                <td>
                                    No items is added to the cart
                                </td>
                            </tr>
                        @endif


                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">
                                @if (Session::has('cart'))
                                    ${{ array_sum(array_column(session('cart'), 'subtotal')) ?? 0 }}
                                @else
                                    0
                                @endif
                            </h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$0</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">
                                @if (Session::has('cart'))
                                    ${{ array_sum(array_column(session('cart'), 'subtotal')) ?? 0 }}
                                @else
                                    0
                                @endif

                            </h5>
                        </div>

                        {{-- <a href="{{ route('checkout') }}" class="btn btn-block btn-primary my-3 py-3">Place Order</a> --}}
                        <form action="{{ route('order') }}" method="POST">
                            @csrf
                            <button class="btn btn-block btn-primary my-3 py-3">Place Order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
@endsection
