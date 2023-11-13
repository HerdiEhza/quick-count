<div class="mb-5">
    <div class="grid grid-cols-1 gap-2 p-4 md:gap-4 md:grid-cols-4">
        @forelse ($dataPilihans as $dataPilihan)
            <ul class="p-3 bg-gray-200">
                <li>
                    <div class="flex items-center space-x-2">
                        {{-- <img class="flex-none w-12 h-12 bg-gray-50" src="{{ $dataPilihan->logo_partai }}" alt=""> --}}
                        <img class="flex-none w-12 h-12 bg-gray-50" src="{{ asset('assets/logo-partai/'.$dataPilihan->logo_partai) }}" alt="">
                        <div>
                            <span>{{ $dataPilihan->nomor_urut }}</span>
                            <span>{{ $dataPilihan->nama_partai }}</span>
                        </div>
                    </div>
                    <div class="flex justify-between mt-2">
                        <input wire:model.live="suaraPartai.{{ $dataPilihan->id }}" type="number" class="min-w-0 w-full rounded-md border-0 bg-white px-3.5 py-2 shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                    </div>
                    <ul class="mt-3 space-y-2">
                        @foreach ($dataPilihan->dataBakalCalons as $bacaleg)
                        <li>
                            <div class="flex justify-between">
                                <div>
                                    <span>{{ $bacaleg->nomor_urut }}</span>
                                    <span>{{ $bacaleg->nama_bakal_calon }}</span>
                                </div>
                                <input wire:model.live="suaraBacaleg.{{ $bacaleg->id }}" type="number" class="min-w-0 w-16 rounded-md border-0 bg-white px-3.5 py-2 shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        @empty
            
        @endforelse
    </div>
</div>