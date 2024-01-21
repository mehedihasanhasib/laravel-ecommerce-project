<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />

    <title>Tailkit Project</title>

    <!-- Favicons -->
    <link rel="icon" href="favicon.svg" sizes="any" type="image/svg+xml" />
    <link rel="icon" href="favicon.png" type="image/png" />

    <!-- Inter web font from Bunny.net (GDPR compliant) -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="bg-white shadow p-4 py-8 w-full" x-data="{ images: [] }">
        <div class="heading text-center font-bold text-2xl m-5 text-gray-800 bg-white">Add Product</div>
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data"
            class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
            @csrf

            {{-- title --}}
            <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" placeholder="Product Title"
                type="text" name="title">

            {{-- category --}}
            <select class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" name="category">
                <option value="null">Select Category</option>
                <option value="shirts">Shirts</option>
                <option value="jeans">Jeans</option>
                <option value="swimwear">Swimwear</option>
                <option value="sleepwear">Sleepwear</option>
                <option value="sportswear">Sportswear</option>
                <option value="jumpsuits">Jumpsuits</option>
                <option value="blazers">Blazers</option>
                <option value="jackets">Jackets</option>
                <option value="shoes">Shoes</option>
            </select>

            {{-- price --}}
            <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" placeholder="Price"
                type="number" name="price">


            {{-- stock --}}
            <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" placeholder="Stock"
                type="number" name="stock">

            {{-- description --}}
            <textarea class="description bg-gray-100 sec p-3 h-60 border border-gray-300 outline-none" spellcheck="false"
                placeholder="Describe everything about this post here" name="description"></textarea>

            <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" type="file"
                name="product_image">
            {{-- <!-- icons -->
                <div class="icons flex text-gray-500 m-2">
                    <label id="select-image">
                        <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                        </svg>
                        <input hidden type="file" multiple
                            @change="images = Array.from($event.target.files).map(file => ({url: URL.createObjectURL(file), name: file.name, preview: ['jpg', 'jpeg', 'png', 'gif'].includes(file.name.split('.').pop().toLowerCase()), size: file.size > 1024 ? file.size > 1048576 ? Math.round(file.size / 1048576) + 'mb' : Math.round(file.size / 1024) + 'kb' : file.size + 'b'}))"
                            x-ref="fileInput">

                    </label>
                    <div class="count ml-auto text-gray-400 text-xs font-semibold">0/300</div>
                </div> --}}

            <!-- Preview image here -->
            {{-- <div id="preview" class="my-4 flex">
                    <template x-for="(image, index) in images" :key="index">
                        <div class="relative w-32 h-32 object-cover rounded ">
                            <div x-show="image.preview" class="relative w-32 h-32 object-cover rounded">
                                <img :src="image.url" class="w-32 h-32 object-cover rounded">
                                <button @click="images.splice(index, 1)"
                                    class="w-6 h-6 absolute text-center flex items-center top-0 right-0 m-2 text-white text-lg bg-red-500 hover:text-red-700 hover:bg-gray-100 rounded-full p-1"><span
                                        class="mx-auto">×</span></button>
                                <div x-text="image.size" class="text-xs text-center p-2"></div>
                            </div>
                            <div x-show="!image.preview" class="relative w-32 h-32 object-cover rounded">
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 fill-white stroke-indigo-500" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg> -->
                                <svg class="fill-current  w-32 h-32 ml-auto pt-1" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M15 2v5h5v15h-16v-20h11zm1-2h-14v24h20v-18l-6-6z" />
                                </svg>
                                <button @click="images.splice(index, 1)"
                                    class="w-6 h-6 absolute text-center flex items-center top-0 right-0 m-2 text-white text-lg bg-red-500 hover:text-red-700 hover:bg-gray-100 rounded-full p-1"><span
                                        class="mx-auto">×</span></button>
                                <div x-text="image.size" class="text-xs text-center p-2"></div>
                            </div>

                        </div>
                    </template>
                </div> --}}
            <!-- Buttons -->
            <div class="buttons flex justify-end">
                <button
                    class="mt-3 btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-indigo-500">
                    Add</button>
            </div>
        </form>
    </div>

    <script>
        function isImage(file) {
            const acceptedImageTypes = ['jpg', 'jpeg', 'png', 'gif'].includes(file.name.split('.').pop().toLowerCase());
            const extension = file.name.split('.').pop().toLowerCase();
            return acceptedImageTypes.includes(extension);
        }
    </script>
</body>



</html>
