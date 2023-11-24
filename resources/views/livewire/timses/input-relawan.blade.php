<section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div
            class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <div class="flex justify-between">
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Tambah relawan
                    </h1>
                    <button type="button"
                        class="text-white bg-[#FF9119] hover:bg-[#FF9119]/80 focus:ring-4 focus:outline-none focus:ring-[#FF9119]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-[#FF9119]/80 dark:focus:ring-[#FF9119]/40 me-2 mb-2">
                        Import
                        <svg class="w-4 h-4 ms-2" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100"
                            height="100" viewBox="0 0 48 48">
                            <path fill="#169154" d="M29,6H15.744C14.781,6,14,6.781,14,7.744v7.259h15V6z"></path>
                            <path fill="#18482a" d="M14,33.054v7.202C14,41.219,14.781,42,15.743,42H29v-8.946H14z">
                            </path>
                            <path fill="#0c8045" d="M14 15.003H29V24.005000000000003H14z"></path>
                            <path fill="#17472a" d="M14 24.005H29V33.055H14z"></path>
                            <g>
                                <path fill="#29c27f" d="M42.256,6H29v9.003h15V7.744C44,6.781,43.219,6,42.256,6z"></path>
                                <path fill="#27663f" d="M29,33.054V42h13.257C43.219,42,44,41.219,44,40.257v-7.202H29z">
                                </path>
                                <path fill="#19ac65" d="M29 15.003H44V24.005000000000003H29z"></path>
                                <path fill="#129652" d="M29 24.005H44V33.055H29z"></path>
                            </g>
                            <path fill="#0c7238"
                                d="M22.319,34H5.681C4.753,34,4,33.247,4,32.319V15.681C4,14.753,4.753,14,5.681,14h16.638 C23.247,14,24,14.753,24,15.681v16.638C24,33.247,23.247,34,22.319,34z">
                            </path>
                            <path fill="#fff"
                                d="M9.807 19L12.193 19 14.129 22.754 16.175 19 18.404 19 15.333 24 18.474 29 16.123 29 14.013 25.07 11.912 29 9.526 29 12.719 23.982z">
                            </path>
                        </svg>
                    </button>
                </div>
                <form class="space-y-4 md:space-y-6" action="#">
                    <div>
                        <label for="tps" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi
                            TPS</label>
                        <select id="tps"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Harap pilih TPS</option>
                            @forelse ($ListTps as $tps)
                            <option value="{{ $tps->id }}">
                                <span>{{ $tps->wilayahKelurahanDesa->nama_kelurahan_desa }}</span> |
                                <span>{{ $tps->nama_tps }}</span>
                            </option>
                            @empty

                            @endforelse
                        </select>
                    </div>
                    @if (Config::get('orchid_opinion.timses.use_ktp'))
                    <div class="sm:col-span-2">
                        <label for="tel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                            KTP</label>
                        <input type="tel" name="tel" id="tel"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Isikan nomor KTP" required="">
                    </div>
                    @endif
                    <div class="sm:col-span-2">
                        <label for="tel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                            HP</label>
                        <input type="tel" name="tel" id="tel"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Isikan nomor HP" required="">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            relawan</label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Isikan nama relawan" required="">
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        Tambah
                    </button>
                    <button type="button"
                        class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 w-full dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        Tambah & tambah lainnya
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>