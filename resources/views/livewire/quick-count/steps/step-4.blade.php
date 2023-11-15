<div class="mb-5">
    <div class="grid grid-cols-1 gap-4 p-4 sm:grid-cols-2 lg:grid-cols-4">
        @foreach ($dataPilihans as $dataPilihan)
            <div class="py-2 bg-white border-2 border-gray-300 rounded dark:border-gray-400">
                <div class="flex items-center px-2 py-4 border-b border-gray-500 dark:border-gray-600 gap-x-4">
                    <div class="flex items-center max-w-sm">
                        <p class="font-semibold leading-6 text-gray-900 dark:text-white">{{ $dataPilihan->nomor_urut }}</p>
                    </div>
                    <img class="flex-none w-12 h-12 bg-gray-50" src="{{ asset('assets/logo-partai/'.$dataPilihan->logo_partai) }}" alt="">
                    <div class="flex items-center min-w-0">
                        <p class="font-semibold leading-6 text-gray-900 dark:text-white">{{ $dataPilihan->nama_partai }}</p>
                    </div>
                </div>
                <ul role="list" class="divide-y divide-gray-100 dark:divide-gray-600">
                        <li class="flex justify-between px-2 py-2 border-b border-gray-500 dark:border-gray-600 gap-x-6">
                            <div class="flex gap-x-2">
                                <p class="text-sm font-semibold leading-6 text-gray-900 dark:text-white text-start">Perolehan Suara Partai</p>
                            </div>
                            <div class="flex flex-col items-end">
                                <p class="text-sm leading-6 text-gray-900 dark:text-white">{{ number_format($dataPilihan->total_suara_partai) }}</p>
                            </div>
                        </li>
                        @forelse ($dataPilihan->dataBakalCalons as $bacaleg)
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