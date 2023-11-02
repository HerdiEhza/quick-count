<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}

    <div class="grid grid-cols-4 gap-4 p-4">
        @foreach ($partais as $partai)
        <ul>
            <li>
                <div class="flex items-center space-x-2">
                    <img class="flex-none w-12 h-12 bg-gray-50" src="{{ $partai->logo_partai }}" alt="">
                    <div>
                        <span>{{ $loop->iteration }}</span>
                        <span>{{ $partai->nama_partai }}</span>
                    </div>
                </div>
                <div class="flex justify-between">
                    <span>Perolehan Suara Partai</span>
                    <span class="text-red-600">{{ number_format($partai->total_suara_partai) }}</span>
                </div>
                <ul>
                    @foreach ($partai->dataBakalCalons as $bacaleg)
                    <li>
                        <a href="{{ route('dashboard.qc.detail', ['caleg' => $bacaleg->id]) }}" class="flex justify-between">
                            <div>
                                <span>{{ $loop->iteration }}</span>
                                <span>{{ $bacaleg->nama_bakal_calon }}</span>
                            </div>
                            <span class="text-blue-600">{{ number_format($bacaleg->total_suara_bacaleg) }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </li>
        </ul>
        @endforeach
    </div>
</div>
