<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}

    <select wire:model.live="kategoriPemilu">
        <option>Harap pilih Kategori PEMILU</option>
        @forelse ($kategoriPemilus as $kategoriPemilu)
            <option value="{{ $kategoriPemilu->id }}">{{ $kategoriPemilu->nama_kategori_pemilu }}</option>
        @empty
            <option>Tidak ada Kategori PEMILU</option>
        @endforelse
    </select>
    <select wire:model.live="dapilActive">
        <option>Harap pilih DAPIL</option>
        @forelse ($dapils as $dapil)
            <option value="{{ $dapil->id }}">{{ $dapil->nama_dapil }}</option>
        @empty
            <option>Tidak ada DAPIL</option>
        @endforelse
    </select>

    <div class="grid grid-cols-1 gap-4 p-4 md:grid-cols-4">
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
                    <input wire:model.live="suaraPartai.{{ $dataPilihan->id }}" type="number" class="min-w-0 w-full rounded-md border-0 bg-white px-3.5 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                </div>
                <ul class="mt-3 space-y-2">
                    @foreach ($dataPilihan->dataBakalCalons as $bacaleg)
                    <li>
                        <div class="flex justify-between">
                            <div>
                                <span>{{ $bacaleg->nomor_urut }}</span>
                                <span>{{ $bacaleg->nama_bakal_calon }}</span>
                            </div>
                            <input wire:model.live="suaraBacaleg.{{ $bacaleg->id }}" type="number" class="min-w-0 w-16 rounded-md border-0 bg-white px-3.5 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                        </div>
                    </li>
                    @endforeach
                </ul>
            </li>
        </ul>
    @empty
        
    @endforelse
    </div>

    {{-- <form wire:submit="store">
        <div class="grid grid-cols-4 gap-4 p-4">
            @foreach ($partais as $partai)
            <ul>
                <li>
                    <div class="flex items-center space-x-2">
                        <img class="flex-none w-12 h-12 bg-gray-50" src="{{ $partai->logo_partai }}" alt="">
                        <div>
                            <span>{{ $loop->iteration }}</span>
                            <span>{{ $partai->nama_partai }}</span>
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <input wire:model.live="suaraPartai.{{ $partai->id }}" type="number" class="w-full h-auto">
                    </div>
                    <ul>
                        @foreach ($partai->dataBakalCalons as $bacaleg)
                        <li>
                            <div class="flex justify-between">
                                <div>
                                    <span>{{ $loop->iteration }}</span>
                                    <span>{{ $bacaleg->nama_bakal_calon }}</span>
                                </div>
                                <input wire:model.live="suaraBacaleg.{{ $bacaleg->id }}" type="number" class="w-24 h-auto">
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            @endforeach
        </div>
        <button type="submit">Save</button>
    </form> --}}
    <button wire:click="$refresh">Refresh</button>
    <button x-on:click="$wire.$refresh()">Refresh</button>

    <button
        type="button"
        wire:click="delete"
        wire:confirm="Are you sure you want to delete this post?"
    >
        Delete post
    </button>
</div>
