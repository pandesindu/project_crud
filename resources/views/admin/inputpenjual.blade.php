<x-template-layout>
    <div>
        <h1 class="text-xl my-2 mx-4 uppercase font-bold">{{$title}}</h1>
    </div>

    <div class="mt-1 md:mt-0 md:col-span-2">
        <form action="{{(isset($penjual))?route('penjual.update',$penjual->id ): route('penjual.store')}}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @if((isset($penjual)))
            @method('PUT')
            @endif
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label class="block text-sm font-medium text-gray-700">Nama Penjual
                            </label>
                            <input type="text" name="nama_penjual"
                                value="{{(isset($penjual))?$penjual->nama_penjual:old ('nama_penjual')}}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('plat_nomor') border-red-500 @enderror">
                            <div class="text-xs text-red-500">@error('nama_penjual'){{$message}} @enderror</div>
                        </div>


                        <div class="col-span-6 sm:col-span-4">
                            <label class="block text-sm font-medium text-gray-700">Alamat</label>
                            <input type="text" name="alamat"
                                value="{{(isset($penjual))?$penjual->alamat:old ('alamat')}}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('nama_motor') border-red-500 @enderror">
                            <div class="text-xs text-red-500">@error('alamat'){{$message}} @enderror</div>
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                            <input type="text" name="no_hp" value="{{(isset($penjual))?$penjual->no_hp:old ('no_hp')}}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('nama_motor') border-red-500 @enderror">
                            <div class="text-xs text-red-500">@error('no_hp'){{$message}} @enderror</div>
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label class="block text-sm font-medium text-gray-700">Status
                            </label>
                            <select name="status"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('merk') border-red-500 @enderror">
                                <option>Partner</option>
                                <option>Bukan Partner</option>
                            </select>
                            <div class="text-xs text-red-500">@error('status'){{$message}} @enderror</div>
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label class="block text-sm font-medium text-gray-700">Plat Nomor
                            </label>
                            <select name="motor_id"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('merk') border-red-500 @enderror">
                                @foreach($motor as $item)

                                <option value="{{$item->id}}">{{$item->plat_nomor}}</option>
                                @endforeach
                            </select>
                            <!-- <div class="text-xs text-red-500">@error('status'){{$message}} @enderror</div> -->
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