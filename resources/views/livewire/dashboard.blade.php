<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    @foreach ($partais as $partai)
    <ul>
        <li>
            {{ $partai->nama_partai }}
            <span class="text-red-600">{{ $partai->total_suara_partai }}</span>
            <ul>
                @foreach ($partai->dataBakalCalons as $bacaleg)
                    {{ $bacaleg->nama_bakal_calon }}
                    <span class="text-blue-600">{{ $bacaleg->total_suara_bacaleg }}</span>
                @endforeach
            </ul>
        </li>
    </ul>
    @endforeach
</div>
