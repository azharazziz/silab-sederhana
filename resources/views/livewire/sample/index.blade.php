<div>
    {{-- flash message --}}
    @if (session()->has('danger'))
    <div class="flex p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Info</span>
        <div>
          <span class="font-medium">{{ session('danger') }}</span>
        </div>
    </div>
    @endif
    @if (session()->has('success'))
    <div class="flex p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    </div>
    @endif

    {{-- table --}}
    <div class="relative overflow-x-auto sm:rounded-lg">
        {{-- search  --}}
        {{-- <div class="flex items-center justify-between pb-4 bg-white dark:bg-gray-900">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input wire:model="search" type="search" id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Kategori">
            </div>
        </div> --}}
    </div>
    {{-- table content --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No. Lab
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nomor RM
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Alamat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ruangan
                    </th>
                    {{-- <th scope="col" class="px-6 py-3">
                        Status
                    </th> --}}
                    <th scope="col" class="px-6 py-3">
                        Keterangan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order as $item)
                    @if ($orderId == $item->id)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-2 w-full" colspan="7">
                            <div class="my-3">
                                <form>
                                    <div class="mb-6 flex justify-between">
                                        <div>
                                            <span class="text-lg font-bold dark:text-white">{{ $item->patient->name }}</span>
                                            <br>
                                            <span class="text-sm font-bold dark:text-white">{{ $item->patient->id }}</span>
                                        </div>
                                        <div class="text-right">
                                            <span class="text-lg font-bold dark:text-white">Lab Number</span>
                                            <br>
                                            <span class="text-sm font-bold dark:text-white">{{ $item->id }}</span>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <h5 class="text-l font-bold text-gray-900 dark:text-white">Jenis Tabung/Wadah</h5>
                                        <div class="grid grid-flow-row-dense grid-cols-2">
                                            <div class="flex items-center pl-4 rounded dark:border-gray-700">
                                                <input wire:model="newStorageType" type="checkbox" value="Clot Activator" id="clot-activator" name="parameter" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="clot-activator" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Clot Activator</label>
                                            </div>
                                            <div class="flex items-center pl-4 rounded dark:border-gray-700">
                                                <input wire:model="newStorageType" type="checkbox" value="EDTA" id="edta" name="parameter" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="edta" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">EDTA</label>
                                            </div>
                                            <div class="flex items-center pl-4 rounded dark:border-gray-700">
                                                <input wire:model="newStorageType" type="checkbox" value="Sitrat" id="sitrat" name="parameter" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="sitrat" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sitrat</label>
                                            </div>
                                            <div class="flex items-center pl-4 rounded dark:border-gray-700">
                                                <input wire:model="newStorageType" type="checkbox" value="Heparin" id="heparin" name="parameter" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="heparin" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Heparin</label>
                                            </div>
                                            <div class="flex items-center pl-4 rounded dark:border-gray-700">
                                                <input wire:model="newStorageType" type="checkbox" value="Urin" id="urin" name="parameter" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="urin" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Urin</label>
                                            </div>
                                            <div class="flex items-center pl-4 rounded dark:border-gray-700">
                                                <input wire:model="newStorageType" type="checkbox" value="Pot Dahak" id="pot-dahak" name="parameter" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="pot-dahak" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pot Dahak</label>
                                            </div>
                                        </div>
                                        <div class="flex justify-first">
                                            <div>
                                                <button wire:click="addStorage" type="button" class="my-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambahkan Tempat Penyimpanan</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <h5 class="text-l font-bold text-gray-900 dark:text-white">Volume Sampel</h5>
                                        @foreach ($item->sample as $sample)
                                            <div class="flex gap-4 items-center p-4 rounded dark:border-gray-700">
                                                <label for="{{ $sample->type }}" class=" w-1/4 block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $sample->type }}</label>
                                                <div class="flex w-1/4">
                                                    <input wire:model="sample.{{ $sample->id }}.volume" type="text" id="{{ $sample->type }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-r-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                                        ml
                                                    </span>
                                                </div>
                                                <select wire:model="sample.{{ $sample->id }}.note" class="w-1/4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option>Pilih</option>
                                                    <option value="Sesuai">Sesuai</option>
                                                    <option value="Tidak Sesuai">Tidak Sesuai</option>
                                                </select>
                                                <div class="w-1/4 flex gap-4">
                                                    <button wire:click="deleteStorage('{{ $sample->id }}')" type="button" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm  p-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Hapus</button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="mb-6">
                                        <label for="note-order" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan Khusus</label>
                                        <input wire:model='noteOrder' type="text" id="note-order" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>
                                    <button wire:click="verify('{{ $item->id }}')" type="button" class="my-3 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-blue-800">Verifikasi</button>
                                    <button wire:click="reject('{{ $item->id }}')" type="button" class="my-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tolak</button>
                                    <button wire:click="cancelEdit" type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Batal</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @else
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->id }}
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->patient->id }}
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->patient->name }}
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            {{ $item->patient->address}}, {{ $item->patient->village()->first()->name }}, {{ $item->patient->district()->first()->name }}, {{ $item->patient->regency()->first()->name }}, {{ $item->patient->province()->first()->name }}
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            {{ $item->room->room_name }}
                        </td>
                        {{-- <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->status }}
                        </td> --}}
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            @if (!is_null($item->verify) && $item->verify == 0)
                                Tidak Memenuhi Syarat
                            @endif
                            @if (is_null($item->verify))
                                Belum Diverifikasi
                            @endif
                            @if ($item->verify == 1)
                               {{ $item->verify_date }}
                            @endif

                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="{{ route('barcode',[$item->id]) }}" target="_blank" class="cursor-pointer text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900">Barcode</a>
                            <button wire:click="showEditForm('{{$item->id}}')" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Verifikasi</button>
                        </td>
                    </tr>
                    @endif
                @endforeach

            </tbody>
        </table>
    </div>
    {{-- paginate --}}
    <div class="pt-3">
        {{ $order->links() }}
    </div>
</div>
