<div class="max-w-4xl mx-auto p-6">
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
        <!-- Header Form -->
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 px-8 py-6">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-white">Kirim Reminder</h2>
                    <p class="text-blue-100 mt-1">Isi form berikut untuk mengirim pengingat</p>
                </div>
                <div class="bg-white/20 p-3 rounded-xl">
                    <i class="fas fa-bell text-white text-2xl"></i>
                </div>
            </div>
        </div>

        <!-- Form Content -->
        <div class="p-8">
            <form class="space-y-6">
                <!-- Nama Kegiatan -->
                <div class="space-y-2">
                    <label for="penanggung-jawab" class="block text-sm font-semibold text-gray-500">
                        <i class="fas fa-tasks mr-2 text-blue-500"></i>
                        Nama Kegiatan
                        <span class="text-xs font-normal text-gray-400 ml-1">(Otomatis terisi)</span>
                    </label>
                    <div class="relative">
                        <input disabled wire:model="nama_kegiatan" type="text" id="penanggung-jawab"
                            class="w-full px-4 py-3 pl-11 border border-gray-200 rounded-xl bg-gray-50 text-gray-600 shadow-inner cursor-not-allowed">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-clipboard-list text-gray-400"></i>
                        </div>
                    </div>
                </div>

                <!-- Penanggung Jawab -->
                <div class="space-y-2">
                    <label for="penanggung-jawab" class="block text-sm font-semibold text-gray-500">
                        <i class="fas fa-user mr-2 text-gray-400"></i>
                        Penanggung Jawab
                        <span class="text-xs font-normal text-gray-400 ml-1">(Otomatis terisi)</span>
                    </label>
                    <div class="relative">
                        <input disabled type="text" id="penanggung-jawab"
                            class="w-full px-4 py-3 pl-11 border border-gray-200 rounded-xl bg-gray-50 text-gray-600 shadow-inner cursor-not-allowed"
                            wire:model="penanggung_jawab">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user-tie text-gray-400"></i>
                        </div>
                    </div>
                </div>

                <!-- Nomor Tujuan -->
                <div class="space-y-2">
                    <label for="nomor-tujuan" class="block text-sm font-semibold text-gray-700">
                        <i class="fas fa-phone mr-2 text-purple-500"></i>
                        Nomor Tujuan
                    </label>
                    <div class="relative">
                        <input disabled type="tel" id="nomor-tujuan"
                            class="w-full px-4 py-3 pl-11 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 bg-white shadow-sm"
                            wire:model="nomor_tujuan">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-mobile-alt text-gray-400"></i>
                        </div>
                    </div>
                    <p class="text-xs text-gray-500">Format: +62 8xx-xxxx-xxxx</p>
                </div>

                <div class="space-y-2">
                    <label for="pesan" class="block text-sm font-semibold text-gray-700">
                        <i class="fas fa-envelope mr-2 text-green-500"></i>
                        Pesan
                    </label>
                    <div class="relative">
                        <textarea id="pesan" rows="5"
                            class="w-full px-4 py-3 pl-11 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 bg-white shadow-sm resize-none"
                            placeholder="Tulis pesan reminder yang akan dikirim..."></textarea>
                        <div class="absolute top-3 left-3 flex items-start pointer-events-none">
                            <i class="fas fa-comment text-gray-400 mt-1"></i>
                        </div>
                    </div>
                </div>
                <!-- Action Buttons -->
                <div class="flex flex-col justify-end sm:flex-row gap-4 pt-6">
                    <a href="/penyetoran-lpj/reminder-whatsapp" wire:navigate
                        class="border-2 border-gray-300 text-gray-700 py-2 px-5 rounded-lg text-sm font-semibold hover:bg-gray-50 hover:border-gray-400 transition-all duration-200 flex items-center justify-center group w-fit">
                        <i class="fas fa-redo mr-2 group-hover:rotate-180 transition-transform duration-200"></i>
                        Kembali
                    </a>
                    <button type="submit"
                        class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-2 px-5 rounded-lg text-sm font-semibold shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center group w-fit">
                        <i class="fas fa-paper-plane mr-2 group-hover:scale-110 transition-transform duration-200"></i>
                        Kirim Reminder
                        <i
                            class="fas fa-arrow-right ml-1 group-hover:translate-x-1 transition-transform duration-200"></i>
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>