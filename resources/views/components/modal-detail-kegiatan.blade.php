<!-- Modal Detail Kegiatan -->
<div x-show="showDetail" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 p-4">

    <div @click.away="showDetail = false" x-show="showDetail"
        x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="opacity-0 scale-75 -translate-y-10"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200 transform"
        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 scale-90 translate-y-10"
        class="bg-white rounded-3xl shadow-2xl w-full max-w-2xl max-h-[85vh] overflow-hidden flex flex-col mx-auto lg:mx-0 lg:translate-x-16 xl:translate-x-20 2xl:translate-x-24">

        <!-- Header -->
        <div
            class="bg-gradient-to-b from-purple-900 to-purple-800 px-4 sm:px-6 py-4 sm:py-5 relative overflow-hidden flex-shrink-0">
            <div class="absolute inset-0 bg-white opacity-5"></div>
            <div class="relative flex items-center justify-between">
                <div class="flex items-center gap-3" x-show="showDetail"
                    x-transition:enter="transition ease-out duration-500 delay-100"
                    x-transition:enter-start="opacity-0 -translate-x-10"
                    x-transition:enter-end="opacity-100 translate-x-0">
                    <div
                        class="w-10 h-10 bg-white bg-opacity-20 backdrop-blur-sm rounded-2xl flex items-center justify-center ring-2 ring-white ring-opacity-30">
                        <i class="fa-solid fa-circle-info text-white text-lg"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-white">Detail Kegiatan</h2>
                        <p class="text-blue-100 text-sm mt-0.5">Informasi lengkap pelaksanaan kegiatan</p>
                    </div>
                </div>
                <button @click="showDetail = false" x-show="showDetail"
                    x-transition:enter="transition ease-out duration-500 delay-150"
                    x-transition:enter-start="opacity-0 translate-x-10 rotate-90"
                    x-transition:enter-end="opacity-100 translate-x-0 rotate-0"
                    class="w-9 h-9 flex items-center justify-center rounded-xl hover:bg-white hover:bg-opacity-20 transition-all duration-200 group flex-shrink-0">
                    <i
                        class="fa-solid fa-xmark text-white text-xl group-hover:rotate-90 transition-transform duration-200"></i>
                </button>
            </div>
        </div>

        <!-- Content -->
        <div class="p-4 sm:p-6 overflow-y-auto flex-1">
            <div class="space-y-4">

                <!-- Nama Kegiatan -->
                <div x-show="showDetail" x-transition:enter="transition ease-out duration-500 delay-200"
                    x-transition:enter-start="opacity-0 translate-y-4"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="bg-white rounded-2xl p-4 border-2 border-blue-100 shadow-sm hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center gap-2 mb-3">
                        <div
                            class="w-8 h-8 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-flag text-white text-sm"></i>
                        </div>
                        <label class="text-xs font-bold text-blue-600 uppercase tracking-wider">
                            Nama Kegiatan
                        </label>
                    </div>
                    <p class="text-gray-900 font-semibold text-base pl-0 sm:pl-10">
                        Pelatihan Pengembangan Kapasitas SDM Digital 2024
                    </p>
                </div>

                <!-- Lembaga & Lokasi -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div x-show="showDetail" x-transition:enter="transition ease-out duration-500 delay-300"
                        x-transition:enter-start="opacity-0 -translate-x-4"
                        x-transition:enter-end="opacity-100 translate-x-0"
                        class="bg-white rounded-2xl p-4 border-2 border-gray-100 shadow-sm hover:shadow-md hover:border-blue-200 transition-all duration-200">
                        <div class="flex items-center gap-2 mb-3">
                            <div
                                class="w-8 h-8 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-building text-white text-sm"></i>
                            </div>
                            <label class="text-xs font-bold text-gray-600 uppercase tracking-wider">
                                Lembaga
                            </label>
                        </div>
                        <p class="text-gray-900 font-medium text-sm pl-0 sm:pl-10">
                            Dinas Komunikasi dan Informatika
                        </p>
                    </div>

                    <div x-show="showDetail" x-transition:enter="transition ease-out duration-500 delay-350"
                        x-transition:enter-start="opacity-0 translate-x-4"
                        x-transition:enter-end="opacity-100 translate-x-0"
                        class="bg-white rounded-2xl p-4 border-2 border-gray-100 shadow-sm hover:shadow-md hover:border-red-200 transition-all duration-200">
                        <div class="flex items-center gap-2 mb-3">
                            <div
                                class="w-8 h-8 bg-gradient-to-br from-red-500 to-pink-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-location-dot text-white text-sm"></i>
                            </div>
                            <label class="text-xs font-bold text-gray-600 uppercase tracking-wider">
                                Lokasi
                            </label>
                        </div>
                        <p class="text-gray-900 font-medium text-sm pl-0 sm:pl-10">
                            Aula Gedung Serbaguna Lt. 3, Palu
                        </p>
                    </div>
                </div>

                <!-- Tanggal Mulai & Selesai -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div x-show="showDetail" x-transition:enter="transition ease-out duration-500 delay-400"
                        x-transition:enter-start="opacity-0 -translate-x-4"
                        x-transition:enter-end="opacity-100 translate-x-0"
                        class="bg-white rounded-2xl p-4 border-2 border-gray-100 shadow-sm hover:shadow-md hover:border-green-200 transition-all duration-200">
                        <div class="flex items-center gap-2 mb-3">
                            <div
                                class="w-8 h-8 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-calendar-day text-white text-sm"></i>
                            </div>
                            <label class="text-xs font-bold text-gray-600 uppercase tracking-wider">
                                Tanggal Mulai
                            </label>
                        </div>
                        <p class="text-gray-900 font-medium text-sm pl-0 sm:pl-10">
                            15 Januari 2024
                        </p>
                    </div>

                    <div x-show="showDetail" x-transition:enter="transition ease-out duration-500 delay-450"
                        x-transition:enter-start="opacity-0 translate-x-4"
                        x-transition:enter-end="opacity-100 translate-x-0"
                        class="bg-white rounded-2xl p-4 border-2 border-gray-100 shadow-sm hover:shadow-md hover:border-purple-200 transition-all duration-200">
                        <div class="flex items-center gap-2 mb-3">
                            <div
                                class="w-8 h-8 bg-gradient-to-br from-purple-500 to-violet-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-calendar-check text-white text-sm"></i>
                            </div>
                            <label class="text-xs font-bold text-gray-600 uppercase tracking-wider">
                                Tanggal Selesai
                            </label>
                        </div>
                        <p class="text-gray-900 font-medium text-sm pl-0 sm:pl-10">
                            20 Januari 2024
                        </p>
                    </div>
                </div>

                <!-- Penanggung Jawab & No Telepon -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div x-show="showDetail" x-transition:enter="transition ease-out duration-500 delay-500"
                        x-transition:enter-start="opacity-0 -translate-x-4"
                        x-transition:enter-end="opacity-100 translate-x-0"
                        class="bg-white rounded-2xl p-4 border-2 border-gray-100 shadow-sm hover:shadow-md hover:border-indigo-200 transition-all duration-200">
                        <div class="flex items-center gap-2 mb-3">
                            <div
                                class="w-8 h-8 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-user-tie text-white text-sm"></i>
                            </div>
                            <label class="text-xs font-bold text-gray-600 uppercase tracking-wider">
                                Penanggung Jawab
                            </label>
                        </div>
                        <p class="text-gray-900 font-medium text-sm pl-0 sm:pl-10">
                            Dr. Ahmad Rizki, S.Kom., M.T.
                        </p>
                    </div>

                    <div x-show="showDetail" x-transition:enter="transition ease-out duration-500 delay-550"
                        x-transition:enter-start="opacity-0 translate-x-4"
                        x-transition:enter-end="opacity-100 translate-x-0"
                        class="bg-white rounded-2xl p-4 border-2 border-gray-100 shadow-sm hover:shadow-md hover:border-teal-200 transition-all duration-200">
                        <div class="flex items-center gap-2 mb-3">
                            <div
                                class="w-8 h-8 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-phone text-white text-sm"></i>
                            </div>
                            <label class="text-xs font-bold text-gray-600 uppercase tracking-wider">
                                No. Telepon
                            </label>
                        </div>
                        <p class="text-gray-900 font-medium text-sm pl-0 sm:pl-10">
                            +62 812-3456-7890
                        </p>
                    </div>
                </div>

                <!-- Dana Disetujui & Status -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div x-show="showDetail" x-transition:enter="transition ease-out duration-500 delay-600"
                        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                        class="bg-gradient-to-br from-emerald-50 to-green-50 rounded-2xl p-4 border-2 border-emerald-200 shadow-sm hover:shadow-md transition-all duration-200">
                        <div class="flex items-center gap-2 mb-3">
                            <div
                                class="w-8 h-8 bg-gradient-to-br from-emerald-500 to-green-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-money-bill-wave text-white text-sm"></i>
                            </div>
                            <label class="text-xs font-bold text-emerald-700 uppercase tracking-wider">
                                Dana Disetujui
                            </label>
                        </div>
                        <p class="text-emerald-900 font-bold text-lg pl-0 sm:pl-10">
                            Rp 75.000.000
                        </p>
                    </div>

                    <div x-show="showDetail" x-transition:enter="transition ease-out duration-500 delay-650"
                        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                        class="bg-white rounded-2xl p-4 border-2 border-gray-100 shadow-sm hover:shadow-md hover:border-amber-200 transition-all duration-200">
                        <div class="flex items-center gap-2 mb-3">
                            <div
                                class="w-8 h-8 bg-gradient-to-br from-amber-500 to-orange-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-circle-check text-white text-sm"></i>
                            </div>
                            <label class="text-xs font-bold text-gray-600 uppercase tracking-wider">
                                Status
                            </label>
                        </div>
                        <div class="pl-0 sm:pl-10">
                            <span
                                class="inline-flex items-center gap-2 px-3 py-1.5 rounded-xl text-xs font-bold bg-green-100 text-green-700 shadow-sm">
                                <i class="fa-solid fa-check-circle"></i>
                                Disetujui
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Keterangan -->
                <div x-show="showDetail" x-transition:enter="transition ease-out duration-500 delay-700"
                    x-transition:enter-start="opacity-0 translate-y-4"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="bg-gradient-to-br from-orange-50 to-amber-50 rounded-2xl p-4 border-2 border-orange-200 shadow-sm">
                    <div class="flex items-center gap-2 mb-3">
                        <div
                            class="w-8 h-8 bg-gradient-to-br from-orange-500 to-red-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-file-lines text-white text-sm"></i>
                        </div>
                        <label class="text-xs font-bold text-orange-700 uppercase tracking-wider">
                            Keterangan
                        </label>
                    </div>
                    <p class="text-gray-800 leading-relaxed pl-0 sm:pl-10 text-sm">
                        Kegiatan ini bertujuan untuk meningkatkan kompetensi aparatur sipil negara dalam bidang
                        teknologi digital dan transformasi digital pemerintahan. Program mencakup pelatihan coding, data
                        analytics, cybersecurity, dan implementasi e-Government. Diikuti oleh 50 peserta dari berbagai
                        OPD di lingkungan Pemerintah Kota Palu.
                    </p>
                </div>

            </div>
        </div>

        <!-- Footer -->
        <div x-show="showDetail" x-transition:enter="transition ease-out duration-500 delay-750"
            x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
            class="px-4 sm:px-6 py-4 bg-gradient-to-r from-gray-50 to-gray-100 border-t-2 border-gray-200 flex justify-end flex-shrink-0">
            <button @click="showDetail = false"
                class="w-full sm:w-auto px-6 py-2.5 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 rounded-xl text-white font-semibold transition-all duration-200 flex items-center justify-center gap-2 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 active:scale-95">
                <i class="fa-solid fa-check text-base"></i>
                <span>Tutup</span>
            </button>
        </div>

    </div>
</div>