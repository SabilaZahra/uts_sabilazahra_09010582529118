<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap justify-between items-end gap-3">
            <div>
                <h2 class="font-bold text-2xl text-pink-700">Daftar Buku 📚</h2>
                <p class="text-sm text-pink-400">Total {{ $books->total() }} buku ditemukan</p>
            </div>
            <a href="{{ route('books.create') }}" class="px-5 py-2.5 bg-pink-500 hover:bg-pink-400 text-white font-semibold rounded-full shadow-sm transition">+ Tambah Buku</a>
        </div>
    </x-slot>

    <div class="py-6 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow-sm rounded-3xl border border-pink-100">

            @if (session('success'))
                <div class="mb-4 p-3 bg-pink-100 text-pink-800 rounded-xl">✅ {{ session('success') }}</div>
            @endif

            <form method="GET" class="flex flex-wrap gap-2 mb-5">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="🔍 Cari judul atau penulis..."
                       class="flex-1 min-w-[200px] rounded-full border-pink-200 bg-pink-50/40 focus:border-pink-400 focus:ring-pink-300">
                <select name="category_id" class="rounded-full border-pink-200 bg-pink-50/40 focus:border-pink-400 focus:ring-pink-300">
                    <option value="">Semua Kategori</option>
                    @foreach ($categories as $c)
                        <option value="{{ $c->id }}" @selected(request('category_id') == $c->id)>{{ $c->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="px-5 py-2 bg-pink-400 hover:bg-pink-500 text-white rounded-full transition">Cari</button>
                @if (request('search') || request('category_id'))
                    <a href="{{ route('books.index') }}" class="px-5 py-2 bg-pink-100 text-pink-700 rounded-full">Reset</a>
                @endif
            </form>

            <div class="overflow-x-auto rounded-2xl border border-pink-100">
                <table class="w-full text-left">
                    <thead class="bg-pink-100 text-pink-800 text-sm">
                        <tr>
                            <th class="p-3">No</th>
                            <th class="p-3">Buku</th>
                            <th class="p-3">Kategori</th>
                            <th class="p-3">Tahun</th>
                            <th class="p-3">Stok</th>
                            <th class="p-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($books as $i => $b)
                            <tr class="border-t border-pink-100 hover:bg-pink-50/70 transition">
                                <td class="p-3 text-gray-500">{{ $books->firstItem() + $i }}</td>
                                <td class="p-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-12 shrink-0 rounded-lg flex items-center justify-center text-white font-bold shadow-sm"
                                             style="background:linear-gradient(135deg,#f9a8d4,#f472b6);">
                                            {{ strtoupper(mb_substr($b->title, 0, 1)) }}
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-800">{{ $b->title }}</p>
                                            <p class="text-xs text-gray-500">{{ $b->author }} · {{ $b->publisher }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-3"><span class="px-3 py-1 bg-pink-100 text-pink-700 rounded-full text-xs">{{ $b->category->name }}</span></td>
                                <td class="p-3 text-gray-600">{{ $b->year }}</td>
                                <td class="p-3">
                                    <span class="px-3 py-1 rounded-full text-xs {{ $b->stock <= 3 ? 'bg-rose-100 text-rose-600' : 'bg-emerald-100 text-emerald-700' }}">
                                        {{ $b->stock }}
                                    </span>
                                </td>
                                <td class="p-3">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('books.show', $b) }}" class="px-3 py-1 bg-pink-100 text-pink-700 rounded-full text-xs hover:bg-pink-200">Detail</a>
                                        <a href="{{ route('books.edit', $b) }}" class="px-3 py-1 bg-amber-100 text-amber-700 rounded-full text-xs hover:bg-amber-200">Edit</a>
                                        <form method="POST" action="{{ route('books.destroy', $b) }}" onsubmit="return confirm('Hapus buku ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 bg-rose-100 text-rose-600 rounded-full text-xs hover:bg-rose-200">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="p-10 text-center">
                                    <div class="text-4xl mb-2">🌸</div>
                                    <p class="text-gray-500">Belum ada buku yang cocok.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">{{ $books->links() }}</div>
        </div>
    </div>
</x-app-layout>