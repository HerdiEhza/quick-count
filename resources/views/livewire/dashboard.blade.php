<div class="py-12">
    <div class="mx-auto max-w-7xl">
        <div class="items-center w-full p-4">
            <label for="dapilActive" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih DAPIL</label>
            <select wire:model.live="dapilActive" id="dapilActive" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                @foreach ($dapils as $dapil)
                    <option value="{{ $dapil->id }}">{{ $dapil->nama_dapil }}</option>
                @endforeach
            </select>
        </div>

        <div class="grid grid-cols-1 gap-4 p-4 sm:grid-cols-2 lg:grid-cols-4">
            <div class="flex-shrink w-full max-w-full">
                <div class="h-full p-4 border-2 rounded-md dark:bg-gray-800">
                    <div class="flex flex-row flex-wrap items-center">
                        <div class="flex-shrink w-full max-w-full">
                            <h5 class="mb-1 text-sm text-gray-500">Total TPS / Suara Masuk</h5>
                            <h3 class="mb-1 text-lg font-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="inline-block -mt-1 ltr:mr-2 rtl:ml-2 bi bi-eye" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z">
                                    </path>
                                    <path
                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z">
                                    </path>
                                </svg> 
                                <span>{{ number_format($totalTps->total_tps).' / '.number_format($totalTps->total_suara_tps_masuk) }}</span>
                            </h3>
                            <p class="text-sm text-green-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="inline-block w-4 h-4 bi bi-arrow-up-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z">
                                    </path>
                                </svg>
                                46.2%
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-shrink w-full max-w-full">
                <div class="h-full p-4 border-2 rounded-md dark:bg-gray-800">
                    <div class="flex flex-row flex-wrap items-center">
                        <div class="flex-shrink w-full max-w-full">
                            <h5 class="mb-1 text-sm text-gray-500">Total TPS / Suara Masuk</h5>
                            <h3 class="mb-1 text-lg font-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="inline-block -mt-1 ltr:mr-2 rtl:ml-2 bi bi-eye" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z">
                                    </path>
                                    <path
                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z">
                                    </path>
                                </svg> 
                                <span>{{ number_format($totalTps->total_tps).' / '.number_format($totalTps->total_suara_tps_masuk) }}</span>
                            </h3>
                            <p class="text-sm text-green-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="inline-block w-4 h-4 bi bi-arrow-up-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z">
                                    </path>
                                </svg>
                                46.2%
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-shrink w-full max-w-full">
                <div class="h-full p-4 border-2 rounded-md dark:bg-gray-800">
                    <div class="flex flex-row flex-wrap items-center">
                        <div class="flex-shrink w-full max-w-full">
                            <h5 class="mb-1 text-sm text-gray-500">Total TPS / Suara Masuk</h5>
                            <h3 class="mb-1 text-lg font-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="inline-block -mt-1 ltr:mr-2 rtl:ml-2 bi bi-eye" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z">
                                    </path>
                                    <path
                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z">
                                    </path>
                                </svg> 
                                <span>{{ number_format($totalTps->total_tps).' / '.number_format($totalTps->total_suara_tps_masuk) }}</span>
                            </h3>
                            <p class="text-sm text-green-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="inline-block w-4 h-4 bi bi-arrow-up-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z">
                                    </path>
                                </svg>
                                46.2%
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-shrink w-full max-w-full">
                <div class="h-full p-4 border-2 rounded-md dark:bg-gray-800">
                    <div class="flex flex-row flex-wrap items-center">
                        <div class="flex-shrink w-full max-w-full">
                            <h5 class="mb-1 text-sm text-gray-500">Total TPS / Suara Masuk</h5>
                            <h3 class="mb-1 text-lg font-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="inline-block -mt-1 ltr:mr-2 rtl:ml-2 bi bi-eye" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z">
                                    </path>
                                    <path
                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z">
                                    </path>
                                </svg> 
                                <span>{{ number_format($totalTps->total_tps).' / '.number_format($totalTps->total_suara_tps_masuk) }}</span>
                            </h3>
                            <p class="text-sm text-green-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="inline-block w-4 h-4 bi bi-arrow-up-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z">
                                    </path>
                                </svg>
                                46.2%
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-4 p-4 sm:grid-cols-2 lg:grid-cols-2">
            <div class="relative w-full overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 border-2 border-gray-300 rounded-sm rtl:text-right dark:text-gray-400">
                    <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white rtl:text-right dark:text-white dark:bg-gray-800">
                        BACALEG PEMENANG PEMILU {{ $dataDapil->nama_dapil }}
                        <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">
                            Berdasarkan kebutuhan kursi sebanyak {{ $dataDapil->jumlah_kursi }} kursi.
                        </p>
                    </caption>
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
                <table class="w-full text-sm text-left text-gray-500 border-2 border-gray-300 rounded-sm rtl:text-right dark:text-gray-400">
                    <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white rtl:text-right dark:text-white dark:bg-gray-800">
                        PARTAI PEMENANG PEMILU {{ $dataDapil->nama_dapil }}
                        <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">
                            Berdasarkan kebutuhan kursi sebanyak {{ $dataDapil->jumlah_kursi }} kursi.
                        </p>
                    </caption>
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
                                    {{ number_format($partaiMenang->total_suara_partai_menang) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-4 p-4 sm:grid-cols-2 lg:grid-cols-4">
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
</div>
