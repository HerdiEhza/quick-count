<div>
    <div class="flex items-center w-full p-4">
        <select wire:model.live="dapilActive">
            @foreach ($dapils as $dapil)
                <option value="{{ $dapil->id }}">{{ $dapil->nama_dapil }}</option>
            @endforeach
        </select>
    </div>

    <div class="grid grid-cols-4 gap-4 p-4">
        @foreach ($partais as $partai)
        <div class="py-2 border-2 border-gray-500 rounded dark:border-gray-600">
            <div class="flex items-center px-2 py-4 border-b border-gray-500 dark:border-gray-600 gap-x-4">
                <div class="flex items-center max-w-sm">
                    <p class="font-semibold leading-6 text-gray-900 dark:text-white">{{ $partai->nomor_urut }}</p>
                </div>
                <img class="flex-none w-12 h-12 bg-gray-50" src="{{ asset('assets/logo-partai/'.$partai->logo_partai) }}" alt="">
                <div class="flex items-center min-w-0">
                    <p class="font-semibold leading-6 text-gray-900 dark:text-white">{{ $partai->nama_partai }}</p>
                </div>
            </div>
            <ul role="list" class="divide-y divide-gray-100 dark:divide-gray-600">
                    <li class="flex justify-between px-2 py-2 border-b border-gray-500 dark:border-gray-600 gap-x-6">
                        <div class="flex gap-x-2">
                            <p class="text-sm font-semibold leading-6 text-gray-900 dark:text-white text-start">Perolehan Suara Partai</p>
                        </div>
                        <div class="flex flex-col items-end">
                            <p class="text-sm leading-6 text-gray-900 dark:text-white">{{ number_format($partai->total_suara_partai) }}</p>
                        </div>
                    </li>
                    @forelse ($partai->dataBakalCalons as $bacaleg)
                    <li class="flex justify-between px-2 py-2 gap-x-6">
                        {{-- {{ route('dashboard.qc.detail', ['caleg' => $bacaleg->id]) }} --}}
                        <a href="{{ route('dashboard.qc.detail', ['caleg' => $bacaleg->id]) }}" class="flex justify-between w-full">
                            <span class="flex gap-x-2">
                                <p class="text-sm leading-6 text-gray-900 dark:text-white first-letter:font-semibold">{{ $bacaleg->nomor_urut }}</p>
                                <p class="text-sm font-semibold leading-6 text-gray-900 dark:text-white text-start">{{ $bacaleg->nama_bakal_calon }}</p>
                            </span>
                            <span class="flex flex-col items-end">
                                <p class="text-sm leading-6 text-gray-900 dark:text-white">{{ number_format($bacaleg->total_suara_bacaleg) }}</p>
                            </span>
                        </a>
                    </li>
                    @empty
                    <li class="flex items-center justify-center m-auto text-center pt-11">
                        <span>Tidak Ada Calon</span>
                    </li>
                    @endforelse
            </ul>
        </div>
        @endforeach
    </div>
</div>
