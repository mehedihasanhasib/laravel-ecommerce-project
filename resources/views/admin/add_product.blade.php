@extends('admin_index', ['addproduct' => 'active'])
@section('content')
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="row">
        @csrf

        <h3 style="color: green; text-align: center;">{{ Session::get('message') ?? null }}</h3>

        <div class="col-lg-7 col-sm">
            <!-- Product Information -->
            <div class="card mb-4">

                <div class="card-header">
                    <h5 class="card-tile mb-0">Product information</h5>
                </div>

                <div class="card-body">
                    {{-- title --}}
                    <div class="mb-3">
                        <label class="form-label" for="ecommerce-product-name">Title</label>
                        <input type="text" class="form-control" id="ecommerce-product-name" placeholder="Product title"
                            name="title" aria-label="title">

                        @error('title')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" rows="7" class="form-control p-2 pt-2"></textarea>

                        @error('description')
                            <p style="color: red">{{ $message }}</p>
                        @enderror

                    </div>


                    <button type="submit" class="btn btn-success">Submit</button>

                </div>
            </div> <!-- /Product Information -->
        </div> {{-- 1st col --}}

        <div class="col-lg-5 col-sm">
            <div class="card mb-4">

                <div class="card-body">
                    {{-- price --}}
                    <div class="mb-3">
                        <label class="form-label" for="ecommerce-product-name">Price</label>
                        <input type="number" class="form-control" id="ecommerce-product-name" placeholder="Price"
                            name="price">

                        @error('price')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Media -->
                    {{-- <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Multiple files input example</label>
                        <input name="images" class="form-control" type="file" id="formFileMultiple" multiple />
                        @error('images')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror

                        @error('images')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div> --}}


                    {{-- categories --}}
                    <div class="mb-3">
                        <label for="defaultSelect" class="form-label">Category</label>
                        <select name="category" id="defaultSelect" class="form-select">
                            <option selected value="">Select Category ..</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category }}
                                </option>
                            @endforeach
                        </select>

                        @error('category')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div> {{-- categories --}}





                    <div class="form-repeater" id="variant-container">

                        <div data-repeater-list="group-a" data-select2-id="18">
                            <div data-repeater-item="" data-select2-id="17">
                                <div class="row" data-select2-id="16">

                                    <!-- Variants -->
                                    <label class="form-label" for="ecommerce-product-name">Variants</label>
                                    <div class="d-flex">
                                        <div style="padding-right: 4px">
                                            <button class="btn btn-primary btn-sm" id="add-variant">
                                                Add More Varient
                                            </button>
                                        </div>
                                        <div class="inline-block">
                                            <button class="btn btn-primary btn-sm" id="custom-variant">
                                                Add Custom Varient
                                            </button>
                                        </div>
                                    </div>

                                    <div class="mt-2 col-4" data-select2-id="15">

                                        <select name="color[]" class="form-select">
                                            <option selected value="">Color</option>
                                            @foreach ($colors as $color)
                                                <option value="{{ $color->color }}">{{ $color->color }}
                                                </option>
                                            @endforeach
                                        </select>
                                        {{-- <input name="color[]" type="text" id="form-repeater-1-2" class="form-control"
                                            placeholder="Color"> --}}
                                    </div>

                                    <div class="mt-2 col-4" data-select2-id="15">

                                        <select name="size[]" class="form-select">
                                            <option selected value="">Size</option>
                                            @foreach ($sizes as $size)
                                                <option value="{{ $size->size }}">{{ $size->size }}
                                                </option>
                                            @endforeach
                                        </select>
                                        {{-- <input name="size[]" type="text" id="form-repeater-1-2" class="form-control"
                                            placeholder="Size"> --}}
                                    </div>

                                    <div class="mt-2 col-4" data-select2-id="15">
                                        <input name="stock[]" type="number" id="form-repeater-1-2" class="form-control"
                                            placeholder="Stock">
                                    </div>


                                </div>
                            </div>
                        </div>



                        @error('stock*')
                            <p style="color: red">The stock field is required.</p>
                        @enderror



                    </div> <!-- /Variants -->

                </div> {{-- card body --}}

            </div>

        </div> {{-- 2nd col --}}

    </form>
@endsection

@section('script')
    <script>
        document.getElementById("custom-variant").addEventListener("click", function(event) {
            event.preventDefault();
            console.log("hello");

            let input = document.createElement("div");
            input.innerHTML = `
                        <div data-repeater-list="group-a" data-select2-id="18">
                            <div data-repeater-item="" data-select2-id="17">
                                <div class="row" data-select2-id="16">

                                    <div class="mt-1 col-4" data-select2-id="15">
                                        <input name="color[]" type="text" id="form-repeater-1-2" class="form-control"
                                            placeholder="Color">
                                    </div>

                                    <div class="mt-1 col-4" data-select2-id="15">
                                        <input name="size[]" type="text" id="form-repeater-1-2" class="form-control"
                                            placeholder="Size">
                                    </div>

                                    <div class="mt-1 col-4" data-select2-id="15">
                                        <input name="stock[]" type="number" id="form-repeater-1-2" class="form-control"
                                            placeholder="Stock">
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                        `;
            document.getElementById("variant-container").appendChild(input);
        });


        document.getElementById("add-variant").addEventListener("click", function(event) {
            event.preventDefault();
            console.log("hello");

            let input = document.createElement("div");
            input.innerHTML = `
                        <div data-repeater-list="group-a" data-select2-id="18">
                            <div data-repeater-item="" data-select2-id="17">
                                <div class="row" data-select2-id="16">

                                    <div class="mt-1 col-4" data-select2-id="15">
                                        <select name="color[]" class="form-select">
                                            <option selected value="">Color</option>
                                            @foreach ($colors as $color)
                                                <option value="{{ $color->color }}">{{ $color->color }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mt-1 col-4" data-select2-id="15">
                                        <select name="size[]" class="form-select">
                                            <option selected value="">Size</option>
                                            @foreach ($sizes as $size)
                                                <option value="{{ $size->size }}">{{ $size->size }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mt-1 col-4" data-select2-id="15">
                                        <input name="stock[]" type="number" id="form-repeater-1-2" class="form-control"
                                            placeholder="Stock">
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                        `;
            document.getElementById("variant-container").appendChild(input);
        });
    </script>
@endsection
