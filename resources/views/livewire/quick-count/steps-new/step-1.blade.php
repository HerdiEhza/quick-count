<div>
    <label for="kab/kota" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
        Harap pilih kabupaten Kota
    </label>
    <select id="kab/kota" wire:model.live="kabKotaActive"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option selected>Harap pilih kab/kota</option>
        @forelse ($kabKotas as $kabKota)
        <option value="{{ $kabKota->id }}">{{ $kabKota->nama_kabupaten_kota }}
        </option>
        @empty
        <option>Tidak ada kabupaten Kota</option>
        @endforelse
    </select>
    <div>@error('kabKotaActive')
        <p id="kabKotaActive_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
            <span class="font-medium">Maaf!</span> {{ $message }}.
        </p> @enderror
    </div>
</div>
<div>
    <label for="kecamatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
        Harap pilih kacamatan
    </label>
    <select id="kecamatan" wire:model.live="kecamatanActive"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option selected>Harap pilih kecamatan</option>
        @forelse ($kecamatans as $kecamatan)
        <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama_kecamatan }}
        </option>
        @empty
        <option>Tidak ada Kelurahan Desa</option>
        @endforelse
    </select>
    <div>@error('kecamatanActive')
        <p id="kecamatanActive_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
            <span class="font-medium">Maaf!</span> {{ $message }}.
        </p> @enderror
    </div>
</div>
<div>
    <label for="kel/desa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
        Harap pilih Kelurahan/Desa
    </label>
    <select id="kel/desa" wire:model.live="kelDesaActive"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option selected>Harap pilih Kel/Desa</option>
        @forelse ($kelDesas as $kelDesa)
        <option value="{{ $kelDesa->id }}">{{ $kelDesa->nama_kelurahan_desa }}
        </option>
        @empty
        <option>Tidak ada Kelurahan Desa</option>
        @endforelse
    </select>
    <div>@error('kelDesaActive')
        <p id="kelDesaActive_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
            <span class="font-medium">Maaf!</span> {{ $message }}.
        </p> @enderror
    </div>
</div>
<div>
    <label for="tps" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
        Harap pilih TPS
    </label>
    <select id="tps" wire:model.live="tpsActive"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option selected>Harap pilih TPS</option>
        @forelse ($tps as $datatps)
        <option value="{{ $datatps->id }}">{{ $datatps->nama_tps }}</option>
        @empty
        <option>Tidak ada TPS</option>
        @endforelse
    </select>
    <div>@error('tpsActive')
        <p id="tpsActive_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
            <span class="font-medium">Maaf!</span> {{ $message }}.
        </p> @enderror
    </div>
</div>