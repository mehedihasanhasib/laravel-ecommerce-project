@extends('admin_index', ['create_size' => 'active'])

@section('content')
    <form action="{{ route('create_size') }}" method="POST" class="row d-flex justify-content-center">
        @csrf
        <h3 style="color: green; text-align: center; margin-top: 5px">{{ Session::get('message') ?? null }}</h3>

        <div class="col-lg-7 col-sm">
            <!-- Product Information -->
            <div class="card mb-4">

                <div class="card-header">
                    <h5 class="card-tile mb-0">Create Size</h5>
                </div>
                <div class="card-body">
                    {{-- title --}}
                    <div class="mb-3">
                        <label class="form-label" for="ecommerce-product-name">Size Name</label>
                        <input type="text" class="form-control" placeholder="Size in INT e.g: S,M,L" name="size"
                            aria-label="title" value="{{ old('size') ?? null }}">
                        @error('size')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Create</button>
                </div>
            </div>
        </div> {{-- 1st col --}}

    </form>
@endsection

{{-- @section('script')
    <script>
        let id1 = 0;
        let id2 = 0;

        document.getElementById("add-variant").addEventListener("click", function(event) {
            event.preventDefault();

            id1++
            id2++

            // console.log(id1);
            let input = document.createElement("div");
            input.innerHTML = `
                        <div id="${id1}">
                            
                                <div class="row">

                                    <div class="mt-1 col-4">
                                        <select name="color[]" class="form-select">
                                            <option selected value="">Color</option>
                                            @foreach ($colors as $color)
                                                <option value="{{ $color->color }}">{{ $color->color }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mt-1 col-3">
                                        <select name="size[]" class="form-select">
                                            <option selected value="">Size</option>
                                            @foreach ($sizes as $size)
                                                <option value="{{ $size->size }}">{{ $size->size }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mt-1 col-4">
                                        <input name="stock[]" type="number" id="form-repeater-1-2" class="form-control"
                                            placeholder="Stock">
                                    </div>

                                    <button onclick="deleteElement(${id1})" type="button" class="mt-3 col-1 btn-close"></button>
                                   
                                </div>
                           
                        </div>
                        `;
            document.getElementById("variant-container").appendChild(input);
        });


        document.getElementById("custom-variant").addEventListener("click", function(event) {
            event.preventDefault();

            id1++
            id2++

            let input = document.createElement("div");
            input.innerHTML = `
                        <div id="${id2}">
                            
                                <div class="row">

                                    <div class="mt-1 col-4">
                                        <input name="color[]" type="text" id="form-repeater-1-2" class="form-control"
                                            placeholder="Color">
                                    </div>

                                    <div class="mt-1 col-3">
                                        <input name="size[]" type="text" id="form-repeater-1-2" class="form-control"
                                            placeholder="Size">
                                    </div>

                                    <div class="mt-1 col-4">
                                        <input name="stock[]" type="number" id="form-repeater-1-2" class="form-control"
                                            placeholder="Stock">
                                    </div>
                                    
                                    <button onclick="deleteElement(${id2})" type="button" class="mt-3 col-1 btn-close"></button>
                                      
                                </div>
                           
                        </div>
                        `;
            document.getElementById("variant-container").appendChild(input);
        });

        function deleteElement(id) {
            document.getElementById(id).remove();
        }
    </script>
@endsection --}}
