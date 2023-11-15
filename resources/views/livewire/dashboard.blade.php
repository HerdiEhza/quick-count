<div class="py-12">
    <div class="mx-auto max-w-7xl">
        <div class="flex items-center w-full p-4">
            <select wire:model.live="dapilActive">
                @foreach ($dapils as $dapil)
                    <option value="{{ $dapil->id }}">{{ $dapil->nama_dapil }}</option>
                @endforeach
            </select>
        </div>

        <div class="grid grid-cols-1 gap-4 p-4 sm:grid-cols-2 lg:grid-cols-4">
            <div class="flex-shrink w-full max-w-full">
                <div class="h-full p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                    <div class="flex flex-row flex-wrap items-center">
                        <div class="flex-shrink w-1/2 max-w-full">
                            <h5 class="mb-1 text-gray-500">Total TPS / Suara Masuk</h5>
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
                                {{ $persentaseSuaraMasuk }}%
                            </p>
                        </div>
                        <div class="flex-shrink w-1/2 max-w-full">
                            <canvas class="max-w-100" id="LineAreaSm"
                                style="display: block; box-sizing: border-box; height: 69px; width: 139px;" width="139"
                                height="69"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-shrink w-full max-w-full">
                <div class="h-full p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                    <div class="flex flex-row flex-wrap items-center">
                        <div class="flex-shrink w-1/2 max-w-full">
                            <h5 class="mb-1 text-gray-500">Total likes</h5>
                            <h3 class="mb-1 text-lg font-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="inline-block -mt-1 ltr:mr-2 rtl:ml-2 bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                                    <path
                                        d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z">
                                    </path>
                                </svg> 24.310
                            </h3>
                            <p class="text-sm text-green-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="inline-block w-4 h-4 bi bi-arrow-up-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z">
                                    </path>
                                </svg>
                                16.2%
                            </p>
                        </div>
                        <div class="flex-shrink w-1/2 max-w-full">
                            <canvas class="max-w-100" id="BarChartSm"
                                style="display: block; box-sizing: border-box; height: 69px; width: 139px;" width="139"
                                height="69"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-shrink w-full max-w-full">
                <div class="h-full p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                    <div class="flex flex-row flex-wrap items-center">
                        <div class="flex-shrink w-1/2 max-w-full">
                            <h5 class="mb-1 text-gray-500">Total Comments</h5>
                            <h3 class="mb-1 text-lg font-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="inline-block -mt-1 ltr:mr-2 rtl:ml-2 bi bi-chat-left-text" viewBox="0 0 16 16">
                                    <path
                                        d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z">
                                    </path>
                                    <path
                                        d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z">
                                    </path>
                                </svg> 54.350
                            </h3>
                            <p class="text-sm text-green-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="inline-block w-4 h-4 bi bi-arrow-up-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z">
                                    </path>
                                </svg>
                                11.2%
                            </p>
                        </div>
                        <div class="flex-shrink w-1/2 max-w-full">
                            <canvas class="max-w-100" id="BarComments"
                                style="display: block; box-sizing: border-box; height: 69px; width: 139px;" width="139"
                                height="69"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-shrink w-full max-w-full">
                <div class="h-full p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                    <div class="flex flex-row flex-wrap items-center">
                        <div class="flex-shrink w-1/2 max-w-full">
                            <h5 class="mb-1 text-gray-500">Total Share</h5>
                            <h3 class="mb-1 text-lg font-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="inline-block -mt-1 ltr:mr-2 rtl:ml-2 bi bi-share" viewBox="0 0 16 16">
                                    <path
                                        d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z">
                                    </path>
                                </svg> 9.110
                            </h3>
                            <p class="text-sm text-pink-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="inline-block w-4 h-4 bi bi-arrow-down-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4z">
                                    </path>
                                </svg>
                                6.2%
                            </p>
                        </div>
                        <div class="flex-shrink w-1/2 max-w-full">
                            <canvas class="max-w-100" id="BarShare"
                                style="display: block; box-sizing: border-box; height: 69px; width: 139px;" width="139"
                                height="69"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex w-full px-4 space-x-4">
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
</div>
