<div>
    {{-- flash message --}}
    @if (session()->has('danger'))
        <div class="flex p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
            role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">{{ session('danger') }}</span>
            </div>
        </div>
    @endif
    @if (session()->has('success'))
        <div class="flex p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
            role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    {{-- table --}}
    <div class="relative overflow-x-auto sm:rounded-lg">
        {{-- search --}}
        <div class="flex items-center justify-between pb-4 bg-white dark:bg-gray-900">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input wire:model="search" type="search" id="table-search"
                    class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Cari Pasien">
            </div>
            <div class="relative">
                <button wire:click="addNewPatient()" type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah
                    Pasien</button>
            </div>
        </div>
    </div>

    {{-- new Patient form --}}
    @if ($addNewPatient == true)
        <form wire:submit.prevent="store">
            <div class="w-full p-4 bg-gray-50 rounded-t-xl border-x border-t dark:bg-gray-700  dark:border-gray-700">
                <h5 class="text-xl font-bold text-gray-900 dark:text-white">Tambah Pasien</h5>
            </div>
            <div
                class="w-full p-4 bg-white border-x border-gray-200 rounded-x-lg sm:p-4 dark:bg-gray-800 dark:border-gray-700">
                <div class="px-3 mx-3">
                    <div class="mb-6">
                        <label for="patient-name"
                            class="block mb-2 text-sm font-medium text-gray-600 dark:text-white">Nama Lengkap</label>
                        <input wire:model="newPatientName" type="text" id="patient-name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('newPatientName')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
                                {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                            Kelamin</label>
                        <select wire:model='newGender' id="gender"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Pilih Jenis Kelamin</option>
                            <option value="male">Laki-Laki</option>
                            <option value="female">Perempuan</option>
                        </select>
                        @error('newGender')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
                                {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="date-birth"
                            class="block mb-2 text-sm font-medium text-gray-600 dark:text-white">Tanggal Lahir</label>
                        <input wire:model="newDateBirth" type="date" id="date-birth"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('newDateBirth')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
                                {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="province"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
                        <select wire:model='newProvince' id="province"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Pilih Provinsi</option>
                            @foreach ($province as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('newProvince')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
                                {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="regency" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota/
                            Kabupaten</label>
                        <select wire:model='newRegency' id="regency"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Pilih Kota/Kabupaten</option>
                            @foreach ($regency as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('newRegency')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
                                {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="district"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan </label>
                        <select wire:model='newDistrict' id="district"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Pilih Kecamatan</option>
                            @foreach ($district as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('newDistrict')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
                                {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="village"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Desa/
                            Kelurahan</label>
                        <select wire:model='newVillage' id="village"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Pilih Desa/Kelurahan</option>
                            @foreach ($village as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('newVillage')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
                                {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="address"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                        <textarea wire:model='newAddress' name="" id="" rows="5"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                        @error('newAddress')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
                                {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="phone"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Telepon</label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                +62
                            </span>
                            <input type="text" wire:model='newPhone' id="phone"
                                class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="85XXXXXXXXX">
                        </div>
                        @error('newPhone')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
                                {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                                    </path>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                </svg>
                            </span>
                            <input type="email" wire:model='newEmail' id="email"
                                class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="">
                        </div>
                        @error('newEmail')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
                                {{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="w-full p-4 bg-gray-50 border-x border-t dark:bg-gray-700  dark:border-gray-700">
                <h5 class="text-xl font-bold text-gray-900 dark:text-white">Klinisi</h5>
            </div>
            <div class="w-full p-4 bg-white border-x border-gray-200 sm:p-4 dark:bg-gray-800 dark:border-gray-700">
                <div class="px-3 mx-3">
                    <div class="mb-6">
                        <label for="clinician"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Klinisi</label>
                        <select wire:model='newClinician' id="clinician"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Pilih Dokter</option>
                            @foreach ($clinician as $item)
                                <option value="{{ $item->id }}">{{ $item->doctor_name }}</option>
                            @endforeach
                        </select>
                        @error('newClinician')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
                                {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="analyst"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Analis
                            Kesehatan</label>
                        <select wire:model='newAnalyst' id="analyst"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Pilih Analis</option>
                            @foreach ($analyst as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('newAnalyst')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
                                {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="room"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unit/ Ruangan</label>
                        <select wire:model='newRoom' id="room"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Pilih Unit/ Ruangan</option>
                            @foreach ($room as $item)
                                <option value="{{ $item->id }}">{{ $item->room_name }}</option>
                            @endforeach
                        </select>
                        @error('newRoom')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
                                {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="registration-date"
                            class="block mb-2 text-sm font-medium text-gray-600 dark:text-white">Tanggal
                            Registrasi</label>
                        <input wire:model="newRegistrationDate" type="date" id="regitstration-date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('newRegistrationDate')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
                                {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="examination-date"
                            class="block mb-2 text-sm font-medium text-gray-600 dark:text-white">Tanggal
                            Pemeriksaan</label>
                        <input wire:model="newExaminationDate" type="date" id="examination-date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('newExaminationDate')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
                                {{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="w-full p-4 bg-gray-50 border-x border-t dark:bg-gray-700  dark:border-gray-700">
                <h5 class="text-xl font-bold text-gray-900 dark:text-white">Paket Pemeriksaan</h5>
            </div>
            <div
                class="w-full p-4 mb-3 bg-white border-x border-b border-gray-200 rounded-b-lg sm:px-4 sm:p-4 dark:bg-gray-800 dark:border-gray-700">
                <div class="px-3 mx-3">
                    @foreach ($category as $item)
                        <div class="mb-6">
                            <h5 class="text-l font-bold text-gray-900 dark:text-white">{{ $item->category_name }}</h5>
                            <div class="grid grid-flow-row-dense grid-cols-3">
                                @foreach ($item->parameter as $item)
                                    <div class="flex items-center pl-4 rounded dark:border-gray-700">
                                        <input wire:model="newParameter" type="checkbox" value="{{ $item->id }}"
                                            id="parameter-{{ $item->id }}" name="parameter"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="parameter-{{ $item->id }}"
                                            class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $item->parameter_name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                    <div class="mb-6">
                        <label for="insurance"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">jaminan</label>
                        <select wire:model='newInsurance' id="insurance"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Pilih Penyelenggara Jaminan</option>
                            <option value="BPJS">BPJS</option>
                            <option value="Mandiri">Mandiri</option>
                        </select>
                        @error('newInsurance')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
                                {{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <button type="submit"
                            class="my-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Simpan</button>
                        <button wire:click="cancelNewPatient" type="button"
                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Batal</button>
                    </div>
                </div>
            </div>
        </form>
    @endif
    {{-- table content --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nomor RM
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Pasien
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jenis Kelamin
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Alamat
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patient as $item)
                    {{-- edit --}}
                    @if ($patientId == $item->id)
                        <tr class="bg-white border-t dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-2 w-full" colspan="7">
                                <div class="my-3">
                                    <div class="mb-6 flex justify-between">
                                        <div>
                                            <span class="text-lg font-bold dark:text-white">{{ $item->name }}</span>
                                            <br>
                                            <span class="text-sm font-bold dark:text-white">{{ $item->id }}</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="bg-white dark:bg-gray-800 dark:border-gray-700">
                            <td class="w-full" colspan="7">
                                <div
                                    class="w-full p-4 bg-gray-50 border-t dark:bg-gray-700  dark:border-gray-700">
                                    <h5 class="text-xl font-bold text-gray-900 dark:text-white">Klinisi</h5>
                                </div>
                                <div
                                    class="w-full p-4 bg-white border-gray-200 sm:p-4 dark:bg-gray-800 dark:border-gray-700">
                                    <div class="px-3 mx-3">
                                        <div class="mb-6">
                                            <label for="clinician"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Klinisi</label>
                                            <select wire:model='newClinician' id="clinician"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option selected>Pilih Dokter</option>
                                                @foreach ($clinician as $item)
                                                    <option value="{{ $item->id }}">{{ $item->doctor_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('newClinician')
                                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                        class="font-medium">Oops!</span>
                                                    {{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-6">
                                            <label for="analyst"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Analis
                                                Kesehatan</label>
                                            <select wire:model='newAnalyst' id="analyst"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option selected>Pilih Analis</option>
                                                @foreach ($analyst as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('newAnalyst')
                                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                        class="font-medium">Oops!</span>
                                                    {{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-6">
                                            <label for="room"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unit/
                                                Ruangan</label>
                                            <select wire:model='newRoom' id="room"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option selected>Pilih Unit/ Ruangan</option>
                                                @foreach ($room as $item)
                                                    <option value="{{ $item->id }}">{{ $item->room_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('newRoom')
                                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                        class="font-medium">Oops!</span>
                                                    {{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-6">
                                            <label for="registration-date"
                                                class="block mb-2 text-sm font-medium text-gray-600 dark:text-white">Tanggal
                                                Registrasi</label>
                                            <input wire:model="newRegistrationDate" type="date"
                                                id="regitstration-date"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            @error('newRegistrationDate')
                                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                        class="font-medium">Oops!</span>
                                                    {{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-6">
                                            <label for="examination-date"
                                                class="block mb-2 text-sm font-medium text-gray-600 dark:text-white">Tanggal
                                                Pemeriksaan</label>
                                            <input wire:model="newExaminationDate" type="date"
                                                id="examination-date"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            @error('newExaminationDate')
                                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                        class="font-medium">Oops!</span>
                                                    {{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="w-full p-4 bg-gray-50 border-t dark:bg-gray-700  dark:border-gray-700">
                                    <h5 class="text-xl font-bold text-gray-900 dark:text-white">Paket Pemeriksaan</h5>
                                </div>
                                <div
                                    class="w-full p-4 mb-3 bg-white border-b border-gray-200 rounded-b-lg sm:px-4 sm:p-4 dark:bg-gray-800 dark:border-gray-700">
                                    <div class="px-3 mx-3">
                                        @foreach ($category as $item)
                                            <div class="mb-6">
                                                <h5 class="text-l font-bold text-gray-900 dark:text-white">
                                                    {{ $item->category_name }}</h5>
                                                <div class="grid grid-flow-row-dense grid-cols-3">
                                                    @foreach ($item->parameter as $item)
                                                        <div
                                                            class="flex items-center pl-4 rounded dark:border-gray-700">
                                                            <input wire:model="newParameter" type="checkbox"
                                                                value="{{ $item->id }}"
                                                                id="parameter-{{ $item->id }}" name="parameter"
                                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                            <label for="parameter-{{ $item->id }}"
                                                                class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $item->parameter_name }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="mb-6">
                                            <label for="insurance"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">jaminan</label>
                                            <select wire:model='newInsurance' id="insurance"
                                                class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option selected>Pilih Penyelenggara Jaminan</option>
                                                <option value="BPJS">BPJS</option>
                                                <option value="Mandiri">Mandiri</option>
                                            </select>
                                            @error('newInsurance')
                                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                        class="font-medium">Oops!</span>
                                                    {{ $message }}</p>
                                            @enderror
                                        </div>
                                        <button type="button" wire:click="order('{{ $patientId }}')"
                                            class="my-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Registrasi</button>
                                        <button wire:click="cancelReorder" type="button"
                                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Batal</button>
                                    </div>
                            </td>
                        </tr>
                    @else
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->id }}
                            </td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->name }}
                            </td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                @if ($item->gender == 'male')
                                    Laki-laki
                                @else
                                    Perempuan
                                @endif
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                {{ $item->address }}, {{ $item->village()->first()->name }},
                                {{ $item->district()->first()->name }}, {{ $item->regency()->first()->name }},
                                {{ $item->province()->first()->name }}
                            </td>
                            <td
                                class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <a wire:click="reorder('{{ $item->id }}')" href="#"
                                    class="bg-green-500 text-white rounded p-2">Pemeriksaan Baru</a>
                                <a wire:click="destroy('{{ $item->id }}')" href="#"
                                    class="bg-red-500 text-white rounded p-2">Hapus</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- paginate --}}
    <div class="pt-3">
        {{ $patient->links() }}
    </div>
</div>
