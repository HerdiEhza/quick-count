<div>
    <div class="p-4 py-4 border-b-2">
        <div class="mb-1 text-xs font-bold leading-tight tracking-wide text-gray-500 uppercase">
            Langkah: {{ $activeStep }} dari {{ $totalStep }}
        </div>
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div class="flex-1">
                <div>
                    @switch($activeStep)
                    @case(1)
                    <div class="text-lg font-bold leading-tight text-gray-700">Pilih Lokasi TPS</div>
                    @break
                    @case(2)
                    <div class="text-lg font-bold leading-tight text-gray-700">Upload Foto Kehadiran</div>
                    @break
                    @case(3)
                    <div class="text-lg font-bold leading-tight text-gray-700">Pilih DAPIL Pemilu</div>
                    @break
                    @case(4)
                    <div class="text-lg font-bold leading-tight text-gray-700">Input Perolehan Suara</div>
                    @break
                    @case(5)
                    <div class="text-lg font-bold leading-tight text-gray-700">Input & Upload Bukti TPS</div>
                    @break
                    @default

                    @endswitch

                </div>
            </div>

            <div class="flex items-center md:w-64">
                <div class="w-full mr-2 bg-white rounded-full">
                    <div class="h-2 text-xs leading-none text-center text-white bg-green-500 rounded-full border-gray-50"
                        style="width: {{ ($activeStep / $totalStep * 100) }}%"></div>
                </div>
                <div class="w-10 text-xs text-gray-600">
                    {{ ($activeStep / $totalStep * 100) }}%</div>
            </div>
        </div>
    </div>
    <form wire:submit="submitQC">
        <div class="p-4">
            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                @switch($activeStep)
                @case(1)
                @include('livewire.quick-count.steps-new.step-1')
                @break
                @case(2)
                @include('livewire.quick-count.steps-new.step-2')
                @break
                @case(3)
                @include('livewire.quick-count.steps-new.step-3')
                @break
                @case(4)
                @include('livewire.quick-count.steps-new.step-4')
                @break
                @case(5)
                @include('livewire.quick-count.steps-new.step-5')
                @break
                @endswitch
            </div>
        </div>
        <div class="flex items-center justify-between w-full px-4 py-3 bg-gray-200">
            <div>
                @if ($activeStep > 1)
                <button type="button" wire:click="prevStep()"
                    class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                    Kembali
                </button>
                @endif
            </div>
            <div>
                @if ($activeStep < $totalStep) <button type="button" wire:click="nextStep()"
                    class="order-last right-0 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Lanjut
                    </button>
                    @else
                    <button type="submit"
                        class="order-last right-0 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Simpan
                    </button>
                    @endif
            </div>
        </div>
    </form>
</div>

@push('scripts')
<script>
    function previewImage() {
            return {
                imageUrl: "",
        
                fileChosen(event) {
                    this.fileToDataUrl(event, (src) => (this.imageUrl = src));
                },
        
                fileToDataUrl(event, callback) {
                    if (!event.target.files.length) return;
        
                    let file = event.target.files[0],
                        reader = new FileReader();
        
                    reader.readAsDataURL(file);
                    reader.onload = (e) => callback(e.target.result);
                },
            };
        }
</script>
@endpush