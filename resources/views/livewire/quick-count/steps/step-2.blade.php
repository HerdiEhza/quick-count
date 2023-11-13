<div class="mb-5">
    <form wire:submit="save">
        <div class="mb-5 text-center" x-data="app()">
            <div class="relative w-64 h-64 mx-auto mb-4 bg-gray-100 border rounded-sm shadow-inset">
                <img id="image" class="object-cover w-full h-64" :src="image" />
            </div>
    
            <label
                for="fileInput"
                type="button"
                class="items-center justify-between px-4 py-2 font-medium text-left text-gray-600 bg-white border rounded-lg shadow-sm cursor-pointer inine-flex focus:outline-none hover:bg-gray-100"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-flex flex-shrink-0 w-6 h-6 mr-1 -mt-1" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                    <path d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
                    <circle cx="12" cy="13" r="3" />
                </svg>
                Browse Photo
            </label>
    
            <div class="w-48 mx-auto mt-1 text-xs text-center text-gray-500">Click to add profile picture</div>
    
            <input wire:model="photo" name="photo" id="fileInput" accept="image/*" class="hidden" type="file" @change="let file = document.getElementById('fileInput').files[0];
                var reader = new FileReader();
                reader.onload = (e) => image = e.target.result;
                reader.readAsDataURL(file);">
    
            @error('photo') <span class="error">{{ $message }}</span> @enderror
        </div>
    
        <button type="submit">Save photo</button>
    </form>
</div>