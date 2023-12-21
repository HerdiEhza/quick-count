<div class="w-full col-span-2">
    <div class="flex flex-col space-y-2">
        <div class="grid gap-6 mb-6 md:grid-cols-6">
            <div class="col-span-1 md:col-span-2">
                <label for="suara_sah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Suara
                    sah</label>
                <input type="number" id="suara_sah" wire:model='jumlahSuaraSah'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Jumlah suara sah" required>
            </div>
            <div class="col-span-1 md:col-span-2">
                <label for="suara_tidak_sah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Suara
                    tidak sah</label>
                <input type="number" id="suara_tidak_sah" wire:model='jumlahSuaraTidakSah'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Jumlah suara tidak sah" required>
            </div>
            <div class="col-span-1 md:col-span-2">
                <label for="jumlah_dpt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                    DPT</label>
                <input type="number" id="jumlah_dpt" wire:model='jumlahDPT'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Jumlah DPT di TPS ini" required>
            </div>
            <div class="col-span-1 md:col-span-3">
                <div class="flex items-center justify-center w-full">
                    <label for="photoC1"
                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        @if ($photoC1)
                        <img src="{{ $photoC1->temporaryUrl() }}" class="w-full h-64">
                        @else
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Tekan
                                    untuk mengupload</span> foto C1</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG (MAX.800x400px)</p>
                        </div>
                        @endif
                        <input wire:model="photoC1" name="photoC1" id="photoC1" accept="image/*" type="file"
                            class="hidden" />
                    </label>
                </div>
            </div>
            <div class="col-span-1 md:col-span-3">
                <div class="flex items-center justify-center w-full">
                    <label for="photoBAHPS"
                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        @if ($photoBAHPS)
                        <img src="{{ $photoBAHPS->temporaryUrl() }}" class="w-full h-64">
                        @else
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Tekan
                                    untuk mengupload</span> foto BAHPS</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG (MAX.800x400px)</p>
                        </div>
                        @endif
                        <input wire:model="photoBAHPS" name="photoBAHPS" id="photoBAHPS" accept="image/*" type="file"
                            class="hidden" />
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>