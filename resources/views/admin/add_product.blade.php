@extends('admin_index', ['addproduct' => 'active'])
@section('content')
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="row">
        @csrf
        <div class="col-7">
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
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="desc" rows="7" class="form-control p-2 pt-2"></textarea>
                    </div>


                    <button type="submit" class="btn btn-success">Submit</button>

                </div>
            </div> <!-- /Product Information -->
        </div> {{-- 1st col --}}

        <div class="col-5">
            <div class="card mb-4">

                <div class="card-body">
                    {{-- price --}}
                    <div class="mb-3">
                        <label class="form-label" for="ecommerce-product-name">Price</label>
                        <input type="number" class="form-control" id="ecommerce-product-name" placeholder="Product title"
                            name="price" aria-label="title">

                        @error('price')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Media -->
                    {{-- <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Multiple files input example</label>
                        <input name="images" class="form-control" type="file" id="formFileMultiple" multiple />
                        @error('images')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div> --}}


                    {{-- categories --}}
                    <div class="mb-3">
                        <label for="defaultSelect" class="form-label">Category</label>
                        <select name="category" id="defaultSelect" class="form-select">
                            <option selected value="">Select Category ..</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->category }}">{{ $category->category }}
                                </option>
                            @endforeach
                        </select>
                    </div> {{-- categories --}}



                    <!-- Variants -->
                    <label class="form-label" for="ecommerce-product-name">Variants</label>
                    <div class="">
                        <button class="btn btn-primary btn-sm" id="add-variant">
                            Add More Varient
                        </button>
                    </div>

                    <div class="form-repeater" id="variant-container">

                        <div data-repeater-list="group-a" data-select2-id="18">
                            <div data-repeater-item="" data-select2-id="17">
                                <div class="row" data-select2-id="16">

                                    <div class="mt-2 col-4" data-select2-id="15">
                                        <input name="color[]" type="text" id="form-repeater-1-2" class="form-control"
                                            placeholder="Color">
                                    </div>

                                    <div class="mt-2 col-4" data-select2-id="15">
                                        <input name="size[]" type="text" id="form-repeater-1-2" class="form-control"
                                            placeholder="Size">
                                    </div>

                                    <div class="mt-2 col-4" data-select2-id="15">
                                        <input name="stock[]" type="number" id="form-repeater-1-2" class="form-control"
                                            placeholder="Stock">
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div> <!-- /Variants -->

                </div> {{-- card body --}}

            </div>

        </div> {{-- 2nd col --}}

    </form>
@endsection

@section('script')
    <script>
        document.getElementById("add-variant").addEventListener("click", function(event) {
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
                                            placeholder="Color">
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                        `;
            document.getElementById("variant-container").appendChild(input);
        });
    </script>
@endsection
