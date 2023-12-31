{{-- <div class="relative p-4 overflow-x-auto shadow-md sm:rounded-lg"> --}}
<div class="py-12">
    <div class="px-6 mx-auto max-w-7xl">

        <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="flex items-center justify-between px-4 py-4 text-center">
                    <div class="w-full px-1 py-4 text-sm text-center border-b-2 md:text-xl md:px-4">
                        <h2 class="font-semibold">HASIL HITUNG SUARA PEMILU LEGISLATIF {{ $dataBacaleg->dataDapil->kategori_dapil }} 2024</h2>
                        <p>WILAYAH PEMILIHAN {{ $dataBacaleg->dataDapil->nama_dapil }} - PROVINSI KALIMANTAN BARAT</p>
                        <div class="flex flex-col items-center justify-center w-full mt-3 md:justify-between md:flex-row">
                            <div class="w-[150px]">
                                <img alt="Logo Partai" src="{{ asset('assets/logo-partai/'.$dataBacaleg->dataPartai->logo_partai) }}" class="h-auto align-middle border-none max-h-[100px] max-w-[150px]">
                            </div>
                            <div>
                                <p>DAPIL {{ $dataBacaleg->dataDapil->nama_dapil }}</p>
                                <p>{{ $dataBacaleg->dataPartai->nama_partai }}</p>
                                <p class="font-semibold">{{ $dataBacaleg->nama_bakal_calon }}</p>
                            </div>
                            <div class="w-[150px]">
                                <img alt="Foto Bacaleg" src="{{ $dataBacaleg->foto_path ?? 'https://eu.ui-avatars.com/api/?name='.$dataBacaleg->nama_bakal_calon.'&size=96' }}" class="h-auto align-middle border-none max-w-[150px]">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-4">
                    {{-- <div class="grid w-full grid-cols-1 gap-4 mt-4 md:grid-cols-2 xl:grid-cols-2">
                        <div class="p-4 bg-white rounded-lg shadow sm:p-6 xl:p-8">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl">5,697</span>
                                    <h3 class="text-base font-normal text-gray-500">Total Suara</h3>
                                </div>
                                <div class="flex items-center justify-end flex-1 w-0 ml-5 text-base font-bold text-green-500">
                                    <p>*10.24% </p>
                                </div>
                            </div>
                            <p class="flex justify-end text-sm font-normal text-gray-500">
                                *Terhadap suara partai
                            </p>
                        </div>
                        <div class="p-4 bg-white rounded-lg shadow sm:p-6 xl:p-8 ">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl">55,633</span>
                                    <h3 class="text-base font-normal text-gray-500">Total suara yang didapat partai</h3>
                                </div>
                                <div class="flex items-center justify-end flex-1 w-0 ml-5 text-base font-bold text-green-500">
                                    <p>**100% </p>
                                </div>
                            </div>
                            <p class="flex justify-end text-sm font-normal text-gray-500">
                                **Terhadap total suara pada DAPIL KOTA PONTIANAK 5
                            </p>
                        </div>
                    </div> --}}
                    <div class="grid w-full grid-cols-1 gap-4 pt-6 xl:grid-cols-1 2xl:grid-cols-1">
                        <div class="p-4 bg-white rounded-lg shadow sm:p-6 xl:p-8 ">
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <h3 class="mb-2 text-xl font-bold text-gray-900">Kedudukan di Partai</h3>
                                    <span class="text-base font-normal text-gray-500">List bakal calon di partai
                                    nya..</span>
                                </div>
                            </div>
                            <div class="flex flex-col mt-8">
                                <div class="overflow-x-auto rounded-lg">
                                    <div class="inline-block min-w-full align-middle">
                                        <div class="overflow-hidden shadow sm:rounded-lg">
                                            <table class="min-w-full divide-y divide-gray-200">
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th scope="col" class="p-4 text-xs font-bold tracking-wider text-left text-gray-500 uppercase">
                                                            Nama bakal calon
                                                        </th>
                                                        <th scope="col" class="p-4 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                                            Total suara
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white">
                                                    <tr>
                                                        <td class="p-4 text-sm font-normal text-gray-900 border-b whitespace-nowrap">
                                                            <p class="font-semibold">
                                                                Suara Partai
                                                            </p>
                                                        </td>
                                                        <td class="p-4 text-sm font-semibold text-center text-gray-900 border-b whitespace-nowrap">
                                                            {{ number_format($dataBacaleg->dataPartai->total_suara_partai) ?? '0' }}
                                                        </td>
                                                    </tr>
                                                    {{-- @dd($partais) --}}
                                                    @foreach ($partais->dataBakalCalons as $bacaleg)
                                                        <tr>
                                                            <td class="{{ $bacaleg->id === $dataBacaleg->id ? 'text-sky-400' : 'text-gray-900' }} p-4 text-sm font-normal whitespace-nowrap">
                                                                <p class="font-semibold ">
                                                                    {{ $bacaleg->nama_bakal_calon }}
                                                                </p>
                                                            </td>
                                                            <td class="p-4 text-sm font-semibold text-center text-gray-900 whitespace-nowrap">
                                                                {{ number_format($bacaleg->total_suara_bacaleg) ?? '0' }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 my-4 2xl:grid-cols-2 xl:gap-4">
                        <div class="p-4 mt-4 bg-white rounded-lg shadow sm:p-6 xl:p-8 ">
                            <h3 class="mb-10 text-xl font-bold leading-none text-gray-900">Perolehan suara di daerah
                            </h3>
                            <div class="block w-full overflow-x-auto">
                                <table class="items-center w-full bg-transparent border-collapse">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-3 text-xs font-semibold text-left text-gray-700 uppercase align-middle border-l-0 border-r-0 bg-gray-50 whitespace-nowrap">
                                                Nama daerah
                                            </th>
                                            <th class="px-4 py-3 text-xs font-semibold text-center text-gray-700 uppercase align-middle border-l-0 border-r-0 bg-gray-50 whitespace-nowrap">
                                                Total DPT
                                            </th>
                                            <th class="px-4 py-3 text-xs font-semibold text-center text-gray-700 uppercase align-middle border-l-0 border-r-0 bg-gray-50 whitespace-nowrap">
                                                Perolehan Suara
                                            </th>
                                            <th class="px-4 py-3 text-xs font-semibold text-center text-gray-700 uppercase align-middle border-l-0 border-r-0 bg-gray-50 whitespace-nowrap">
                                                Total Tps
                                            </th>
                                            <th class="px-4 py-3 text-xs font-semibold text-left text-gray-700 uppercase align-middle border-l-0 border-r-0 bg-gray-50 whitespace-nowrap min-w-140-px">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100">
                                        @if ($dapilActive->data_dapil_id <= 10)
                                            @foreach ($dapils->kabupatenKota as $detail_1)
                                                <tr>
                                                    <td class="p-4 text-sm text-gray-900 whitespace-nowrap">
                                                        {{ $detail_1->nama_kabupaten_kota }}
                                                    </td>
                                                    <td class="p-4 text-sm text-center text-gray-900 whitespace-nowrap">
                                                        {{ number_format($detail_1->total_dpt) ?? '0' }}
                                                    </td>
                                                    <td class="p-4 text-sm text-center text-gray-900 whitespace-nowrap">
                                                        {{ number_format($detail_1->suara_caleg) ?? '0' }}
                                                    </td>
                                                    <td class="p-4 text-sm text-center text-gray-900 whitespace-nowrap">
                                                        {{ number_format($detail_1->total_tps) ?? '0' }}
                                                    </td>
                                                    <td class="p-4 text-sm text-center text-gray-900 whitespace-nowrap">
                                                        <a href="{{ route('dashboard.qc.detail.2', ['caleg' => $dataBacaleg->id, 'detail_2' => $detail_1->id]) }}">
                                                            Detail
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            @foreach ($dapils->kecamatan as $detail_1)
                                                <tr>
                                                    <td class="p-4 text-sm text-gray-900 whitespace-nowrap">
                                                        {{ $detail_1->nama_kecamatan }}
                                                    </td>
                                                    <td class="p-4 text-sm text-center text-gray-900 whitespace-nowrap">
                                                        {{ number_format($detail_1->total_dpt) ?? '0' }}
                                                    </td>
                                                    <td class="p-4 text-sm text-center text-gray-900 whitespace-nowrap">
                                                        {{ number_format($detail_1->suara_caleg) ?? '0' }}
                                                    </td>
                                                    <td class="p-4 text-sm text-center text-gray-900 whitespace-nowrap">
                                                        {{ number_format($detail_1->total_tps) ?? '0' }}
                                                    </td>
                                                    <td class="p-4 text-sm text-center text-gray-900 whitespace-nowrap">
                                                        <a href="{{ route('dashboard.qc.detail.2', ['caleg' => $dataBacaleg->id, 'detail_2' => $detail_1->id]) }}">
                                                            Detail
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>