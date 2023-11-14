<div class="relative p-4 overflow-x-auto shadow-md sm:rounded-lg">
    <div class="flex justify-between px-4 py-4 text-center items-centerr">
        <div class="h-24">
            <img class="w-auto h-24" src="{{ asset('assets/logo-partai/'.$dataBacaleg->dataPartai->logo_partai) }}" alt="">
        </div>
        <div class="my-auto">
            <h2 class="font-semibold">
                HASIL HITUNG SUARA PEMILU LEGISLATIF {{ $dataBacaleg->dataDapil->kategori_dapil }} 2024
            </h2>
            <p>WILAYAH PEMILIHAN {{ $dataBacaleg->dataDapil->nama_dapil }} - PROV. KALIMANTAN BARAT</p>
            <p>DAPIL {{ $dataBacaleg->dataDapil->nama_dapil }}<span class="px-4 py-0.5 ml-2 text-xs text-white bg-blue-700 rounded-full dark:bg-blue-600">{{ $dataBacaleg->dataDapil->jumlah_kursi }} Kursi</span></p>
            <p>{{ $dataBacaleg->dataPartai->nama_partai }}</p>
            <p>{{ $dataBacaleg->nama_bakal_calon }}</p>
        </div>
        <div class="h-24">
            <img class="w-24 h-auto" src="{{ $dataBacaleg->foto_path ?? 'https://eu.ui-avatars.com/api/?name='.$dataBacaleg->nama_bakal_calon.'&size=96' }}" alt="">
        </div>
    </div>
    <div class="px-4">
        <div class="grid grid-cols-1 my-4 2xl:grid-cols-2 xl:gap-4">
            <div class="p-4 mt-4 bg-white rounded-lg shadow sm:p-6 xl:p-8 ">
                <h3 class="mb-10 text-xl font-bold leading-none text-gray-900">Perolehan suara di daerah
                </h3>
                <div class="block w-full overflow-x-auto">
                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                            <tr>
                                <th class="px-4 py-3 text-xs font-semibold text-left text-gray-700 uppercase align-middle border-l-0 border-r-0 bg-gray-50 whitespace-nowrap">
                                    Nama TPS
                                </th>
                                <th class="px-4 py-3 text-xs font-semibold text-center text-gray-700 uppercase align-middle border-l-0 border-r-0 bg-gray-50 whitespace-nowrap">
                                    Total DPT
                                </th>
                                <th class="px-4 py-3 text-xs font-semibold text-center text-gray-700 uppercase align-middle border-l-0 border-r-0 bg-gray-50 whitespace-nowrap">
                                    Perolehan Suara
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach ($tps as $data_tps)
                                <tr>
                                    <td class="p-4 text-sm text-gray-900 whitespace-nowrap">
                                        {{ $data_tps->nama_tps }}
                                    </td>
                                    <td class="p-4 text-sm text-center text-gray-900 whitespace-nowrap">
                                        {{ number_format($data_tps->total_dpt) ?? '0' }}
                                    </td>
                                    <td class="p-4 text-sm text-center text-gray-900 whitespace-nowrap">
                                        {{ number_format($data_tps->suara_caleg) ?? '0' }}
                                    </td>
                                </tr>
                                {{-- <tr>
                                    <td class="p-4 text-sm text-gray-900 whitespace-nowrap">
                                        {{ $data_tps->nama_tps }}
                                    </td>
                                    <td class="p-4 text-sm text-center text-gray-900 whitespace-nowrap">
                                        {{ $data_tps->jumlah_dpt ?? '0' }}
                                    </td>
                                    <td class="p-4 text-sm text-center text-gray-900 whitespace-nowrap">
                                        @forelse ($data_tps->perolehanSuaras as $suaraBacaleg)
                                            {{ $suaraBacaleg->perolehanSuaraBacalegs->total_suara_bacaleg }}
                                        @empty
                                            0
                                        @endforelse
                                    </td>
                                </tr> --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>