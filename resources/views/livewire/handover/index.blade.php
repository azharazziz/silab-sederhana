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
                        Ket.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Petugas
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Penerima
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->patient->id }}
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            {{ $item->patient->name }}
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            {{ $item->patient->address}}, {{ $item->patient->village()->first()->name }}, {{ $item->patient->district()->first()->name }}, {{ $item->patient->regency()->first()->name }}, {{ $item->patient->province()->first()->name }}
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            {{ $item->room->room_name }}
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            @if ($item->delivery_officer == null && $item->receiver == null)
                                Menunggu
                            @else
                                Diserahkan
                            @endif
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            @if ($item->delivery_officer == null)
                            <select  wire:model='officer.{{ $item->id }}.value' class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">Pilih</option>
                                @foreach ($analysts as $analyst)
                                    <option value="{{ $analyst->name }}">{{ $analyst->name }}</option>
                                @endforeach
                            </select>
                            @error('officer')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
                                    {{ $message }}</p>
                            @enderror
                            @else
                                {{ $item->delivery_officer }}
                            @endif

                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            @if ($item->receiver == null)
                                <input  wire:model='receiver.{{ $item->id }}.value' type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @error('receiver')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
                                    {{ $message }}</p>
                                @enderror
                            @else
                            {{ $item->receiver }}
                            @endif

                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            @if ($item->delivery_officer == null && $item->receiver == null)
                                @if (@$receiver[$item->id]['value']!="" && @$officer[$item->id]['value']!="")
                                    <a wire:click="handover('{{ $item->id }}')" type="button" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900 cursor-pointer">Serahkan</a>
                                @else
                                <button type="button" disabled class="text-white bg-slate-700 hover:bg-slate-800 focus:outline-none focus:ring-4 focus:ring-slate-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-900 cursor-pointer">Serahkan</button>
                                @endif
                            @else
                            <a wire:click="cancelHandover('{{ $item->id }}')" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 cursor-pointer">Batalkan</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- paginate --}}
    <div class="pt-3">
        {{ $order->links() }}
    </div>
</div>
