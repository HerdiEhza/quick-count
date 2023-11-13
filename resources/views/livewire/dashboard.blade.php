<div>
    <div class="flex items-center w-full p-4">
        <select wire:model.live="dapilActive">
            @foreach ($dapils as $dapil)
                <option value="{{ $dapil->id }}">{{ $dapil->nama_dapil }}</option>
            @endforeach
        </select>
    </div>

    <span>{{ $dataDapil->jumlah_kursi }}</span>

    <div class="flex w-full px-4 space-x-4">
        <div class="relative w-full overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Bakal Calon
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Total Suara
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bacalegMenangs as $bacalegMenang)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration }}
                            </th>
                            <td scope="row" class="flex items-center px-6 py-4 space-x-3 text-gray-900 whitespace-nowrap dark:text-white">
                                <img class="w-6 h-6" src="{{ asset('assets/logo-partai/'.$bacalegMenang->dataPartai->logo_partai) }}" alt="Logo partai">
                                <a href="{{ route('dashboard.qc.detail', ['caleg' => $bacalegMenang->id]) }}" class="text-base font-semibold">{{ $bacalegMenang->nama_bakal_calon }}</a>
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{ number_format($bacalegMenang->total_suara_bacaleg_menang) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="relative w-full overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Partai
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Total Suara
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($partaiMenangs as $partaiMenang)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration }}
                            </th>
                            <td scope="row" class="flex items-center px-6 py-4 space-x-3 text-gray-900 whitespace-nowrap dark:text-white">
                                <img class="w-6 h-6" src="{{ asset('assets/logo-partai/'.$partaiMenang->logo_partai) }}" alt="Logo partai">
                                <div class="text-base font-semibold">{{ $partaiMenang->nama_partai }}</div>
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{ number_format($partaiMenang->perolehan_suara_partais_sum_suara) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="grid grid-cols-4 gap-4 p-4">
        @foreach ($partais as $partai)
        <div class="py-2 bg-white border-2 border-gray-300 rounded dark:border-gray-400">
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
