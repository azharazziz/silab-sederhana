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
                        Status
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
                        <td class="px-6 py-2 w-full" colspan="8">
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
                                    <div class="w-1/2">
                                        <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Parameter</p>
                                    </div>
                                    <div class="w-1/4">
                                        <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Biaya</p>
                                    </div>
                                </div>
                                    @foreach ($item->orderParameter as $parameter)
                                        <div class="mb-6 flex">
                                            <div class="w-1/4">
                                                <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $parameter->parameter->category->category_name }}</p>

                                            </div>
                                            <div class="w-1/2">
                                                <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $parameter->parameter->parameter_name }}</p>
                                            </div>
                                            <div class="w-1/4">
                                                <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-right">Rp.{{ $parameter->price }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="mb-6 pt-6 flex border-t dark:bg-gray-800 dark:border-gray-700 ">
                                        <div class="w-1/4">
                                            <p class="block mb-2 text-sm text-gray-900 dark:text-white font-black uppercase">Total Tagihan</p>
                                        </div>
                                        <div class="w-1/2">
                                            </div>
                                        <div class="w-1/4">
                                            <p class="block mb-2 text-sm font text-gray-900 dark:text-white text-right font-black">Rp.{{ $item->orderParameter->sum('price') }}</p>
                                        </div>
                                    </div>
                                    <div class="mb-6 border-t pt-6">
                                        <a href="{{ route('invoice',[$item->id]) }}" target="_blank" popup="yes" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 cursor-pointer">Print Tagihan</a>
                                        @if ($item->paid_status == 'Belum Bayar')
                                        <a wire:click="insurance" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 cursor-pointer">Jaminan</a>
                                        <a wire:click="paid" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 cursor-pointer">Lunas</a>
                                        @endif
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
                            {{ $item->paid_status }}
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a wire:click="view({{ $item->id }})" popup="yes" type="button" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900 cursor-pointer">Tagihan</a>
                            <a href="{{ route('invoice',[$item->id]) }}" target="_blank" popup="yes" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 cursor-pointer">Print</a>
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
