<div class="mb-5">
    <div class="flex flex-col space-y-2">
        <select wire:model.live="kabKotaActive" aria-placeholder="Pilih Kabupaten Kota" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option>Harap pilih Kategori PEMILU</option>
            @forelse ($kabKotas as $kabKota)
                <option value="{{ $kabKota->id }}">{{ $kabKota->nama_kabupaten_kota }}</option>
            @empty
                <option>Tidak ada Kategori PEMILU</option>
            @endforelse
        </select>
        <select wire:model.live="kecamatanActive" aria-placeholder="Pilih Kabupaten Kota" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option>Harap pilih Kategori PEMILU</option>
            @forelse ($kecamatans as $kecamatan)
                <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama_kecamatan }}</option>
            @empty
                <option>Tidak ada Kategori PEMILU</option>
            @endforelse
        </select>
        <select wire:model.live="kelDesaActive" aria-placeholder="Pilih Kabupaten Kota" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option>Harap pilih Kategori PEMILU</option>
            @forelse ($kelDesas as $kelDesa)
                <option value="{{ $kelDesa->id }}">{{ $kelDesa->nama_kelurahan_desa }}</option>
            @empty
                <option>Tidak ada Kategori PEMILU</option>
            @endforelse
        </select>
        <select wire:model.live="tpsActive" aria-placeholder="Pilih Kabupaten Kota" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option>Harap pilih Kategori PEMILU</option>
            @forelse ($tps as $datatps)
                <option value="{{ $datatps->id }}">{{ $datatps->nama_tps }}</option>
            @empty
                <option>Tidak ada Kategori PEMILU</option>
            @endforelse
        </select>
    </div>
</div>