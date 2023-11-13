<div class="mb-5 space-y-2">
    <select wire:model.live="kategoriPemilu" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option>Harap pilih Kategori PEMILU</option>
        @forelse ($kategoriPemilus as $kategoriPemilu)
            <option value="{{ $kategoriPemilu->id }}">{{ $kategoriPemilu->nama_kategori_pemilu }}</option>
        @empty
            <option>Tidak ada Kategori PEMILU</option>
        @endforelse
    </select>
    <select wire:model.live="dapilActive" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option>Harap pilih DAPIL</option>
        @forelse ($dapils as $dapil)
            <option value="{{ $dapil->id }}">{{ $dapil->nama_dapil }}</option>
        @empty
            <option>Tidak ada DAPIL</option>
        @endforelse
    </select>
</div>