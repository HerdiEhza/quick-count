<div class="mb-5">
    <div class="grid grid-cols-1 gap-4 p-4 sm:grid-cols-2 lg:grid-cols-4">
        @foreach ($dataPilihans as $dataPilihan)
        <div class="py-2 bg-white border-2 border-gray-300 rounded dark:border-gray-400">
            <div class="flex items-center px-2 py-4 border-b border-gray-500 dark:border-gray-600 gap-x-4">
                <div class="flex items-center max-w-sm">
                    <p class="font-semibold leading-6 text-gray-900 dark:text-white">{{ $dataPilihan->nomor_urut }}</p>
                </div>
                <img class="flex-none w-12 h-12 bg-gray-50"
                    src="{{ asset('assets/logo-partai/'.$dataPilihan->logo_partai) }}" alt="">
                <div class="flex items-center min-w-0">
                    <p class="font-semibold leading-6 text-gray-900 dark:text-white">{{ $dataPilihan->nama_partai }}</p>
                </div>
            </div>
            <ul role="list" class="divide-y divide-gray-100 dark:divide-gray-600">
                <li class="flex flex-col items-center w-full px-2 py-2 border-b border-gray-500 dark:border-gray-600">
                    <div class="flex">
                        <p class="text-sm font-semibold leading-6 text-center text-gray-900 dark:text-white">
                            Perolehan
                            Suara Partai</p>
                    </div>
                    <div class="w-full">
                        <input type="number"
                            class="placeholder:italic placeholder:text-slate-400 placeholder:text-sm bg-gray-50 w-full border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Suara Partai" required id="suaraPartai.{{ $dataPilihan->id }}"
                            wire:model="suaraPartai.{{ $dataPilihan->id }}">
                    </div>
                </li>
                @forelse ($dataPilihan->dataBakalCalons as $bacaleg)
                <li class="flex justify-between px-2 py-2 gap-x-6">
                    {{-- {{ route('dashboard.qc.detail', ['caleg' => $bacaleg->id]) }} --}}
                    <div class="flex justify-between w-full">
                        <span class="flex gap-x-2">
                            <p class="text-sm leading-6 text-gray-900 dark:text-white first-letter:font-semibold">
                                {{ $bacaleg->nomor_urut }}</p>
                            <p class="text-sm font-semibold leading-6 text-gray-900 dark:text-white text-start">
                                {{ $bacaleg->nama_bakal_calon }}</p>
                        </span>
                        <span class="flex flex-col items-end w-20">
                            <div>
                                <input type="number" id="first_name"
                                    class="placeholder:italic placeholder:text-slate-400 placeholder:text-xs bg-gray-50 w-24 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Suara Caleg" required id="suaraBacaleg.{{ $bacaleg->id }}"
                                    wire:model="suaraBacaleg.{{ $bacaleg->id }}">
                            </div>
                        </span>
                    </div>
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