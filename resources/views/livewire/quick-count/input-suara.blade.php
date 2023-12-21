<div>
    <ol class="flex items-center justify-center p-4 mx-auto mb-4 sm:mb-5">
        @for ($i = 1; $i < 5; $i++) <li
            class="{{ $activeStep >= $i ? 'text-blue-600 dark:text-blue-500 after:border-blue-100 dark:after:border-blue-800' : 'after:border-gray-100 dark:after:border-gray-700' }} flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-4 after:inline-block">
            <div
                class="{{ $activeStep >= $i ? 'bg-blue-100 dark:bg-blue-800' : 'bg-gray-100 dark:bg-gray-700' }} font-bold flex items-center justify-center w-10 h-10 rounded-full lg:h-12 lg:w-12 shrink-0">
                {{ $i }}
            </div>
            </li>
            @endfor
            <li class="{{ $activeStep === 5 ? 'text-blue-600 dark:text-blue-500' : '' }} flex items-center w-full">
                <div
                    class="{{ $activeStep === 5 ? 'bg-blue-100 dark:bg-blue-700' : 'bg-gray-100 dark:bg-gray-700' }} font-bold flex items-center justify-center w-10 h-10 rounded-full lg:h-12 lg:w-12 shrink-0">
                    5
                </div>
            </li>
    </ol>
    <form action="#">
        <div class="p-4">
            <h3 class="mb-4 text-lg font-medium leading-none text-gray-900 dark:text-white">Invoice details</h3>
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
                @default

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