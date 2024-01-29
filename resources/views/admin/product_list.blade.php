@extends('admin_index', ['productlist' => 'active'])
@section('content')
    <h3 style="color: red; text-align: center; margin-top: 7px">{{ session('success') ?? null }}</h3>

    <div class="">
        <table class="table align-middle mb-0 bg-white">
            <thead class="bg-light">
                <tr>
                    <th>Product Title</th>
                    <th>Price</th>
                    <th style="padding-left: 50px">Stock</th>
                    <th style="padding-left: 50px">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>

                        {{-- title --}}
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt=""
                                    style="width: 45px; height: 45px" class="rounded-circle" />
                                <div class="ms-3">
                                    <p class="fw-bold mb-1">{{ $product->title }}</p>
                                    {{-- <p class="text-muted mb-0">john.doe@gmail.com</p> --}}
                                </div>
                            </div>
                        </td>

                        {{-- price --}}
                        <td>
                            <p class="fw-normal mb-1">$ {{ $product->price }}</p>
                            {{-- <p class="text-muted mb-0">IT department</p> --}}
                        </td>




                        {{-- stock --}}
                        <td style="padding-left: 35px">
                            @foreach ($stocks as $stock)
                                @if ($stock->product_id == $product->id)
                                    <p class="fw-normal mb-1">
                                        {{ $stock->color->color }} : {{ $stock->size->size }} :
                                        {{ $stock['stock'] }}
                                    </p>
                                @endif
                            @endforeach
                        </td>


                        {{-- action button --}}
                        <td style="">
                            <form action="" method="POST" style="display: inline-block">
                                @csrf
                                @method('delete')
                                <button class="btn btn-success">
                                    Edit
                                </button>
                            </form>

                            <form action="{{ route('product.destroy', ['product' => $product->id]) }}" method="POST"
                                style="display: inline-block">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">

                                    Delete
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
