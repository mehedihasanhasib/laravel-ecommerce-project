@extends('home', ['myorders' => 'active'])

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
            <div class="col-lg-10 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Order Id</th>
                            <th>Items</th>
                            <th>Total</th>
                            <th style="width: 180px">Payment Method</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ($orders as $order)
                            <tr>
                                {{-- order id --}}
                                <td>

                                    <p class="mt-4">{{ $order->id }}</p>

                                </td>


                                {{-- items --}}
                                <td class="align-middle text-left">
                                    @foreach ($images as $image)
                                        @if ($order->id == $image->item->order_id)
                                            <img src="{{ asset('product_images/' . $image['image_path']) }}" alt=""
                                                style="width: 50px;">
                                        @endif
                                    @endforeach

                                    <ul style="display: inline-block">
                                        @foreach ($items as $item)
                                            @foreach ($item as $item2)
                                                @if ($order->id == $item2['order_id'])
                                                    <li>
                                                        {{ $item2['product_name'] }}
                                                    </li>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </ul>
                                </td>

                                {{-- total amount --}}
                                <td class="align-middle" style="width: 90px">
                                    {{ $order['total_amount'] }}
                                </td>


                                {{-- payment method --}}
                                <td class="align-middle" style="width: 90px">
                                    {{ $order['payment_method'] }}
                                </td>
                            </tr>
                        @endforeach



                    </tbody>
                </table>

            </div>
        </div>
        <!-- Cart End -->
    @endsection
