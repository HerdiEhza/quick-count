<div class="mb-5">
    <div class="flex flex-col space-y-2">
        <select wire:model.live="kabKotaActive" aria-placeholder="Pilih Kabupaten Kota" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Harap Pilih Kabupaten Kota</option>
            @forelse ($kabKotas as $kabKota)
                <option value="{{ $kabKota->id }}">{{ $kabKota->nama_kabupaten_kota }}</option>
            @empty
                <option>Tidak ada Kabupaten Kota</option>
            @endforelse
        </select>
        <select wire:model.live="kecamatanActive" aria-placeholder="Pilih Kecamatan" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Harap Pilih Kecamatan</option>
            @if (!is_null($kecamatans))
                @forelse ($kecamatans as $kecamatan)
                    <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama_kecamatan }}</option>
                @empty
                    <option>Tidak ada Kecamatan</option>
                @endforelse
            @endif
        </select>
        <select wire:model.live="kelDesaActive" aria-placeholder="Pilih Kelurahan Desa" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Harap Pilih Kelurahan Desa</option>
            @if (!is_null($kelDesas))
                @forelse ($kelDesas as $kelDesa)
                    <option value="{{ $kelDesa->id }}">{{ $kelDesa->nama_kelurahan_desa }}</option>
                @empty
                    <option>Tidak ada Kelurahan Desa</option>
                @endforelse
            @endif
        </select>
        <select wire:model.live="tpsActive" aria-placeholder="Pilih TPS" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Harap Pilih TPS</option>
            @if (!is_null($tps))
                @forelse ($tps as $datatps)
                    <option value="{{ $datatps->id }}">{{ $datatps->nama_tps }}</option>
                @empty
                    <option>Tidak ada TPS</option>
                @endforelse
            @endif
        </select>
    </div>
</div>