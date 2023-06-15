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
        <div class="flex items-center justify-between pb-4 bg-white dark:bg-gray-900">
            {{-- <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input wire:model="search" type="search" id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Dokter">
            </div> --}}
            <div class="relative">
                <button wire:click="addNewUser()" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah Pengguna</button>
            </div>
        </div>
    {{-- new doctor form --}}
    @if ($addUser == true)
    <div class="w-full p-4 mb-3 bg-white border border-gray-200 rounded-lg shadow sm:p-4 dark:bg-gray-800 dark:border-gray-700">
        <h5 class="mb-2 text-xl font-bold border-b text-gray-900 dark:text-white">Tambah Pengguna</h5>
        <div class="px-3 mx-3">
            <label for="" class="block mb-2 text-sm font-medium text-gray-600 dark:text-white">Nama Pengguna</label>
            <input wire:model="newName" type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('newName')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{$message}}</p>
            @enderror
        </div>
        <div class="mt-3 px-3 mx-3">
            <label for="" class="block mb-2 text-sm font-medium text-gray-600 dark:text-white">Email</label>
            <input wire:model="newEmail" type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('newEmail')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{$message}}</p>
            @enderror
        </div>
        <div class="mt-3 px-3 mx-3">
            <label for="" class="block mb-2 text-sm font-medium text-gray-600 dark:text-white">Roles</label>
            <select wire:model="newRoles"
                class=" p-2 pl-3 w-full text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Semua Kategori</option>
                @foreach ($roleslist as $role)
                    <option value="{{ $role }}">{{ $role}}</option>
                @endforeach
            </select>
            @error('newName')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{$message}}</p>
            @enderror
        </div>
        <div class="mt-3 px-3 mx-3">
            <button wire:click="store" class="my-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Simpan</button>
            <button wire:click="cancelNewUser" type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Batal</button>
        </div>
    </div>
    @endif
    </div>

        {{-- table content  --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama Pengguna
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Role
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                    @if ($userId == $item->id)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->name }}
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->email }}
                        </td>
                        <td class="px-6 py-2">
                            <select wire:model="newRoles"
                            class=" p-2 pl-3 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Semua Kategori</option>
                            @foreach ($roleslist as $role)
                                <option value="{{ $role }}">{{ $role}}</option>
                            @endforeach
                            </select>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <a wire:click="update()" href="#" class="bg-green-500 text-white rounded p-2">Simpan</a>
                            <a wire:click="cancelEdit()" href="#"  class="bg-red-500 text-white rounded p-2">Batal</a>
                        </td>
                    </tr>
                    @else
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->name }}
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->email }}
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            @foreach ($item->getRoleNames() as $roles)
                                {{ $roles }}
                            @endforeach
                        </td>
                        <td class="px-6 py-4 text-center">
                            <a wire:click="resetPassword({{$item->id}})" href="#" class="bg-red-500 text-white rounded p-2">Reset Password</a>
                            <a wire:click="showEditForm({{$item->id}})" href="#" class="bg-green-500 text-white rounded p-2">Edit</a>
                            {{-- <a wire:click="destroy({{$item->id}})" href="#" class="bg-red-500 text-white rounded p-2">Hapus</a> --}}
                        </td>
                    </tr>
                    @endif
                @endforeach

            </tbody>
        </table>
    </div>
    {{-- paginate --}}
    <div class="pt-3">
        {{ $users->links() }}
    </div>
</div>
