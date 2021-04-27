<x-template-layout>
    <div>
        <h1 class="text-xl my-2 mx-4 uppercase font-bold">{{$title}}</h1>
    </div>
    <div class="container">
        <div class="grid grid-cols-12">
            <div class="col-span-6 p-2">
                <a href="{{route('motor.create')}}"><button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                        Tambah
                    </button>
                </a>
            </div>

            <div class="col-span-6 p-2 flex justify-end">
                <form action="{{route('motor.index')}}" method="GET">
                    <input type="search"
                        class="text-xs italic rounded-r-none px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500 roundeed-full rounded-1-md sm:text-sm border-gray-300"
                        name="keyword" value="{{request('keyword')}}" placeholder="cari plat nomor">

                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm rounde-none text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        cari
                    </button>
                </form>
            </div>

        </div>
    </div>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg p-1 mx-2">
                    <table class="min-w-full divide-y divide-gray-200 bordered">

                        <thead class="bg-gray-50">
                            <tr class="text-lg uppercase">
                                <th>NO</th>
                                <th>Merk/Jenis</th>
                                <th>Plat Nomor</th>
                                <th>Nama</th>
                                <th>warna</th>
                                <th>modal</th>
                                <th>Gambar</th>
                                <th>opsi</th>

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php $no = 1; ?>
                            @foreach($motor as $value)

                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$value->merk}}</td>
                                <td>{{$value->plat_nomor}}</td>
                                <td>{{$value->nama_motor}}</td>
                                <td>{{$value->warna}}</td>
                                <td><?= ($value->harga_beli) + ($value->biaya_perbaikan); ?></td>
                                <td><img src="{{asset('storage/'. $value->cover)}}" alt="" class="w-20"></td>
                                <td>

                                    <form action="{{route('motor.destroy', $value->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('motor.edit',$value->id)}}"
                                            class="btn btn-sm bg-yellow-500 hover:bg-yellow-700 text-white-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                            Edit
                                        </a>
                                        <a href="{{route('motor.show',$value->id)}}"
                                            class="btn btn-sm bg-green-500 hover:bg-green-700 text-white-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                            Detail
                                        </a>
                                        <button type="submit"
                                            class=" my-4 btn-sm bg-red-600 hover:bg-red-700 text-white-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <?php $no++ ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</x-template-layout>