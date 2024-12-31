@extends('layouts.app')

@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.min.css" rel="stylesheet">
@endsection

@section('content')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $product->name }}
    </h2>


    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="p-4">
                        <div class="flex justify-between items-center">
                            <h1 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">Agregar imagen</h1>
                            <a href="{{ route('products.show', ['product' => $product]) }}"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ver
                                product</a>
                            {{-- show errors ->with('error', 'Error al guardar la imagen: El producto ya tiene 5 imágenes.'); --}}
                            @if (session('error'))
                                <div class="text-red-600">{{ session('error') }}</div>
                            @endif

                            {{-- show errors validation --}}
                            @if ($errors->any())
                                <div class="text-red-600">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        </div>

                        {{-- Subir imagen --}}
                        <div class="mt-5">

                            <form action="{{ route('products.images.store', ['product' => $product]) }}"
                                enctype="multipart/form-data" method="POST">
                                @csrf
                                {{-- input name --}}
                                <div class="mt-5">
                                    <label for="name"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                        Nombre de la Imagen
                                    </label>
                                    <div class="mt-1">
                                        <input id="name" name="name" type="text" autocomplete="name"
                                            value="{{ old('name') }}" required
                                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    </div>
                                    @error('name')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- crop measures --}}
                                <input style="display: none" id="medidas_crop" name="medidas_crop" type="text">

                                {{-- input img --}}
                                <div class="mt-5">
                                    <input type="file" id="inputImg" name="img" accept="image/*"
                                        @if ($product->images->count() == 0) onchange="onchace(this, true)" @else onchange="onchace(this, false)" @endif>
                                </div>

                                {{-- select aspect ratio --}}
                                @if ($product->images->count() == 0)
                                    <div class="mt-5 flex justify-center">
                                        <div class="relative inline-flex">
                                            <select id="aspect_ratio" name="aspect_ratio" onchange="croppear()"
                                                class="appearance-none bg-white border border-gray-300 px-4 py-2 rounded-lg shadow-sm text-sm focus:outline-none focus:border-indigo-500"
                                                required>
                                                <option value="">Medidas</option>
                                                @foreach ($aspect_ratio_list as $ratio)
                                                    <option value="{{ $ratio }}">{{ $ratio }}</option>
                                                @endforeach
                                            </select>
                                            <span
                                                class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-crop"><path d="M6.13 1L6 16a2 2 0 0 0 2 2h15"></path><path d="M1 6.13L16 6a2 2 0 0 1 2 2v15"></path></svg> --}}
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m7.848 8.25 1.536.887M7.848 8.25a3 3 0 1 1-5.196-3 3 3 0 0 1 5.196 3Zm1.536.887a2.165 2.165 0 0 1 1.083 1.839c.005.351.054.695.14 1.024M9.384 9.137l2.077 1.199M7.848 15.75l1.536-.887m-1.536.887a3 3 0 1 1-5.196 3 3 3 0 0 1 5.196-3Zm1.536-.887a2.165 2.165 0 0 0 1.083-1.838c.005-.352.054-.695.14-1.025m-1.223 2.863 2.077-1.199m0-3.328a4.323 4.323 0 0 1 2.068-1.379l5.325-1.628a4.5 4.5 0 0 1 2.48-.044l.803.215-7.794 4.5m-2.882-1.664A4.33 4.33 0 0 0 10.607 12m3.736 0 7.794 4.5-.802.215a4.5 4.5 0 0 1-2.48-.043l-5.326-1.629a4.324 4.324 0 0 1-2.068-1.379M14.343 12l-2.882 1.664" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                @else
                                    <div class="mt-5 flex justify-center">
                                        <div class="relative inline-flex">
                                            <select id="aspect_ratio" name="aspect_ratio" disabled
                                                class="appearance-none bg-white border border-gray-300 px-4 py-2 rounded-lg shadow-sm text-sm focus:outline-none focus:border-indigo-500">
                                                <option value="{{ $product->images->first()->aspect_ratio }}" selected>
                                                    {{ $product->images->first()->aspect_ratio }}
                                                </option>
                                            </select>
                                            <span
                                                class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-crop"><path d="M6.13 1L6 16a2 2 0 0 0 2 2h15"></path><path d="M1 6.13L16 6a2 2 0 0 1 2 2v15"></path></svg> --}}
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m7.848 8.25 1.536.887M7.848 8.25a3 3 0 1 1-5.196-3 3 3 0 0 1 5.196 3Zm1.536.887a2.165 2.165 0 0 1 1.083 1.839c.005.351.054.695.14 1.024M9.384 9.137l2.077 1.199M7.848 15.75l1.536-.887m-1.536.887a3 3 0 1 1-5.196 3 3 3 0 0 1 5.196-3Zm1.536-.887a2.165 2.165 0 0 0 1.083-1.838c.005-.352.054-.695.14-1.025m-1.223 2.863 2.077-1.199m0-3.328a4.323 4.323 0 0 1 2.068-1.379l5.325-1.628a4.5 4.5 0 0 1 2.48-.044l.803.215-7.794 4.5m-2.882-1.664A4.33 4.33 0 0 0 10.607 12m3.736 0 7.794 4.5-.802.215a4.5 4.5 0 0 1-2.48-.043l-5.326-1.629a4.324 4.324 0 0 1-2.068-1.379M14.343 12l-2.882 1.664" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                @endif

                                {{-- crop --}}
                                <div class="mt-5 flex justify-center">
                                    <div id="col" class="max-w-xl"></div>
                                </div>

                                {{-- crop buttons --}}
                                <div class="mt-5 flex justify-center">
                                    <button
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        style="display:none" id="upload_button" type="submit">
                                        Recortar y Subir
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-5">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="p-4">
                        <div class="flex justify-between items-center">
                            <h2 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">Imágenes Actuales</h2>
                        </div>
                        <div class="mt-5">
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                                @foreach ($product->images as $image)
                                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                        <div class="p-6 text-gray-900 dark:text-gray-100">
                                            <div class="p-4">
                                                <img src="/storage/products/{{ $image->url }}" alt="{{ $image->name }}"
                                                    class="w-full h-48 object-cover object-center">
                                                <div class="mt-4">
                                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                        {{ $image->name }}
                                                    </h3>
                                                    <div class="mt-2">
                                                        <form action="{{ route('products.images.destroy', ['product' => $product, 'image' => $image]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                                                Eliminar
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.10.1/Sortable.min.js"></script>
    <script>
        var buttonsCrop, upload_button, inputMedidasCrop, image_show, imgs_sort, el, sortable, updateOrden;

        function update() {
            buttonsCrop = document.getElementsByClassName("cropx");
            upload_button = document.getElementById('upload_button');
            inputMedidasCrop = document.getElementById('medidas_crop');
            updateOrden = document.getElementById('updateOrden');
            image_show = "";
        }

        //recortar la imagen
        let cropper;
        let aspectRatio = 1;

        function croppear() {
            var image_show = document.getElementById("image_show");
            var imgData = {
                resume: false,
                order: "",
                name: "",
                x: "",
                y: "",
                width: "",
                height: ""
            }
            aspectRatio = document.getElementById("aspect_ratio").value;

            //aspect ratio
            let aspect_ratio_list = [
                '16:9',
                '4:3',
                '1:1',
                '3:2',
                '2:3',
                '3:4',
                '9:16'
            ];

            switch (aspectRatio) {
                case '16:9':
                    aspectRatio = 16 / 9;
                    break;
                case '4:3':
                    aspectRatio = 4 / 3;
                    break;
                case '1:1':
                    aspectRatio = 1;
                    break;
                case '3:2':
                    aspectRatio = 3 / 2;
                    break;
                case '2:3':
                    aspectRatio = 2 / 3;
                    break;
                case '3:4':
                    aspectRatio = 3 / 4;
                    break;
                case '9:16':
                    aspectRatio = 9 / 16;
                    break;
                default:
                    aspectRatio = NaN;
                    alert("Seleccione una medida");
                    return;
            }

            for (let i = 0; i < buttonsCrop.length; i++) {
                buttonsCrop[i].style.display = "none";
                upload_button.style.display = "inline-block";
            }

            if (cropper) {
                cropper.destroy();
            }

            cropper = new Cropper(image_show, {
                aspectRatio: aspectRatio,
                crop(e) {
                    var i = e.detail;
                    imgData.x = i.x;
                    imgData.y = i.y;
                    imgData.w = i.width;
                    imgData.h = i.height;
                    inputMedidasCrop.value = JSON.stringify(imgData);
                },
            });
        }


        //seleccionar y mostrar imagen
        function onchace(e, first) {
            inputMedidasCrop.value = "";
            if (image_show) {
                image_show.remove();
            }
            if (e.files.length > 0) {
                let reader = new FileReader();
                // Leemos el archivo subido y se lo pasamos a nuestro fileReader
                reader.readAsDataURL(e.files[0]);
                // Le decimos que cuando este listo ejecute el código interno
                reader.onload = function() {
                    let preview = document.getElementById('col');
                    image = document.createElement('img');
                    image.src = reader.result;
                    image.id = "image_show";
                    image.classList.add("img-fluid");
                    preview.innerHTML = '';
                    preview.append(image);
                    for (let i = 0; i < buttonsCrop.length; i++) {
                        buttonsCrop[i].style.display = "inline-block";
                        upload_button.style.display = "none";
                    }
                    upload_button.style.display = "block";

                    if (!first) {
                        croppear();
                    }
                }
            }
        }

        //funcion principal
        window.onload = function() {
            update();
        };
    </script>
@endsection
