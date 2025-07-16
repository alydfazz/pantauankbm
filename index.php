<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jurnal Pantauan KBM - SMK Negeri 1 Banyumas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Poppins', sans-serif; }
        .gradient-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .card-shadow { box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
        .animate-fade-in { animation: fadeIn 0.5s ease-in; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .teacher-card { transition: all 0.3s ease; }
        .teacher-card:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(0,0,0,0.15); }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="gradient-bg text-white py-6 mb-8">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-3xl font-bold mb-2">📚 Jurnal Pantauan KBM</h1>
            <h2 class="text-xl font-medium">SMK Negeri 1 Banyumas</h2>
            <p class="text-blue-100 mt-2">Sistem Monitoring Kegiatan Belajar Mengajar</p>
        </div>
    </div>

    <!-- Menu Screen -->
    <div id="menuScreen" class="container mx-auto px-4 max-w-md">
        <div class="bg-white rounded-xl card-shadow p-8 animate-fade-in">
            <div class="text-center mb-8">
                <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">📚</span>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Pilih Menu</h3>
                <p class="text-gray-600">Silakan pilih menu yang ingin diakses</p>
            </div>
            
            <div class="space-y-4">
                <button onclick="showStudentLogin()" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-4 rounded-lg transition-colors flex items-center justify-center">
                    <span class="text-xl mr-3">✏️</span>
                    <div class="text-left">
                        <div class="font-semibold">Input Jurnal KBM</div>
                        <div class="text-sm text-blue-100">Untuk siswa melaporkan kehadiran guru</div>
                    </div>
                </button>
                
                <button onclick="showAdminLogin()" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-medium py-4 rounded-lg transition-colors flex items-center justify-center">
                    <span class="text-xl mr-3">📊</span>
                    <div class="text-left">
                        <div class="font-semibold">Lihat Rekap Data</div>
                        <div class="text-sm text-purple-100">Untuk admin melihat laporan kehadiran</div>
                    </div>
                </button>
            </div>
        </div>
    </div>

    <!-- Student Login Screen -->
    <div id="studentLoginScreen" class="hidden container mx-auto px-4 max-w-md">
        <div class="bg-white rounded-xl card-shadow p-8 animate-fade-in">
            <div class="text-center mb-6">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl">✏️</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-800">Input Jurnal KBM</h3>
                <p class="text-gray-600 mt-2">Masukkan data untuk melaporkan kehadiran guru</p>
            </div>
            <input type="tel" id="phoneNumber" placeholder="Masukkan nomor HP..." 
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent mb-4">
            <input type="password" id="studentPassword" placeholder="Masukkan sandi..." 
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent mb-4">
            <div class="flex gap-3">
                <button onclick="studentLogin()" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 rounded-lg transition-colors">
                    Masuk
                </button>
                <button onclick="showMenuScreen()" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-3 rounded-lg">
                    Kembali
                </button>
            </div>
        </div>
    </div>

    <!-- Admin Login Screen -->
    <div id="adminLoginScreen" class="hidden container mx-auto px-4 max-w-md">
        <div class="bg-white rounded-xl card-shadow p-8 animate-fade-in">
            <div class="text-center mb-6">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl">📊</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-800">Lihat Rekap Data</h3>
                <p class="text-gray-600 mt-2">Masukkan sandi untuk melihat rekap kehadiran</p>
            </div>
            <input type="password" id="adminPassword" placeholder="Masukkan sandi..." 
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent mb-4">
            <div class="flex gap-3">
                <button onclick="adminLogin()" class="flex-1 bg-purple-600 hover:bg-purple-700 text-white font-medium py-3 rounded-lg transition-colors">
                    Masuk
                </button>
                <button onclick="showMenuScreen()" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-3 rounded-lg">
                    Kembali
                </button>
            </div>
        </div>
    </div>

    <!-- Main Form -->
    <div id="mainForm" class="hidden container mx-auto px-4 max-w-4xl">
        <div class="bg-white rounded-xl card-shadow p-8 animate-fade-in">
            <div class="grid md:grid-cols-2 gap-6">
                <!-- Left Column -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">📋 Informasi Kelas</h3>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Kelas</label>
                        <select id="classSelect" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                            <option value="">-- Pilih Kelas --</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
                        <input type="date" id="dateInput" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Jam Mulai</label>
                            <select id="startHour" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                                <option value="">Pilih</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Jam Selesai</label>
                            <select id="endHour" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                                <option value="">Pilih</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">👨‍🏫 Cari Guru</h3>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Guru</label>
                        <input type="text" id="teacherSearch" placeholder="Ketik nama guru..." 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                               oninput="searchTeacher()">
                    </div>

                    <div id="teacherResults" class="max-h-64 overflow-y-auto space-y-2"></div>
                </div>
            </div>

            <!-- Selected Teacher -->
            <div id="selectedTeacher" class="hidden mt-6 p-4 bg-blue-50 rounded-lg border border-blue-200">
                <h4 class="font-medium text-blue-800 mb-3">Guru Terpilih:</h4>
                <div id="selectedTeacherInfo"></div>
            </div>

            <!-- Submit Button -->
            <div class="mt-8 flex justify-center gap-4">
                <button onclick="showMenuScreen()" class="bg-gray-500 hover:bg-gray-600 text-white font-medium px-6 py-3 rounded-lg transition-colors">
                    ← Kembali ke Menu
                </button>
                <button id="saveButton" onclick="saveEntry()" class="bg-gray-400 text-white font-medium px-8 py-3 rounded-lg cursor-not-allowed" disabled>
                    💾 Simpan Data
                </button>
            </div>
        </div>
    </div>

    <!-- Recap Screen -->
    <div id="recapScreen" class="hidden container mx-auto px-4 max-w-6xl">
        <div class="bg-white rounded-xl card-shadow p-8 animate-fade-in">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-gray-800">📊 Rekap Kehadiran Guru</h3>
                <button onclick="showMainForm()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                    ← Kembali ke Form
                </button>
            </div>

            <!-- Teacher Rating Section -->
            <div id="teacherRating" class="hidden mb-6 p-4 bg-blue-50 rounded-lg border border-blue-200">
                <h4 class="text-lg font-semibold text-blue-800 mb-3">📊 Rating Guru</h4>
                <div id="teacherRatingContent"></div>
            </div>

            <!-- Filters -->
            <div class="grid md:grid-cols-4 gap-4 mb-6 p-4 bg-gray-50 rounded-lg">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Filter Kelas</label>
                    <select id="filterClass" onchange="filterRecap()" class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                        <option value="">Semua Kelas</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Filter Guru</label>
                    <input type="text" id="filterTeacher" placeholder="Cari nama guru..." oninput="filterRecap()" class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Mulai</label>
                    <input type="date" id="startDateFilter" onchange="filterRecap()" class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Selesai</label>
                    <input type="date" id="endDateFilter" onchange="filterRecap()" class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                </div>
            </div>

            <!-- Export Buttons -->
            <div class="flex gap-3 mb-6">
                <div class="relative">
                    <button onclick="togglePrintMenu()" id="printMenuBtn" class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg flex items-center">
                        🖨️ Cetak ▼
                    </button>
                    <div id="printMenu" class="hidden absolute top-full left-0 mt-1 bg-white border border-gray-300 rounded-lg shadow-lg z-10 min-w-40">
                        <button onclick="printRecap()" class="block w-full text-left px-4 py-2 hover:bg-gray-100 text-gray-700">
                            🖨️ Cetak Halaman
                        </button>
                        <button onclick="exportToPDF()" class="block w-full text-left px-4 py-2 hover:bg-gray-100 text-gray-700">
                            📄 Export PDF
                        </button>
                        <button onclick="exportToExcel()" class="block w-full text-left px-4 py-2 hover:bg-gray-100 text-gray-700">
                            📊 Export Excel
                        </button>
                    </div>
                </div>
                <button onclick="showPiketScreenWithPassword()" class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded-lg">
                    🚨 Dashboard Piket
                </button>
            </div>

            <!-- Recap Table -->
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2 text-left">Tanggal</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Kelas</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Jam</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Guru</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Status</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">No HP Pelapor</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Status Piket</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Guru Piket</th>
                        </tr>
                    </thead>
                    <tbody id="recapTableBody">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Piket Screen -->
    <div id="piketScreen" class="hidden container mx-auto px-4 max-w-6xl">
        <div class="bg-white rounded-xl card-shadow p-8 animate-fade-in">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-gray-800">🚨 Dashboard Guru Piket</h3>
                <div class="flex gap-3">
                    <button onclick="showRecapScreen()" class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg">
                        ← Kembali ke Rekap
                    </button>
                    <button onclick="showMenuScreen()" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg">
                        Keluar
                    </button>
                </div>
            </div>

            <!-- Tabs -->
            <div class="flex border-b mb-6">
                <button onclick="showPiketTab('alerts')" id="alertsTab" class="px-4 py-2 border-b-2 border-blue-500 text-blue-600 font-medium">
                    🚨 Peringatan Kelas
                </button>
                <button onclick="showPiketTab('teachers')" id="teachersTab" class="px-4 py-2 text-gray-600 hover:text-blue-600 ml-4">
                    👨‍🏫 Kelola Guru
                </button>
            </div>

            <!-- Alerts Tab -->
            <div id="alertsContent">
                <div class="grid gap-4" id="piketAlerts">
                    <!-- Alerts will be populated here -->
                </div>
            </div>

            <!-- Teachers Management Tab -->
            <div id="teachersContent" class="hidden">
                <div class="mb-6">
                    <div class="flex gap-4 mb-4">
                        <input type="text" id="newTeacherName" placeholder="Nama guru baru..." 
                               class="flex-1 px-4 py-2 border border-gray-300 rounded-lg">
                        <button onclick="addTeacher()" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg">
                            ➕ Tambah Guru
                        </button>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-300">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border border-gray-300 px-4 py-2 text-left">No</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Nama Guru</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="teachersTableBody">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Teacher Modal -->
    <div id="editTeacherModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-xl p-6 max-w-md w-full mx-4">
            <h3 class="text-lg font-bold mb-4">✏️ Edit Nama Guru</h3>
            <input type="text" id="editTeacherName" class="w-full px-4 py-3 border border-gray-300 rounded-lg mb-4">
            <div class="flex gap-3">
                <button onclick="saveEditTeacher()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex-1">
                    💾 Simpan
                </button>
                <button onclick="closeEditModal()" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
                    Batal
                </button>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="successModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-xl p-6 max-w-md w-full mx-4">
            <div class="text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl">✅</span>
                </div>
                <h3 class="text-lg font-bold mb-2">Data Tersimpan!</h3>
                <p class="text-gray-600 mb-4">Data kehadiran guru berhasil disimpan ke sistem.</p>
                <button onclick="closeSuccessModal()" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg">
                    OK
                </button>
            </div>
        </div>
    </div>

    <!-- Password Modal for Recap -->
    <div id="recapPasswordModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-xl p-6 max-w-md w-full mx-4">
            <h3 class="text-lg font-bold mb-4">🔐 Masukkan Sandi Rekap</h3>
            <input type="password" id="recapPasswordInput" placeholder="Masukkan sandi..." 
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg mb-4">
            <div class="flex gap-3">
                <button onclick="verifyRecapPassword()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex-1">
                    Masuk
                </button>
                <button onclick="closeRecapPasswordModal()" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
                    Batal
                </button>
            </div>
        </div>
    </div>

    <!-- Password Modal for Piket -->
    <div id="piketPasswordModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-xl p-6 max-w-md w-full mx-4">
            <h3 class="text-lg font-bold mb-4">🚨 Masukkan Sandi Piket</h3>
            <input type="password" id="piketPasswordInput" placeholder="Masukkan sandi..." 
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg mb-4">
            <div class="flex gap-3">
                <button onclick="verifyPiketPassword()" class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded-lg flex-1">
                    Masuk
                </button>
                <button onclick="closePiketPasswordModal()" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
                    Batal
                </button>
            </div>
        </div>
    </div>

    <!-- Piket Handler Name Modal -->
    <div id="piketHandlerModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-xl p-6 max-w-md w-full mx-4">
            <h3 class="text-lg font-bold mb-4">👨‍🏫 Nama Guru Piket</h3>
            <input type="text" id="piketHandlerName" placeholder="Masukkan nama guru piket..." 
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg mb-4">
            <div class="flex gap-3">
                <button onclick="savePiketHandler()" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg flex-1">
                    Simpan
                </button>
                <button onclick="closePiketHandlerModal()" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
                    Batal
                </button>
            </div>
        </div>
    </div>

    <script>
        // Data
        const classes = [
            'X AKL 1', 'X AKL 2', 'X AKL 3', 'X MPLB 1', 'X MPLB 2', 'X MPLB 3',
            'X PM 1', 'X PM 2', 'X PM 3', 'X TJKT 1', 'X TJKT 2', 'X TJKT 3',
            'X DKV 1', 'X DKV 2', 'X DKV 3', 'XI AKL 1', 'XI AKL 2', 'XI AKL 3',
            'XI MPLB 1', 'XI MPLB 2', 'XI MPLB 3', 'XI PM 1', 'XI PM 2', 'XI PM 3',
            'XI TJKT 1', 'XI TJKT 2', 'XI TJKT 3', 'XI DKV 1', 'XI DKV 2', 'XI DKV 3',
            'XII AKL 1', 'XII AKL 2', 'XII AKL 3', 'XII OTKP 1', 'XII OTKP 2', 'XII OTKP 3',
            'XII BDP 1', 'XII BDP 2', 'XII BDP 3', 'XII TKJ 1', 'XII TKJ 2', 'XII TKJ 3',
            'XII MM 1', 'XII MM 2', 'XII MM 3'
        ];

        let teachers = [
            'Adetia Ratih Pratiwi, S.Pd.', 'Adhi Wasesa, S.Pd.', 'Agung Tri Hadi, S.Pd.',
            'Amin Purwanto, S.Pd', 'Ananto Pratikno, S.Pd.', 'Anggraita Dyah Tantri, S.Pd.',
            'Anggun Nofitasari, S.Pd.', 'Anwar Fauzi, S.Sos.', 'Ari Sulistiono, S.Pd. M.Pd.',
            'Ari Wiyatmi, S.Pd.', 'Arwinah, S.Pd.', 'Avip Marodhi, S.Pd.',
            'Brilian Artati Putri, S.Pd.', 'Deni Wiliyastoro, S.Pd.', 'Didi Supriyadi, S.Pd',
            'Dita Lufitasari, S.Pd.', 'Dra. Retno Widowati', 'Dra. Sri Murdiyatun',
            'Drs. Gito Suryono', 'Drs. Kuswandi, M.Si.', 'Drs. Sugito, M.Si.',
            'Dwi Agustini, S.Pd.', 'Dwi Aji Lasito, S.Kom.', 'Dwi Nurahman, S.Pd.',
            'Eko Syarif Hidayat, S.Si.', 'Emi Triastuti, S.Kom.', 'Erni Kundhiarsih, S.Si.',
            'Evani Ulya Laksmiyanti, S.Pd.', 'Farah Fauziyah, S.Pd.', 'Fenti Puriyanti, S.Pd.',
            'Fery Subekti S,Pd.', 'Fitri Fujiyanti, S.Pd', 'Fitriana Herliyati, S.Pd.',
            'Habib Almanan, S.P.', 'Henni Pujiastuti, S.Pd', 'Hery Mulyono, S.S.',
            'Ika Agustina, S.Pd.', 'Indarti Widyaningsih, S.Pd.', 'Indhi Hermawati, S.Pd',
            'Isana Ulfah, S.Pd.I M.Pd.', 'Iwan Supriono, S.Pd.', 'Kasan, S.Pd.',
            'Khusnul Khotimah, S.Kom.', 'Lestari Ujiani, S.Pd', 'Lolita Senandung Nacita, S.Kom.',
            'Luki Arwan, S.Pd.', "Ma'rifah Nur Prihatini, S.Pd.", 'Maryanto, S.Kom.',
            'Moch Syarif Hidayat, S.Kom.', 'Mohamad Arif Suprapto, S.Si.', 'Monita Sari, S.Pd.',
            'Muchdirin, S.Pd. M.Ed.', 'Muslikhah, S.Ag.', 'Musyafariah, S.Pd.',
            "Musta'anah, S.Pd.", 'Nasfatikhah, S.Pd.', 'Nugroho, S.T. M.Kom.',
            'Nuning Sawitri Yuliani, S.Pd.', 'Nur Fajri Budiasti, S.Psi.', 'Nur Mei Setianingsih, S.Pd.',
            'Paryati, S.Pd.', 'Peni Budyaningsih, S.Pd.', 'Prajna Bhadra Darmastuti, M.Kom.',
            'Prima Diadita Wiguna, S.Pd.', 'Purwati, S.Sos.', 'Purwoko, S.Pd.',
            'Raesita Yuni Kurniasih, S.Pd.', 'Ratna Budi Susanti', 'Rianto, S.Pd.',
            'Rifngah Alivia Maulani, S.Pd.I.', 'Rifqi Al Mubarok, S.Kom.', 'Riyanto, S.Kom.',
            'Roman Boby Pradana, S.Pd.', 'Septi Wuri Handayani, S.Pd.', 'Sigit Purwono, S.Kom.',
            'Soemardijanto, S.Pd.', 'Suci Ika Febrianti, S.Pd.', 'Supriyono, S.Pd.',
            'Surati, S.E.', 'Sutarsih, S.Pd.', 'Sutiyah, S.E', 'Tersiana Wijayanti, S.Pd.',
            'Titik Setyowati Oktavia, S.Sn.', 'Tri Utami, S.Pd.', 'Triwahyu Puspa Huda, S.Pd.',
            'Tuti Widiarti, S.Pd. M.Pd.', 'Utami Hadiyanti, S.Pd. M.M.', 'Wahyu Kurniawan, S.Pd.',
            'Wakhid Herri Nurcahyo, S.Kom', 'Wening Windarsari, S.Pd.', 'Wisnu Wiwarawan, S.Kom, Gr',
            'Wiwi Yunianti, S.Pd.', 'Yudi Nugroho, S.Pd.', 'Yuliatri Wirawidya Haryono, S.Si.M.Pd.'
        ];

        // attendanceData akan diisi dari database
        let attendanceData = []; 
        let selectedTeacherData = null;
        let currentUserPhone = '';
        let editingTeacherIndex = -1;
        let currentPiketAlertId = null;

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            initializeSelects();
            document.getElementById('dateInput').value = new Date().toISOString().split('T')[0];
            const storedTeachers = localStorage.getItem('teachersList');
            if (storedTeachers) {
                teachers = JSON.parse(storedTeachers);
            }
        });

        function initializeSelects() {
            // Populate classes
            const classSelect = document.getElementById('classSelect');
            classes.forEach(cls => {
                const option = document.createElement('option');
                option.value = cls;
                option.textContent = cls;
                classSelect.appendChild(option);
            });

            // Populate filter class
            const filterClass = document.getElementById('filterClass');
            classes.forEach(cls => {
                const option = document.createElement('option');
                option.value = cls;
                option.textContent = cls;
                filterClass.appendChild(option);
            });

            // Populate hours
            const startHour = document.getElementById('startHour');
            const endHour = document.getElementById('endHour');
            for(let i = 1; i <= 11; i++) {
                const option1 = document.createElement('option');
                option1.value = i;
                option1.textContent = `Jam ke-${i}`;
                startHour.appendChild(option1);

                const option2 = document.createElement('option');
                option2.value = i;
                option2.textContent = `Jam ke-${i}`;
                endHour.appendChild(option2);
            }

            // Add event listeners for form validation
            document.getElementById('classSelect').addEventListener('change', validateForm);
            document.getElementById('dateInput').addEventListener('change', validateForm);
            document.getElementById('startHour').addEventListener('change', function() {
                updateEndHourOptions();
                validateForm();
            });
            document.getElementById('endHour').addEventListener('change', validateForm);
        }

        function updateEndHourOptions() {
            const startHour = parseInt(document.getElementById('startHour').value);
            const endHour = document.getElementById('endHour');
            
            // Clear existing options
            endHour.innerHTML = '<option value="">Pilih</option>';
            
            if (startHour) {
                // Add options starting from the hour after start hour
                for(let i = startHour + 1; i <= 11; i++) {
                    const option = document.createElement('option');
                    option.value = i;
                    option.textContent = `Jam ke-${i}`;
                    endHour.appendChild(option);
                }
            }
        }

        function validateForm() {
            const classValue = document.getElementById('classSelect').value;
            const date = document.getElementById('dateInput').value;
            const startHour = document.getElementById('startHour').value;
            const endHour = document.getElementById('endHour').value;
            const saveButton = document.getElementById('saveButton');

            if (classValue && date && startHour && endHour && selectedTeacherData) {
                saveButton.disabled = false;
                saveButton.className = 'bg-green-600 hover:bg-green-700 text-white font-medium px-8 py-3 rounded-lg transition-colors cursor-pointer';
            } else {
                saveButton.disabled = true;
                saveButton.className = 'bg-gray-400 text-white font-medium px-8 py-3 rounded-lg cursor-not-allowed';
            }
        }

        function showMenuScreen() {
            document.getElementById('studentLoginScreen').classList.add('hidden');
            document.getElementById('adminLoginScreen').classList.add('hidden');
            document.getElementById('mainForm').classList.add('hidden');
            document.getElementById('recapScreen').classList.add('hidden');
            document.getElementById('piketScreen').classList.add('hidden');
            document.getElementById('menuScreen').classList.remove('hidden');
        }

        function showStudentLogin() {
            document.getElementById('menuScreen').classList.add('hidden');
            document.getElementById('studentLoginScreen').classList.remove('hidden');
        }

        function showAdminLogin() {
            document.getElementById('menuScreen').classList.add('hidden');
            document.getElementById('adminLoginScreen').classList.remove('hidden');
        }

        function studentLogin() {
            const password = document.getElementById('studentPassword').value;
            const phone = document.getElementById('phoneNumber').value;
            
            if (password === 'absenbanyumas') {
                if (!phone) {
                    alert('Harap masukkan nomor HP!');
                    return;
                }
                currentUserPhone = phone;
                document.getElementById('studentLoginScreen').classList.add('hidden');
                document.getElementById('mainForm').classList.remove('hidden');
            } else {
                alert('Sandi salah! Gunakan "absenbanyumas"');
            }
        }

        function adminLogin() {
            const password = document.getElementById('adminPassword').value;
            
            if (password === 'banyumashebat') {
                document.getElementById('adminLoginScreen').classList.add('hidden');
                document.getElementById('recapScreen').classList.remove('hidden');
                loadRecapData(); 
            } else {
                alert('Sandi salah! Gunakan "banyumashebat"');
            }
        }

        function searchTeacher() {
            const query = document.getElementById('teacherSearch').value.toLowerCase();
            const results = document.getElementById('teacherResults');
            
            if (query.length === 0) {
                results.innerHTML = '';
                return;
            }

            const filteredTeachers = teachers.filter(teacher => 
                teacher.toLowerCase().includes(query)
            );

            results.innerHTML = '';
            filteredTeachers.forEach(teacher => {
                const card = document.createElement('div');
                card.className = 'teacher-card bg-white border border-gray-200 rounded-lg p-3 cursor-pointer hover:bg-blue-50';
                card.innerHTML = `
                    <div class="font-medium text-gray-800">${teacher}</div>
                    <div class="mt-2 space-y-1">
                        <label class="flex items-center">
                            <input type="radio" name="attendance_${teacher}" value="hadir" class="mr-2">
                            <span class="text-green-600">✅ Hadir</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="attendance_${teacher}" value="hadir_tugas" class="mr-2">
                            <span class="text-blue-600">📚 Hadir tapi Memberi Tugas</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="attendance_${teacher}" value="tidak_hadir_tugas" class="mr-2">
                            <span class="text-yellow-600">📝 Tidak Hadir tapi Memberi Tugas</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="attendance_${teacher}" value="tidak_hadir_tidak_tugas" class="mr-2">
                            <span class="text-red-600">❌ Tidak Hadir dan Tidak Memberi Tugas</span>
                        </label>
                    </div>
                `;
                
                card.addEventListener('click', () => selectTeacher(teacher, card));
                results.appendChild(card);
            });
        }

        function selectTeacher(teacher, card) {
            const radios = card.querySelectorAll('input[type="radio"]');
            let selectedStatus = null;
            
            radios.forEach(radio => {
                if (radio.checked) {
                    selectedStatus = radio.value;
                }
            });

            if (!selectedStatus) {
                alert('Pilih status kehadiran guru terlebih dahulu!');
                return;
            }

            selectedTeacherData = { name: teacher, status: selectedStatus };
            
            const statusText = {
                'hadir': '✅ Hadir',
                'hadir_tugas': '📚 Hadir tapi Memberi Tugas',
                'tidak_hadir_tugas': '📝 Tidak Hadir tapi Memberi Tugas',
                'tidak_hadir_tidak_tugas': '❌ Tidak Hadir dan Tidak Memberi Tugas'
            };

            const statusColor = selectedStatus === 'hadir' ? 'text-green-600' : 
                              selectedStatus === 'hadir_tugas' ? 'text-blue-600' :
                              selectedStatus === 'tidak_hadir_tugas' ? 'text-yellow-600' : 'text-red-600';

            document.getElementById('selectedTeacherInfo').innerHTML = `
                <div class="flex items-center justify-between">
                    <div>
                        <div class="font-medium">${teacher}</div>
                        <div class="text-sm ${statusColor}">${statusText[selectedStatus]}</div>
                    </div>
                    <button onclick="clearSelection()" class="text-red-500 hover:text-red-700">❌</button>
                </div>
            `;
            
            document.getElementById('selectedTeacher').classList.remove('hidden');
            document.getElementById('teacherResults').innerHTML = '';
            document.getElementById('teacherSearch').value = '';
            validateForm();
        }

        function clearSelection() {
            selectedTeacherData = null;
            document.getElementById('selectedTeacher').classList.add('hidden');
            validateForm();
        }

        function saveEntry() {
            const classValue = document.getElementById('classSelect').value;
            const date = document.getElementById('dateInput').value;
            const startHour = document.getElementById('startHour').value;
            const endHour = document.getElementById('endHour').value;

            if (!classValue || !date || !startHour || !endHour || !selectedTeacherData) {
                alert('Harap lengkapi semua data!');
                return;
            }

            const entryData = {
                kelas: classValue,
                tanggal: date,
                jam_mulai: parseInt(startHour), 
                jam_selesai: parseInt(endHour), 
                nama_guru: selectedTeacherData.name,
                status: selectedTeacherData.status,
                no_hp: currentUserPhone 
            };

            // Mengirim data ke simpan.php
            fetch('simpan.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(entryData),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('successModal').classList.remove('hidden');
                    // Reset form setelah berhasil disimpan
                    document.getElementById('classSelect').value = '';
                    document.getElementById('startHour').value = '';
                    document.getElementById('endHour').value = '';
                    clearSelection();
                    // Opsional: Muat ulang data rekap jika pengguna berada di layar rekap
                    if (!document.getElementById('recapScreen').classList.contains('hidden')) {
                        loadRecapData();
                    }
                } else {
                    alert('Gagal menyimpan data: ' + (data.error || 'Terjadi kesalahan yang tidak diketahui.'));
                    console.error('Server error:', data.error);
                }
            })
            .catch((error) => {
                console.error('Error sending data:', error);
                alert('Terjadi kesalahan jaringan atau server saat menyimpan data.');
            });
        }

        function showMainForm() {
            document.getElementById('recapScreen').classList.add('hidden');
            document.getElementById('mainForm').classList.remove('hidden');
        }

        function showRecapScreenWithPassword() {
            document.getElementById('recapPasswordModal').classList.remove('hidden');
        }

        function verifyRecapPassword() {
            const password = document.getElementById('recapPasswordInput').value;
            if (password === 'banyumashebat') {
                closeRecapPasswordModal();
                document.getElementById('mainForm').classList.add('hidden');
                document.getElementById('recapScreen').classList.remove('hidden');
                loadRecapData(); 
            } else {
                alert('Sandi salah! Gunakan "banyumashebat"');
            }
        }

        function closeRecapPasswordModal() {
            document.getElementById('recapPasswordModal').classList.add('hidden');
            document.getElementById('recapPasswordInput').value = '';
        }

        function showPiketScreenWithPassword() {
            document.getElementById('piketPasswordModal').classList.remove('hidden');
        }

        function verifyPiketPassword() {
            const password = document.getElementById('piketPasswordInput').value;
            if (password === 'piketsmea') {
                closePiketPasswordModal();
                document.getElementById('recapScreen').classList.add('hidden');
                document.getElementById('piketScreen').classList.remove('hidden');
                loadPiketData(); 
            } else {
                alert('Sandi salah! Gunakan "piketsmea"');
            }
        }

        function closePiketPasswordModal() {
            document.getElementById('piketPasswordModal').classList.add('hidden');
            document.getElementById('piketPasswordInput').value = '';
        }

        function showRecapScreen() {
            document.getElementById('piketScreen').classList.add('hidden');
            document.getElementById('recapScreen').classList.remove('hidden');
            loadRecapData(); 
        }

        function closeSuccessModal() {
            document.getElementById('successModal').classList.add('hidden');
        }

        function loadRecapData() {
            fetch('tampil.php') 
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }
                    return response.json();
                })
                .then(data => {
                    if (Array.isArray(data)) {
                        attendanceData = data.map(item => ({
                            ...item,
                            jam_mulai: String(item.jam_mulai), 
                            jam_selesai: String(item.jam_selesai) 
                        }));
                        filterRecap(); 
                    } else {
                        console.error('Data received is not an array:', data);
                        attendanceData = []; 
                        filterRecap();
                    }
                })
                .catch(error => {
                    console.error('Error loading recap data:', error);
                    alert('Gagal memuat data rekap dari server. Silakan coba lagi.');
                });
        }

        function filterRecap() {
            const filterClass = document.getElementById('filterClass').value;
            const filterTeacher = document.getElementById('filterTeacher').value.toLowerCase();
            const startDateFilter = document.getElementById('startDateFilter').value;
            const endDateFilter = document.getElementById('endDateFilter').value;

            let filteredData = [...attendanceData];

            if (filterClass) {
                filteredData = filteredData.filter(item => item.kelas === filterClass);
            }

            if (filterTeacher) {
                filteredData = filteredData.filter(item => 
                    item.nama_guru.toLowerCase().includes(filterTeacher)
                );
                
                // Show teacher rating if specific teacher is searched
                if (filterTeacher.trim() !== '') {
                    showTeacherRating(filterTeacher, startDateFilter, endDateFilter);
                } else {
                    hideTeacherRating();
                }
            } else {
                hideTeacherRating();
            }

            // Filter by date range
            if (startDateFilter || endDateFilter) {
                filteredData = filteredData.filter(item => {
                    const itemDate = item.tanggal; 
                    let includeItem = true;
                    
                    if (startDateFilter && itemDate < startDateFilter) {
                        includeItem = false;
                    }
                    
                    if (endDateFilter && itemDate > endDateFilter) {
                        includeItem = false;
                    }
                    
                    return includeItem;
                });
            }

            displayRecapData(filteredData);
        }

        function calculateTeacherPoints(status) {
            const points = {
                'hadir': 5,
                'hadir_tugas': 4,
                'tidak_hadir_tugas': 2,
                'tidak_hadir_tidak_tugas': 0
            };
            return points[status] || 0;
        }

        function getStarRating(averagePoints) {
            if (averagePoints >= 4.5) return 5;
            if (averagePoints >= 3.5) return 4;
            if (averagePoints >= 2.5) return 3;
            if (averagePoints >= 1.5) return 2;
            return 1;
        }

        function showTeacherRating(teacherName, startDate, endDate) {
            let teacherData = attendanceData.filter(item => 
                item.nama_guru.toLowerCase().includes(teacherName)
            );

            // Filter by date range if provided
            if (startDate || endDate) {
                teacherData = teacherData.filter(item => {
                    const itemDate = item.tanggal; 
                    let includeItem = true;
                    
                    if (startDate && itemDate < startDate) {
                        includeItem = false;
                    }
                    
                    if (endDate && itemDate > endDate) {
                        includeItem = false;
                    }
                    
                    return includeItem;
                });
            }

            if (teacherData.length === 0) {
                hideTeacherRating();
                return;
            }

            let totalPoints = 0;
            let statusCount = {
                'hadir': 0,
                'hadir_tugas': 0,
                'tidak_hadir_tugas': 0,
                'tidak_hadir_tidak_tugas': 0
            };

            teacherData.forEach(item => {
                const points = calculateTeacherPoints(item.status);
                totalPoints += points;
                statusCount[item.status]++;
            });

            const averagePoints = totalPoints / teacherData.length;
            const starRating = getStarRating(averagePoints);
            const stars = '⭐'.repeat(starRating) + '☆'.repeat(5 - starRating);

            // Create date range text
            let dateRangeText = '';
            if (startDate && endDate) {
                dateRangeText = `Periode: ${new Date(startDate).toLocaleDateString('id-ID')} - ${new Date(endDate).toLocaleDateString('id-ID')}`;
            } else if (startDate) {
                dateRangeText = `Mulai: ${new Date(startDate).toLocaleDateString('id-ID')}`;
            } else if (endDate) {
                dateRangeText = `Sampai: ${new Date(endDate).toLocaleDateString('id-ID')}`;
            } else {
                dateRangeText = 'Periode: Semua Data';
            }

            const ratingContent = document.getElementById('teacherRatingContent');
            ratingContent.innerHTML = `
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <h5 class="font-semibold text-gray-800 mb-3">Rating Keseluruhan</h5>
                        <div class="text-3xl mb-2">${stars}</div>
                        <div class="text-lg font-medium text-blue-600">${starRating}/5 Bintang</div>
                        <div class="text-sm text-gray-600">Rata-rata: ${averagePoints.toFixed(1)} poin</div>
                        <div class="text-sm text-gray-600">Total Laporan: ${teacherData.length}</div>
                        <div class="text-sm text-blue-600 font-medium mt-2">${dateRangeText}</div>
                    </div>
                    <div>
                        <h5 class="font-semibold text-gray-800 mb-3">Detail Kehadiran</h5>
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-green-600">✅ Hadir</span>
                                <span class="font-medium">${statusCount.hadir} (${statusCount.hadir * 5} poin)</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-blue-600">📚 Hadir + Tugas</span>
                                <span class="font-medium">${statusCount.hadir_tugas} (${statusCount.hadir_tugas * 4} poin)</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-yellow-600">📝 Tidak Hadir + Tugas</span>
                                <span class="font-medium">${statusCount.tidak_hadir_tugas} (${statusCount.tidak_hadir_tugas * 2} poin)</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-red-600">❌ Tidak Hadir</span>
                                <span class="font-medium">${statusCount.tidak_hadir_tidak_tugas} (${statusCount.tidak_hadir_tidak_tugas * 0} poin)</span>
                            </div>
                            <hr class="my-2">
                            <div class="flex justify-between font-bold">
                                <span>Total Poin</span>
                                <span class="text-blue-600">${totalPoints}</span>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            document.getElementById('teacherRating').classList.remove('hidden');
        }

        function hideTeacherRating() {
            document.getElementById('teacherRating').classList.add('hidden');
        }

        function displayRecapData(data) {
            const tbody = document.getElementById('recapTableBody');
            tbody.innerHTML = '';

            data.forEach(item => {
                const row = document.createElement('tr');
                const statusClass = item.status === 'hadir' ? 'text-green-600' : 
                                  item.status === 'hadir_tugas' ? 'text-blue-600' :
                                  item.status === 'tidak_hadir_tugas' ? 'text-yellow-600' : 'text-red-600';
                
                const statusText = {
                    'hadir': '✅ Hadir',
                    'hadir_tugas': '📚 Hadir + Tugas',
                    'tidak_hadir_tugas': '📝 Tidak Hadir + Tugas',
                    'tidak_hadir_tidak_tugas': '❌ Tidak Hadir'
                };

                const piketStatus = item.piketStatus || 'belum_ditangani';
                const piketHandler = item.piketHandler || '-';

                const piketStatusText = {
                    'belum_ditangani': '⏳ Belum Ditangani',
                    'sudah_ditangani': '✅ Sudah Ditangani',
                    'guru_piket_menuju': '🏃‍♂️ Guru Piket Menuju'
                };

                const piketStatusClass = piketStatus === 'sudah_ditangani' ? 'text-green-600' : 
                                       piketStatus === 'guru_piket_menuju' ? 'text-blue-600' : 'text-orange-600';

                row.innerHTML = `
                    <td class="border border-gray-300 px-4 py-2">${new Date(item.tanggal).toLocaleDateString('id-ID')}</td>
                    <td class="border border-gray-300 px-4 py-2">${item.kelas}</td>
                    <td class="border border-gray-300 px-4 py-2">Jam ${item.jam_mulai}-${item.jam_selesai}</td>
                    <td class="border border-gray-300 px-4 py-2">${item.nama_guru}</td>
                    <td class="border border-gray-300 px-4 py-2 ${statusClass}">${statusText[item.status]}</td>
                    <td class="border border-gray-300 px-4 py-2">${item.no_hp || '-'}</td>
                    <td class="border border-gray-300 px-4 py-2 ${piketStatusClass}">${piketStatusText[piketStatus] || '-'}</td>
                    <td class="border border-gray-300 px-4 py-2">${piketHandler}</td>
                `;
                tbody.appendChild(row);
            });
        }

        function exportToPDF() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            
            doc.setFontSize(16);
            doc.text('Rekap Kehadiran Guru - SMK Negeri 1 Banyumas', 20, 20);
            
            let yPos = 40;
            const filteredData = getFilteredData();
            
            filteredData.forEach(item => {
                doc.setFontSize(10);
                doc.text(`${new Date(item.tanggal).toLocaleDateString('id-ID')} | ${item.kelas} | ${item.nama_guru} | ${item.status}`, 20, yPos);
                yPos += 10;
                
                if (yPos > 280) {
                    doc.addPage();
                    yPos = 20;
                }
            });
            
            doc.save('rekap-kehadiran-guru.pdf');
        }

        function exportToExcel() {
            const filteredData = getFilteredData().map(item => ({
                Tanggal: new Date(item.tanggal).toLocaleDateString('id-ID'),
                Kelas: item.kelas,
                Jam: `Jam ${item.jam_mulai}-${item.jam_selesai}`,
                Guru: item.nama_guru,
                Status: item.status,
                'No HP Pelapor': item.no_hp,
                'Status Piket': item.piketStatus || 'belum_ditangani',
                'Guru Piket': item.piketHandler || '-'
            }));
            const ws = XLSX.utils.json_to_sheet(filteredData);
            const wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, "Rekap Kehadiran");
            XLSX.writeFile(wb, "rekap-kehadiran-guru.xlsx");
        }

        function printRecap() {
            window.print();
        }

        function getFilteredData() {
            const filterClass = document.getElementById('filterClass').value;
            const filterTeacher = document.getElementById('filterTeacher').value.toLowerCase();
            const startDateFilter = document.getElementById('startDateFilter').value;
            const endDateFilter = document.getElementById('endDateFilter').value;

            let filteredData = [...attendanceData];

            if (filterClass) {
                filteredData = filteredData.filter(item => item.kelas === filterClass);
            }

            if (filterTeacher) {
                filteredData = filteredData.filter(item => 
                    item.nama_guru.toLowerCase().includes(filterTeacher)
                );
            }

            // Filter by date range
            if (startDateFilter || endDateFilter) {
                filteredData = filteredData.filter(item => {
                    const itemDate = item.tanggal; 
                    let includeItem = true;
                    
                    if (startDateFilter && itemDate < startDateFilter) {
                        includeItem = false;
                    }
                    
                    if (endDateFilter && itemDate > endDateFilter) {
                        includeItem = false;
                    }
                    
                    return includeItem;
                });
            }

            return filteredData;
        }

        // Piket Functions
        function loadPiketData() {
            fetch('tampil.php')
                .then(response => response.json())
                .then(data => {
                    if (Array.isArray(data)) {
                        attendanceData = data; 
                        loadPiketAlerts(); 
                    } else {
                        console.error('Data received for piket alerts is not an array:', data);
                        attendanceData = [];
                        loadPiketAlerts();
                    }
                })
                .catch(error => {
                    console.error('Error loading attendance data for piket:', error);
                    alert('Gagal memuat data kehadiran untuk dashboard piket.');
                });
            loadTeachersTable(); 
        }

        function showPiketTab(tab) {
            if (tab === 'alerts') {
                document.getElementById('alertsContent').classList.remove('hidden');
                document.getElementById('teachersContent').classList.add('hidden');
                document.getElementById('alertsTab').className = 'px-4 py-2 border-b-2 border-blue-500 text-blue-600 font-medium';
                document.getElementById('teachersTab').className = 'px-4 py-2 text-gray-600 hover:text-blue-600 ml-4';
                loadPiketAlerts();
            } else {
                document.getElementById('alertsContent').classList.add('hidden');
                document.getElementById('teachersContent').classList.remove('hidden');
                document.getElementById('teachersTab').className = 'px-4 py-2 border-b-2 border-blue-500 text-blue-600 font-medium ml-4';
                document.getElementById('alertsTab').className = 'px-4 py-2 text-gray-600 hover:text-blue-600';
                loadTeachersTable();
            }
        }

        function loadPiketAlerts() {
            const alertsContainer = document.getElementById('piketAlerts');
            const alerts = attendanceData.filter(item => 
                (item.status === 'tidak_hadir_tugas' || item.status === 'tidak_hadir_tidak_tugas') && 
                (item.piketStatus === 'belum_ditangani' || !item.piketStatus) 
            );

            alertsContainer.innerHTML = '';

            if (alerts.length === 0) {
                alertsContainer.innerHTML = '<div class="text-center text-gray-500 py-8">Tidak ada peringatan kelas saat ini</div>';
                return;
            }

            alerts.forEach(alert => {
                const alertCard = document.createElement('div');
                alertCard.className = 'bg-orange-50 border border-orange-200 rounded-lg p-4';
                
                const statusColor = alert.status === 'tidak_hadir_tidak_tugas' ? 'text-red-600' : 'text-yellow-600';
                const statusText = alert.status === 'tidak_hadir_tidak_tugas' ? 
                    '❌ Tidak Hadir dan Tidak Memberi Tugas' : '📝 Tidak Hadir tapi Memberi Tugas';

                alertCard.innerHTML = `
                    <div class="flex justify-between items-start">
                        <div class="flex-1">
                            <h4 class="font-semibold text-gray-800 mb-2">🚨 Kelas ${alert.kelas}</h4>
                            <p class="text-sm text-gray-600 mb-1">Guru: ${alert.nama_guru}</p>
                            <p class="text-sm text-gray-600 mb-1">Jam: ${alert.jam_mulai}-${alert.jam_selesai}</p>
                            <p class="text-sm text-gray-600 mb-1">Tanggal: ${new Date(alert.tanggal).toLocaleDateString('id-ID')}</p>
                            <p class="text-sm ${statusColor} mb-2">${statusText}</p>
                            <p class="text-xs text-gray-500">Dilaporkan oleh: ${alert.no_hp}</p>
                        </div>
                        <div class="flex flex-col gap-2">
                            <button onclick="handlePiketResponse(${alert.id})" 
                                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm">
                                ✅ Tangani
                            </button>
                            ${alert.status === 'tidak_hadir_tidak_tugas' ? 
                                `<button onclick="goToClass(${alert.id})" 
                                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm">
                                    🏃‍♂️ Menuju Kelas
                                </button>` : ''
                            }
                        </div>
                    </div>
                `;
                alertsContainer.appendChild(alertCard);
            });
        }

        function handlePiketResponse(alertId) {
            currentPiketAlertId = alertId;
            document.getElementById('piketHandlerName').placeholder = 'Masukkan nama guru piket...'; // Reset placeholder
            document.getElementById('piketHandlerModal').classList.remove('hidden');
        }

        function savePiketHandler() {
            const handlerName = document.getElementById('piketHandlerName').value.trim();
            if (!handlerName) {
                alert('Masukkan nama guru piket!');
                return;
            }

            const alertIndex = attendanceData.findIndex(item => item.id === currentPiketAlertId);
            if (alertIndex !== -1) {
                fetch('update_piket_status.php', { 
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        id: attendanceData[alertIndex].id,
                        piketStatus: 'sudah_ditangani',
                        piketHandler: handlerName
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        attendanceData[alertIndex].piketStatus = 'sudah_ditangani';
                        attendanceData[alertIndex].piketHandler = handlerName;
                        closePiketHandlerModal();
                        loadPiketAlerts(); 
                        alert('Kelas berhasil ditangani! Status telah diperbarui.');
                    } else {
                        alert('Gagal memperbarui status piket: ' + (data.error || 'Kesalahan tidak diketahui.'));
                    }
                })
                .catch(error => {
                    console.error('Error updating piket status:', error);
                    alert('Terjadi kesalahan jaringan saat memperbarui status piket.');
                });
            }
        }

        function closePiketHandlerModal() {
            document.getElementById('piketHandlerModal').classList.add('hidden');
            document.getElementById('piketHandlerName').value = '';
            currentPiketAlertId = null;
        }

        function goToClass(alertId) {
            const alertItem = attendanceData.find(item => item.id === alertId);
            if (alertItem) {
                if (confirm(`Apakah Anda akan menuju ke kelas ${alertItem.kelas} untuk mendampingi siswa?`)) {
                    currentPiketAlertId = alertId;
                    document.getElementById('piketHandlerName').placeholder = 'Nama guru piket yang menuju kelas...';
                    document.getElementById('piketHandlerModal').classList.remove('hidden');
                }
            }
        }

        function loadTeachersTable() {
            const tbody = document.getElementById('teachersTableBody');
            tbody.innerHTML = '';

            teachers.forEach((teacher, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td class="border border-gray-300 px-4 py-2">${index + 1}</td>
                    <td class="border border-gray-300 px-4 py-2">${teacher}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <button onclick="editTeacher(${index})" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm mr-2">
                            ✏️ Edit
                        </button>
                        <button onclick="deleteTeacher(${index})" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">
                            🗑️ Hapus
                        </button>
                    </td>
                `;
                tbody.appendChild(row);
            });
        }

        function addTeacher() {
            const newName = document.getElementById('newTeacherName').value.trim();
            if (!newName) {
                alert('Masukkan nama guru!');
                return;
            }

            if (teachers.includes(newName)) {
                alert('Nama guru sudah ada!');
                return;
            }

            teachers.push(newName);
            teachers.sort();
            localStorage.setItem('teachersList', JSON.stringify(teachers)); 
            document.getElementById('newTeacherName').value = '';
            loadTeachersTable();
            alert('Guru berhasil ditambahkan!');
        }

        function editTeacher(index) {
            editingTeacherIndex = index;
            document.getElementById('editTeacherName').value = teachers[index];
            document.getElementById('editTeacherModal').classList.remove('hidden');
        }

        function saveEditTeacher() {
            const newName = document.getElementById('editTeacherName').value.trim();
            if (!newName) {
                alert('Masukkan nama guru!');
                return;
            }

            if (teachers.includes(newName) && teachers[editingTeacherIndex] !== newName) {
                alert('Nama guru sudah ada!');
                return;
            }

            teachers[editingTeacherIndex] = newName;
            teachers.sort();
            localStorage.setItem('teachersList', JSON.stringify(teachers)); // Simpan ke localStorage
            closeEditModal();
            loadTeachersTable();
            alert('Nama guru berhasil diperbarui!');
        }

        function closeEditModal() {
            document.getElementById('editTeacherModal').classList.add('hidden');
            editingTeacherIndex = -1;
        }

        function deleteTeacher(index) {
            if (confirm(`Hapus guru "${teachers[index]}"?`)) {
                teachers.splice(index, 1);
                localStorage.setItem('teachersList', JSON.stringify(teachers)); // Simpan ke localStorage
                loadTeachersTable();
                alert('Guru berhasil dihapus!');
            }
        }

        function togglePrintMenu() {
            const menu = document.getElementById('printMenu');
            menu.classList.toggle('hidden');
        }

        // Close print menu when clicking outside
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('printMenu');
            const btn = document.getElementById('printMenuBtn');
            if (menu && btn && !menu.contains(event.target) && !btn.contains(event.target)) {
                menu.classList.add('hidden');
            }
        });
    </script>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'95f69d0a255f89a7',t:'MTc1MjU1NDc1OS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>