@extends('admin_index', ['allorders' => 'active'])
@section('content')
    <h3 style="color: red; text-align: center; margin-top: 7px">{{ session('success') ?? null }}</h3>

    <div class="">
        <table class="table align-middle mb-0 bg-white">
            <thead class="bg-light">
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Customer Email</th>
                    <th>Unit Price</th>
                    <th>Qty</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($orders as $order)
                    <tr>
                        {{-- order id --}}
                        <td style="">
                            <div class="d-flex align-items-center">
                                <p class="fw-bold mb-1">
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

                        {{-- Unit Price --}}
                        <td style="">
                            <p class="fw-normal mb-1">
                                @foreach ($order->items as $item)
                                    {{ $item->unit_price }}
                                @endforeach
                            </p>
                        </td>

                        {{-- Qty --}}
                        <td style="">
                            <p class="fw-normal mb-1">
                                @foreach ($order->items as $item)
                                    {{ $item->quantity }}
                                @endforeach
                            </p>
                        </td>

                        {{-- Total Price --}}
                        <td style="">
                            <p class="fw-normal mb-1">
                                @foreach ($order->items as $item)
                                    {{ $item->quantity * $item->unit_price }}
                                @endforeach
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
                            <form action="" method="POST" style="display: inline-block">
                                @csrf
                                <button class="btn btn-primary">
                                    Done
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach


                {{-- <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="https://mdbootstrap.com/img/new/avatars/6.jpg" class="rounded-circle" alt=""
                                style="width: 45px; height: 45px" />
                            <div class="ms-3">
                                <p class="fw-bold mb-1">Alex Ray</p>
                                <p class="text-muted mb-0">alex.ray@gmail.com</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">Consultant</p>
                        <p class="text-muted mb-0">Finance</p>
                    </td>
                    <td>
                        <span class="badge badge-primary rounded-pill d-inline">Onboarding</span>
                    </td>
                    <td>Junior</td>
                    <td>
                        <button type="button" class="btn btn-link btn-rounded btn-sm fw-bold" data-mdb-ripple-color="dark">
                            Edit
                        </button>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="https://mdbootstrap.com/img/new/avatars/7.jpg" class="rounded-circle" alt=""
                                style="width: 45px; height: 45px" />
                            <div class="ms-3">
                                <p class="fw-bold mb-1">Kate Hunington</p>
                                <p class="text-muted mb-0">kate.hunington@gmail.com</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">Designer</p>
                        <p class="text-muted mb-0">UI/UX</p>
                    </td>
                    <td>
                        <span class="badge badge-warning rounded-pill d-inline">Awaiting</span>
                    </td>
                    <td>Senior</td>
                    <td>
                        <button type="button" class="btn btn-link btn-rounded btn-sm fw-bold" data-mdb-ripple-color="dark">
                            Edit
                        </button>
                    </td>
                </tr> --}}

            </tbody>
        </table>
    </div>
@endsection
