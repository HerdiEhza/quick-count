<?php

use App\Livewire\Forms\LoginForm;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use App\Models\DataDapil;
use Illuminate\Contracts\Database\Eloquent\Builder;
use App\Exports\PerolehanSuaraExport;
use App\Exports\PerKabKotaExport;

new #[Layout('layouts.app')] class extends Component
{
    public $dapils;
    /**
     * Mount the component.
     */
    public function mount()
    {
        $dapilActive = Config::get('orchid_opinion.quick_count.dapil');
        $calegActive = Config::get('orchid_opinion.quick_count.bacaleg');

        $this->dapils = DataDapil::
                            withOnly([
                                'kabupatenKota',
                                'kabupatenKota.wilayahKecamatans',
                                'kabupatenKota.wilayahKecamatans.wilayahKelurahanDesas',
                                'kabupatenKota.wilayahKecamatans.wilayahKelurahanDesas.allDataTps',
                                'kabupatenKota.wilayahKecamatans.wilayahKelurahanDesas.allDataTps.perolehanSuaras' => function (Builder $query) use ($calegActive) {
                                    $query->select(['id', 'suara_sah', 'suara_tidak_sah', 'jumlah_dpt', 'data_tps_id'])
                                            ->with([
                                                'perolehanSuaraBacalegs' => function (Builder $query) use ($calegActive) {
                                                    $query->where('data_bakal_calon_id', $calegActive);
                                                },
                                            ]);
                                },
                            ])
                            ->findOrFail($dapilActive);
    }

    public function export() 
    {
        return Excel::download(new PerolehanSuaraExport, 'perolehan-suara.xlsx');
        // return Excel::download(new PerKabKotaExport(1), 'perolehan-suara.xlsx');
    }
}; ?>

<div class="relative items-center block h-screen p-6">


    <button wire:click='export' wire:loading.attr="disabled"
        class="mx-auto text-white bg-[#1D6F42] hover:bg-[#1D6F42]/80 focus:ring-4 focus:outline-none focus:ring-[#1D6F42]/50 font-medium rounded-lg text-sm w-full px-5 py-2.5 dark:hover:bg-[#1D6F42]/80 dark:focus:ring-[#1D6F42]/40 me-2 mb-2">
        <div wire:loading.remove class="inline-flex items-center text-center">
            <svg class="w-6 h-6 me-2 -ms-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
            </svg>
            <span>Download Excel</span>
        </div>

        <div wire:loading wire:target="export" class="flex items-center">
            <div role="status">
                <svg aria-hidden="true" class="w-6 h-6 text-gray-200 me-2 animate-spin dark:text-gray-600 fill-blue-600"
                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                        fill="currentColor" />
                    <path
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                        fill="currentFill" />
                </svg>
                <span class="sr-only">Loading...</span>
            </div>
            {{-- <span>Preparing your file</span> --}}
        </div>
    </button>

    <div class="relative mt-8 overflow-x-auto shadow-md sm:rounded-lg">
        @foreach ($dapils->kabupatenKota as $kabKota)
        @foreach ($kabKota->wilayahKecamatans as $kecamatan)
        @foreach ($kecamatan->wilayahKelurahanDesas as $kelDesa)
        <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
            <caption
                class="p-5 text-lg font-semibold text-left text-gray-900 bg-white rtl:text-right dark:text-white dark:bg-gray-800">
                {{ $kabKota->nama_kabupaten_kota }} - {{ $kecamatan->nama_kecamatan }}
                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">
                    Kelurahan/Desa : {{ $kelDesa->nama_kelurahan_desa }}
                </p>
            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama TPS
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Suara sah
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Suara tidak
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jumlah DPT
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Perolehan suara
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kelDesa->allDataTps as $tps)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $tps->nama_tps }}
                    </th>
                    @if($tps->perolehanSuaras->isNotEmpty())
                    <td class="px-6 py-4">
                        {{ $tps->perolehanSuaras[0]->suara_sah ?? '0' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $tps->perolehanSuaras[0]->suara_tidak_sah ?? '0' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $tps->perolehanSuaras[0]->jumlah_dpt ?? '0' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $tps->perolehanSuaras[0]->perolehanSuaraBacalegs[0]->suara ?? '0' }}
                    </td>
                    @else
                    <td class="px-6 py-4">
                        -
                    </td>
                    <td class="px-6 py-4">
                        -
                    </td>
                    <td class="px-6 py-4">
                        -
                    </td>
                    <td class="px-6 py-4">
                        -
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
        @endforeach
        @endforeach
        @endforeach
    </div>

</div>