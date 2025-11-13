 <div class="bg-white rounded-xl shadow-md p-6">
     <div class="flex justify-between items-center mb-4">
         <h2 class="text-xl font-semibold text-gray-700">Daftar LPJ</h2>
         <a href="/penyetoran-lpj/tambah" wire:navigate
             class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition">
             <i class="fa-solid fa-plus"></i>
             <span>Setor LPJ</span>
         </a>
     </div>

     <div class="overflow-x-auto">
         <table class="min-w-full border border-gray-200 text-sm text-gray-600">
             <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                 <tr>
                     <th class="px-4 py-3 border">No</th>
                     <th class="px-4 py-3 border text-left">Nama Kegiatan</th>
                     <th class="px-4 py-3 border text-left">Lembaga</th>
                     <th class="px-4 py-3 border text-left">Tanggal Selesai</th>
                     <th class="px-4 py-3 border text-left">Tenggat LPJ</th>
                     <th class="px-4 py-3 border text-left">Tanggal Disetor</th>
                     <th class="px-4 py-3 border text-left">Status LPJ</th>
                     <th class="px-4 py-3 border text-left">Diperiksa SPI</th>
                     <th class="px-4 py-3 border text-center">Aksi</th>
                 </tr>
             </thead>
             <tbody>
                 <tr class="border-b hover:bg-gray-50">
                     <td class="px-4 py-3 text-center">1</td>
                     <td class="px-4 py-3">Seminar Nasional</td>
                     <td class="px-4 py-3">BEM Fakultas Ekonomi</td>
                     <td class="px-4 py-3">2025-10-15</td>
                     <td class="px-4 py-3">2025-10-30</td>
                     <td class="px-4 py-3">2025-10-25</td>
                     <td class="px-4 py-3 text-blue-600 font-medium">Menunggu Pemeriksaan</td>
                     <td class="px-4 py-3 text-center">
                         <i class="fa-solid fa-check text-green-500"></i>
                     </td>
                     <td class="px-4 py-3 text-center">
                         <button class="text-blue-600 hover:text-blue-800">
                             <i class="fa-solid fa-eye"></i>
                         </button>
                     </td>
                 </tr>
             </tbody>
         </table>
     </div>
 </div>
