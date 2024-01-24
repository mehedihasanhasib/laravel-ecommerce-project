@extends('admin_index', ['addproduct' => 'active'])
@section('content')
    <div class="col-12">
        <!-- Product Information -->
        <form action="">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-tile mb-0">Product information</h5>
                </div>
                <div class="card-body">
                    {{-- title --}}
                    <div class="mb-3">
                        <label class="form-label" for="ecommerce-product-name">Title</label>
                        <input type="text" class="form-control" id="ecommerce-product-name" placeholder="Product title"
                            name="productTitle" aria-label="Product title">
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea rows="7" class="form-control p-2 pt-2"></textarea>
                    </div>


                    <!-- Media -->
                    <div class="mb-3">

                        <label for="formFileMultiple" class="form-label">Multiple files input example</label>
                        <input class="form-control" type="file" id="formFileMultiple" multiple />

                    </div>


                    <!-- Variants -->


                    <div class="form-repeater" data-select2-id="19">
                        <div data-repeater-list="group-a" data-select2-id="18">
                            <div data-repeater-item="" data-select2-id="17">
                                <div class="row" data-select2-id="16">

                                    <div class="mb-3 col-4" data-select2-id="15">
                                        <label class="form-label" for="form-repeater-1-1">Options</label>
                                        <div class="position-relative" data-select2-id="14"><select id="form-repeater-1-1"
                                                class="select2 form-select select2-hidden-accessible"
                                                data-placeholder="Size" tabindex="-1" aria-hidden="true"
                                                data-select2-id="form-repeater-1-1">
                                                <option value="" data-select2-id="184">Size</option>
                                                <option value="size" data-select2-id="241">Size</option>
                                                <option value="color" data-select2-id="242">Color</option>
                                                <option value="weight" data-select2-id="243">Weight</option>
                                                <option value="smell" data-select2-id="244">Smell</option>
                                            </select><span
                                                class="select2 select2-container select2-container--default select2-container--below"
                                                dir="ltr" data-select2-id="183" style="width: 194.219px;"><span
                                                    class="selection"><span
                                                        class="select2-selection select2-selection--single" role="combobox"
                                                        aria-haspopup="true" aria-expanded="false" tabindex="0"
                                                        aria-disabled="false"
                                                        aria-labelledby="select2-form-repeater-1-1-container"><span
                                                            class="select2-selection__rendered"
                                                            id="select2-form-repeater-1-1-container" role="textbox"
                                                            aria-readonly="true" title="Color">Color</span><span
                                                            class="select2-selection__arrow" role="presentation"><b
                                                                role="presentation"></b></span></span></span><span
                                                    class="dropdown-wrapper" aria-hidden="true"></span></span></div>
                                    </div>

                                    <div class="mb-3 col-8">
                                        <label class="form-label invisible" for="form-repeater-1-2">Not
                                            visible</label>
                                        <input type="number" id="form-repeater-1-2" class="form-control"
                                            placeholder="Enter size">
                                    </div>

                                </div>
                            </div>
                            <div data-repeater-item="" style="" data-select2-id="249">
                                <div class="row" data-select2-id="248">

                                    <div class="mb-3 col-4" data-select2-id="247">
                                        <label class="form-label" for="form-repeater-2-1">Options</label>
                                        <div class="position-relative" data-select2-id="246"><select id="form-repeater-2-1"
                                                class="select2 form-select select2-hidden-accessible"
                                                data-placeholder="Size" tabindex="-1" aria-hidden="true"
                                                data-select2-id="form-repeater-2-1">
                                                <option value="" data-select2-id="191">Size</option>
                                                <option value="size" data-select2-id="250">Size</option>
                                                <option value="color" data-select2-id="251">Color</option>
                                                <option value="weight" data-select2-id="252">Weight</option>
                                                <option value="smell" data-select2-id="253">Smell</option>
                                            </select><span
                                                class="select2 select2-container select2-container--default select2-container--below"
                                                dir="ltr" data-select2-id="190" style="width: 194.219px;"><span
                                                    class="selection"><span
                                                        class="select2-selection select2-selection--single"
                                                        role="combobox" aria-haspopup="true" aria-expanded="false"
                                                        tabindex="-1" aria-disabled="false"
                                                        aria-labelledby="select2-form-repeater-2-1-container"><span
                                                            class="select2-selection__rendered"
                                                            id="select2-form-repeater-2-1-container" role="textbox"
                                                            aria-readonly="true" title="Size">Size</span><span
                                                            class="select2-selection__arrow" role="presentation"><b
                                                                role="presentation"></b></span></span></span><span
                                                    class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>

                                    <div class="mb-3 col-8">
                                        <label class="form-label invisible" for="form-repeater-2-2">Not
                                            visible</label>
                                        <input type="number" id="form-repeater-2-2" class="form-control"
                                            placeholder="Enter size">
                                    </div>

                                </div>
                            </div>
                            <div data-repeater-item="" style="">
                                <div class="row">

                                    <div class="mb-3 col-4">
                                        <label class="form-label" for="form-repeater-3-3">Options</label>
                                        <div class="position-relative"><select id="form-repeater-3-3"
                                                class="select2 form-select select2-hidden-accessible"
                                                data-placeholder="Size" tabindex="-1" aria-hidden="true"
                                                data-select2-id="form-repeater-3-3">
                                                <option value="" data-select2-id="198">Size</option>
                                                <option value="size">Size</option>
                                                <option value="color">Color</option>
                                                <option value="weight">Weight</option>
                                                <option value="smell">Smell</option>
                                            </select><span class="select2 select2-container select2-container--default"
                                                dir="ltr" data-select2-id="197" style="width: 194.219px;"><span
                                                    class="selection"><span
                                                        class="select2-selection select2-selection--single"
                                                        role="combobox" aria-haspopup="true" aria-expanded="false"
                                                        tabindex="-1" aria-disabled="false"
                                                        aria-labelledby="select2-form-repeater-3-3-container"><span
                                                            class="select2-selection__rendered"
                                                            id="select2-form-repeater-3-3-container" role="textbox"
                                                            aria-readonly="true"><span
                                                                class="select2-selection__placeholder">Size</span></span><span
                                                            class="select2-selection__arrow" role="presentation"><b
                                                                role="presentation"></b></span></span></span><span
                                                    class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>

                                    <div class="mb-3 col-8">
                                        <label class="form-label invisible" for="form-repeater-3-4">Not
                                            visible</label>
                                        <input type="number" id="form-repeater-3-4" class="form-control"
                                            placeholder="Enter size">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary" data-repeater-create="">
                                Add another option
                            </button>
                        </div>
                    </div>


                    <!-- /Variants -->

                </div>
            </div>


        </form>
        <!-- /Product Information -->


    </div>
@endsection
