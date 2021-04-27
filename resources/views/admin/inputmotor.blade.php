<x-template-layout>
    <div>
        <h1 class="text-xl my-2 mx-4 uppercase font-bold">{{$title}}</h1>
    </div>

    <div class="mt-1 md:mt-0 md:col-span-2">
        <form action="{{(isset($motor))?route('motor.update', $motor->id ): route('motor.store')}}" method="POST"
            enctype="multipart/form-data">
            @csrf

            @if((isset($motor)))
            @method('PUT')
            @endif
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label class="block text-sm font-medium text-gray-700">Plat Nomor
                            </label>
                            <input type="text" name="plat_nomor"
                                value="{{(isset($motor))?$motor->plat_nomor:old ('plat_nomor')}}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('plat_nomor') border-red-500 @enderror">
                            <div class="text-xs text-red-500">@error('plat_nomor'){{$message}} @enderror</div>
                        </div>


                        <div class="col-span-6 sm:col-span-4">
                            <label class="block text-sm font-medium text-gray-700">Nama Motor</label>
                            <input type="text" name="nama_motor"
                                value="{{(isset($motor))?$motor->nama_motor:old ('nama_motor')}}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('nama_motor') border-red-500 @enderror">
                            <div class="text-xs text-red-500">@error('nama_motor'){{$message}} @enderror</div>
                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            <label class="block text-sm font-medium text-gray-700">Merk
                            </label>
                            <select name="merk"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('merk') border-red-500 @enderror">
                                <option>Yamaha</option>
                                <option>Honda</option>
                                <option>Suzuki</option>
                            </select>
                            <div class="text-xs text-red-500">@error('merk'){{$message}} @enderror</div>
                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            <label class="block text-sm font-medium text-gray-700">Warna
                            </label>
                            <input type="text" name="warna" value="{{(isset($motor))?$motor->warna:old ('warna')}}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('warna') border-red-500 @enderror">
                            <div class="text-xs text-red-500">@error('warna'){{$message}} @enderror</div>
                        </div>


                        <div class="col-span-6 sm:col-span-6">
                            <label class="block text-sm font-medium text-gray-700">Tahun Kendaraan
                            </label>
                            <input type="text" name="tahun_kendaraan"
                                value="{{(isset($motor))?$motor->tahun_kendaraan: old('tahun_kendaraan')}}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('warna') border-red-500 @enderror">
                            <div class="text-xs text-red-500">@error('tahun_kendaraan'){{$message}} @enderror</div>
                        </div>


                        <div class="col-span-6 sm:col-span-6">
                            <label class="block text-sm font-medium text-gray-700">Harga Beli
                            </label>
                            <input type="text" name="harga_beli"
                                value="{{(isset($motor))?$motor->harga_beli:old ('harga_beli')}}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('warna') border-red-500 @enderror">
                            <div class="text-xs text-red-500">@error('harga_beli'){{$message}} @enderror</div>
                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            <label class="block text-sm font-medium text-gray-700">Biaya Perbaikan
                            </label>
                            <input type="text" name="biaya_perbaikan"
                                value="{{(isset($motor))?$motor->biaya_perbaikan:old ('biaya_perbaikan')}}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('warna') border-red-500 @enderror">
                            <div class="text-xs text-red-500">@error('biaya_perbaikan'){{$message}} @enderror</div>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label class="block text-sm font-medium text-gray-700">Nomor Mesin
                            </label>
                            <input type="text" name="no_mesin"
                                value="{{(isset($motor))?$motor->no_mesin:old ('no_mesin')}}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('no_mesin') border-red-500 @enderror">
                            <div class="text-xs text-red-500">@error('no_mesin'){{$message}} @enderror</div>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label class="block text-sm font-medium text-gray-700">Nomor Rangka
                            </label>
                            <input type="text" name="no_rangka"
                                value="{{(isset($motor))?$motor->no_rangka:old ('no_rangka')}}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('no_rangka') border-red-500 @enderror">
                            <div class="text-xs text-red-500">@error('no_rangka'){{$message}} @enderror</div>
                        </div>

                        <!-- <div class="col-span-6">
                            <label class="block text-sm font-medium text-gray-700">Modal</label>
                            <input type="number" name="modal" value="{{(isset($motor))?$motor->modal:old ('modal')}}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('modal') border-red-500 @enderror">
                            <div class="text-xs text-red-500">@error('modal'){{$message}} @enderror</div>
                        </div> -->

                        <!-- <div class="col-span-6">
                            <span>Gambar</span>
                            <div
                                class="relative h-40 rounded-lg border-dashed border-2 border-indigo-200 bg-white flex justify-center items-center hover:cursor-pointer @error('cover') border-red-500 @enderror">
                                <div class="absolute">
                                    <div class="flex flex-col items-center ">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                        </svg>
                                        <span class="block text-gray-400 font-normal">Attach you files here</span>
                                        <span class="block text-gray-400 font-normal">or</span>
                                        <span class="block text-blue-400 font-normal">Browse files</span>
                                    </div>
                                </div>

                                <input type="file" class="h-full w-full opacity-0" name="cover">
                            </div>
                            <div class="flex justify-between items-center text-gray-400">
                                <span>Accepted file type:.jpg,.png, .bmp only</span>
                                <span class="flex items-center "> <i class="fa fa-lock mr-1"></i> secure</span>
                            </div>
                            <div class="text-xs text-red-500">@error('cover'){{$message}} @enderror</div>
                        </div> -->
                        <div class="col-span-6">
                            <label class="block text-sm font-medium text-gray-700">
                                Gambar
                            </label>
                            <div
                                class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">

                                    @if (isset($motor) && $motor->cover !=='')
                                    <img src="{{asset('storage/'. $motor->cover)}}" alt=""
                                        class="mx-auto h-12 w-12 text-gray-400">
                                    @else
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                        viewBox="0 0 48 48" aria-hidden="true">
                                        <path
                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    @endif

                                    <div class="flex text-sm text-gray-600">
                                        <label for="file-upload"
                                            class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                            <span>Upload a file</span>
                                            <input id="file-upload" name="cover" type="file" class="sr-only">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">
                                        PNG, JPG, GIF up to 10MB
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>




</x-template-layout>