{{-- <div class="mb-5 space-y-2">
    <select wire:model.live="kategoriPemiluActive" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option selected>Harap pilih Kategori PEMILU</option>
        @forelse ($kategoriPemilus as $kategoriPemilu)
            <option value="{{ $kategoriPemilu->id }}">{{ $kategoriPemilu->nama_kategori_pemilu }}</option>
@empty
<option>Tidak ada Kategori PEMILU</option>
@endforelse
</select>
<select wire:model.live="dapilActive"
    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option selected>Harap pilih DAPIL</option>
    @forelse ($dapils as $dapil)
    <option value="{{ $dapil->id }}">{{ $dapil->nama_dapil }}</option>
    @empty
    <option>Tidak ada DAPIL</option>
    @endforelse
</select>
</div> --}}

<div>
    <label for="kel/desa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
        Harap pilih Kategori PEMILU
    </label>
    <select id="kel/desa" wire:model.live="kategoriPemiluActive"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option selected>Harap pilih Kategori PEMILU</option>
        @forelse ($kategoriPemilus as $kategoriPemilu)
        <option value="{{ $kategoriPemilu->id }}">{{ $kategoriPemilu->nama_kategori_pemilu }}</option>
        @empty
        <option>Tidak ada Kategori PEMILU</option>
        @endforelse
    </select>
    <div>@error('kategoriPemiluActive')
        <p id="kategoriPemiluActive_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
            <span class="font-medium">Maaf!</span> {{ $message }}.
        </p> @enderror
    </div>
</div>
<div>
    <label for="tps" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
        Harap pilih DAPIL
    </label>
    <select id="tps" wire:model.live="dapilActive"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option selected>Harap pilih DAPIL</option>
        @forelse ($dapils as $dapil)
        <option value="{{ $dapil->id }}">{{ $dapil->nama_dapil }}</option>
        @empty
        <option>Tidak ada DAPIL</option>
        @endforelse
    </select>
    <div>@error('dapilActive')
        <p id="dapilActive_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
            <span class="font-medium">Maaf!</span> {{ $message }}.
        </p> @enderror
    </div>
</div>