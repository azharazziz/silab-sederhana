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
                        Tgl
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
                    <th scope="col" class="px-6 py-3">
                        Validasi
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
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
                                <div class="mb-6 flex uppercase text-center border-b dark:border-gray-700">
                                    <div class="w-1/4">
                                        <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</p>
                                    </div>
                                    <div class="w-1/4">
                                        <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Parameter</p>
                                    </div>
                                    <div class="w-1/4">
                                        <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nilai Rujukan</p>
                                    </div>
                                    <div class="w-1/4">
                                        <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hasil</p>
                                    </div>
                                </div>
                                    @foreach ($item->orderParameter as $parameter)
                                        <div class="mb-6 flex">
                                            <div class="w-1/4">
                                                <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $parameter->parameter->category->category_name }}</p>

                                            </div>
                                            <div class="w-1/4">
                                                <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $parameter->parameter->parameter_name }}</p>
                                            </div>
                                            <div class="w-1/4">
                                                <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{!! nl2br($parameter->parameter->reference_value) !!}</p>
                                            </div>
                                            <div class="w-1/4 flex">
                                                <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $parameter->result }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="mb-6 flex">
                                    @if ($item->validate == 1)
                                        <button wire:click="recheck({{ $item->id }})" type="button" class="text-white bg-green-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-green-900">Recheck</button>
                                    @else
                                        <button wire:click="validating({{ $item->id }})" type="button" class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900">Validasi</button>
                                    @endif
                                    <button wire:click="cancelDetail" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Batal</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @else
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->examination_date }}
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
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->room->room_name }}
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            @if ($item->validate == 1)
                            <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                <span class="w-2 h-2 mr-1 bg-green-500 rounded-full"></span>
                                Validated
                            </span>
                                @else
                                <span class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                                    <span class="w-2 h-2 mr-1 bg-red-500 rounded-full"></span>
                                    Not Validated
                                </span>
                            @endif
                        </td>

                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <button wire:click="detail({{ $item->id }})" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">View</button>
                            @if ($item->validate == 1)
                                <button wire:click="recheck({{ $item->id }})" type="button" class="text-white bg-green-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-green-900">Recheck</button>
                            @else
                                <button wire:click="validating({{ $item->id }})" type="button" class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900">Validasi</button>
                            @endif

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
