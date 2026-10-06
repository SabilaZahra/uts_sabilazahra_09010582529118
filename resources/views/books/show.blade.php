<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('books.index') }}" class="text-sm text-pink-400 hover:underline">← Kembali ke daftar</a>
        <h2 class="font-bold text-2xl text-pink-700 mt-1">Detail Buku 📖</h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow-sm rounded-3xl border border-pink-100 grid md:grid-cols-3 gap-6">

            <div class="rounded-2xl p-6 text-white shadow-lg min-h-[240px] flex flex-col justify-between"
                 style="background:linear-gradient(135deg,#f9a8d4 0%,#f472b6 55%,#fb7185 100%);">
                <div class="text-7xl font-bold opacity-90">{{ strtoupper(mb_substr($book->title, 0, 1)) }}</div>
                <div>
                    <div class="font-semibold leading-snug">{{ $book->title }}</div>
                    <div class="text-sm text-pink-50">{{ $book->author }}</div>
                </div>
            </div>

            <div class="md:col-span-2">
                <span class="px-3 py-1 bg-pink-100 text-pink-700 rounded-full text-sm">{{ $book->category->name }}</span>
                <h3 class="text-2xl font-bold text-pink-700 mt-3">{{ $book->title }}</h3>

                <dl class="mt-4 divide-y divide-pink-100">
                    <div class="flex py-3"><dt class="w-40 text-pink-500">Penulis</dt><dd class="font-medium">{{ $book->author }}</dd></div>
                    <div class="flex py-3"><dt class="w-40 text-pink-500">Penerbit</dt><dd class="font-medium">{{ $book->publisher }}</dd></div>
                    <div class="flex py-3"><dt class="w-40 text-pink-500">Tahun Terbit</dt><dd class="font-medium">{{ $book->year }}</dd></div>
                    <div class="flex py-3"><dt class="w-40 text-pink-500">Stok</dt><dd class="font-medium">{{ $book->stock }} buku</dd></div>
                    <div class="flex py-3"><dt class="w-40 text-pink-500">Ditambahkan</dt><dd class="font-medium">{{ $book->created_at->format('d M Y') }}</dd></div>
                </dl>

                <div class="flex gap-2 mt-6">
                    <a href="{{ route('books.edit', $book) }}" class="px-6 py-2.5 bg-pink-500 hover:bg-pink-400 text-white font-semibold rounded-full transition">Edit</a>
                    <a href="{{ route('books.index') }}" class="px-6 py-2.5 bg-pink-100 hover:bg-pink-200 text-pink-700 rounded-full transition">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>