<x-app-layout>
    <div class="py-8 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

        <div class="rounded-3xl p-8 text-white shadow-lg"
             style="background:linear-gradient(135deg,#f9a8d4 0%,#f472b6 50%,#fb7185 100%);">
            <p class="text-pink-50 text-sm">Selamat datang kembali 🌸</p>
            <h1 class="text-2xl sm:text-3xl font-bold mt-1">Halo, {{ Auth::user()->name }}!</h1>
            <p class="mt-2 text-pink-50 max-w-xl">Kelola koleksi buku perpustakaanmu dengan mudah: tambah, ubah, cari, dan pantau stok dalam satu tempat.</p>
            <div class="mt-5 flex flex-wrap gap-3">
                <a href="{{ route('books.create') }}" class="px-5 py-2.5 bg-white text-pink-600 font-semibold rounded-full shadow hover:bg-pink-50 transition">+ Tambah Buku</a>
                <a href="{{ route('books.index') }}" class="px-5 py-2.5 border border-white text-white rounded-full hover:bg-white/20 transition">Lihat Daftar Buku</a>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="bg-white rounded-2xl p-5 shadow-sm border border-pink-100 flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-pink-100 flex items-center justify-center text-2xl">📖</div>
                <div>
                    <p class="text-3xl font-bold text-pink-600">{{ $totalBooks }}</p>
                    <p class="text-sm text-gray-500">Judul Buku</p>
                </div>
            </div>
            <div class="bg-white rounded-2xl p-5 shadow-sm border border-pink-100 flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-rose-100 flex items-center justify-center text-2xl">🏷️</div>
                <div>
                    <p class="text-3xl font-bold text-rose-500">{{ $totalCategories }}</p>
                    <p class="text-sm text-gray-500">Kategori</p>
                </div>
            </div>
            <div class="bg-white rounded-2xl p-5 shadow-sm border border-pink-100 flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-fuchsia-100 flex items-center justify-center text-2xl">📦</div>
                <div>
                    <p class="text-3xl font-bold text-fuchsia-500">{{ $totalStock }}</p>
                    <p class="text-sm text-gray-500">Total Stok</p>
                </div>
            </div>
        </div>

        <div class="grid lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 bg-white rounded-2xl p-6 shadow-sm border border-pink-100">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-semibold text-pink-700">Buku Terbaru</h3>
                    <a href="{{ route('books.index') }}" class="text-sm text-pink-500 hover:underline">Lihat semua →</a>
                </div>
                <div class="space-y-3">
                    @forelse ($recentBooks as $b)
                        <a href="{{ route('books.show', $b) }}" class="flex items-center gap-4 p-3 rounded-xl hover:bg-pink-50 transition">
                            <div class="w-10 h-12 rounded-lg flex items-center justify-center text-white font-bold shadow-sm"
                                 style="background:linear-gradient(135deg,#f9a8d4,#f472b6);">
                                {{ strtoupper(mb_substr($b->title, 0, 1)) }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-medium text-gray-800 truncate">{{ $b->title }}</p>
                                <p class="text-xs text-gray-500">{{ $b->author }}</p>
                            </div>
                            <span class="px-3 py-0.5 bg-pink-100 text-pink-700 rounded-full text-xs">{{ $b->category->name }}</span>
                        </a>
                    @empty
                        <p class="text-gray-500 text-sm">Belum ada buku.</p>
                    @endforelse
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-pink-100">
                <h3 class="font-semibold text-pink-700 mb-4">Ringkasan Kategori</h3>
                <div class="space-y-4">
                    @foreach ($categories as $c)
                        <div>
                            <div class="flex justify-between text-sm mb-1">
                                <span class="text-gray-700">{{ $c->name }}</span>
                                <span class="text-pink-500 font-medium">{{ $c->books_count }} buku</span>
                            </div>
                            <div class="h-2 rounded-full bg-pink-100 overflow-hidden">
                                <div class="h-2 rounded-full"
                                     style="width: {{ $totalBooks ? round($c->books_count / $totalBooks * 100) : 0 }}%; background:linear-gradient(90deg,#f9a8d4,#f472b6);"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>