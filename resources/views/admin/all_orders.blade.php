@extends('admin_index', ['allorders' => 'active'])
@section('content')
    <h3 style="color: green; text-align: center; margin-top: 7px">{{ session('message') ?? null }}</h3>

    <div class="">
        <table class="table align-middle mb-0 bg-white">
            <thead class="bg-light">
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Customer Email</th>
                    <th>Qty</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($orders as $order)
                    <tr>
                        {{-- order id --}}
                        <td>
                            <div class="d-flex align-items-center">
                                <p class="mb-1">
                                    {{ $order->id }}
                                </p>
                            </div>
                        </td>

                        {{-- Customer Name --}}
                        <td>
                            <p class="fw-normal mb-1">
                                {{ $order->users->name }}
                            </p>
                        </td>

                        {{-- Customer Email --}}
                        <td style="">
                            <p class="fw-normal mb-1">
                                {{ $order->users->email }}
                            </p>
                        </td>

                        {{-- Qty --}}
                        <td style="">
                            <p class="fw-normal mb-1">
                                @php
                                    $qty = 0;
                                @endphp
                                @foreach ($order->items as $item)
                                    @php
                                        $qty = $qty + $item->quantity;
                                    @endphp
                                @endforeach
                                {{ $qty }}
                            </p>
                        </td>

                        {{-- Total Price --}}
                        <td style="">
                            @php
                                $price = 0;
                            @endphp
                            <p class="fw-normal mb-1">
                                @php
                                    $price = 0;
                                @endphp
                                @foreach ($order->items as $item)
                                    @php
                                        $price += $item->unit_price;
                                    @endphp
                                @endforeach
                                {{ $price }}
                            </p>
                        </td>

                        {{-- Status --}}
                        <td style="">
                            <p class="fw-normal mb-1">
                                @if (!$order->status)
                                    <button class="btn disabled btn-warning">
                                        <i class="fa-solid fa-hourglass-half"></i>
                                    </button>
                                @else
                                    <button class="btn disabled btn-success">
                                        <i class="fa-solid fa-check"></i>
                                    </button>
                                @endif
                            </p>
                        </td>

                        {{-- action button --}}
                        <td style="">
                            <form action="{{ route('order_done', $order->id) }}" method="POST"
                                style="display: inline-block">
                                @csrf
                                @method('put')
                                <button {{ $order->status ? 'disabled' : null }} class="btn btn-primary">
                                    Done
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
