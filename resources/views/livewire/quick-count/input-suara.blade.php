<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}

    <form wire:submit="store">
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
    </form>
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
