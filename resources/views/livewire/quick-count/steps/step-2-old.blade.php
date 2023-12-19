<div class="mb-5">
    <form wire:submit="save">
        {{-- <div class="mb-5 text-center" x-data="app()"> --}}
        <div class="mb-5 text-center">
            {{-- <div class="relative w-64 h-64 mx-auto mb-4 bg-gray-100 border rounded-sm shadow-inset">
                <img id="image" class="object-cover w-full h-64" :src="image" />
            </div> --}}

            {{-- <label for="fileInput" type="button"
                class="items-center justify-between px-4 py-2 font-medium text-left text-gray-600 bg-white border rounded-lg shadow-sm cursor-pointer inine-flex focus:outline-none hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-flex flex-shrink-0 w-6 h-6 mr-1 -mt-1"
                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                    <path
                        d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
                    <circle cx="12" cy="13" r="3" />
                </svg>
                Browse Photo
            </label> --}}

            {{-- <div class="w-48 mx-auto mt-1 text-xs text-center text-gray-500">Click to add profile picture</div> --}}

            <div class="flex items-center justify-center w-full">
                <label for="photoCheckIn"
                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    @if ($photoCheckIn)
                    <img src="{{ $photoCheckIn->temporaryUrl() }}" class="w-full h-64">
                    @else
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Tekan untuk
                                mengupload</span> foto kehadiran</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG (MAX.800x400px)</p>
                    </div>
                    @endif
                    <input wire:model="photoCheckIn" name="photoCheckIn" id="photoCheckIn" accept="image/*" type="file"
                        class="hidden" />
                </label>
            </div>


            {{-- <input wire:model="photo" name="photo" id="fileInput" accept="image/*" class="hidden" type="file" @change="let file = document.getElementById('fileInput').files[0];
                var reader = new FileReader();
                reader.onload = (e) => image = e.target.result;
                reader.readAsDataURL(file);"> --}}

            @error('photo') <span class="error">{{ $message }}</span> @enderror
        </div>


        <button type="submit">Save photo</button>
    </form>
</div>