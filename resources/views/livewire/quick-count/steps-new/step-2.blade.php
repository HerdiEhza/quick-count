<div class="w-full col-span-2">
    <div class="items-center w-full text-center">
        <div class="flex items-center justify-center">
            <div class="p-4 text-sm w-80">
                <div class="mb-2 font-bold">Unggah foto Anda berada di lokasi TPS</div>
                <div class="" x-data="previewImage()">
                    <div class="flex flex-col items-center justify-center w-full">
                        <label for="photoCheckIn"
                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <img x-show="imageUrl" :src="imageUrl" class="object-contain w-full h-full">
                            <div x-show="!imageUrl" class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                        class="font-semibold">Tekan untuk
                                        mengupload</span> foto kehadiran</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG (MAX.800x400px)</p>
                            </div>
                            <input class="hidden" type="file" wire:model="photoCheckIn" name="photoCheckIn"
                                id="photoCheckIn" accept="image/*" @change="fileChosen">
                        </label>
                        <span x-show="imageUrl">Untuk mengubah foto, tekan kembali foto diatas ini.</span>
                        <div>@error('photoCheckIn')
                            <p id="photoCheckIn_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                <span class="font-medium">Maaf!</span> {{ $message }}.
                            </p> @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>