@foreach ($dapils->kabupatenKota as $kabKota)
@foreach ($kabKota->wilayahKecamatans as $kecamatan)
@foreach ($kecamatan->wilayahKelurahanDesas as $kelDesa)
<table>
    <tbody>
        <tr>
            <td>Kabupaten/Kota : {{ $kabKota->nama_kabupaten_kota }}</td>
        </tr>
        <tr>
            <td>Kecamatan : {{ $kecamatan->nama_kecamatan }}</td>
        </tr>
        <tr>
            <td>Kelurahan/Desa : {{ $kelDesa->nama_kelurahan_desa }}</td>
        </tr>
    </tbody>
</table>
<table>
    <thead>
        <tr>
            <th scope="col">
                Nama TPS
            </th>
            <th scope="col">
                Suara sah
            </th>
            <th scope="col">
                Suara tidak
            </th>
            <th scope="col">
                Jumlah DPT
            </th>
            <th scope="col">
                Perolehan suara
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kelDesa->allDataTps as $tps)
        <tr>
            <th scope="row">
                {{ $tps->nama_tps }}
            </th>
            @if($tps->perolehanSuaras->isNotEmpty())
            <td>
                {{ $tps->perolehanSuaras[0]->suara_sah ?? '0' }}
            </td>
            <td>
                {{ $tps->perolehanSuaras[0]->suara_tidak_sah ?? '0' }}
            </td>
            <td>
                {{ $tps->perolehanSuaras[0]->jumlah_dpt ?? '0' }}
            </td>
            <td>
                {{ $tps->perolehanSuaras[0]->perolehanSuaraBacalegs[0]->suara ?? '0' }}
            </td>
            @else
            <td>
                -
            </td>
            <td>
                -
            </td>
            <td>
                -
            </td>
            <td>
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