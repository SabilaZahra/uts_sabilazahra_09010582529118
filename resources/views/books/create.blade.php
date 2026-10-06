<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('books.index') }}" class="text-sm text-pink-400 hover:underline">← Kembali ke daftar</a>
        <h2 class="font-bold text-2xl text-pink-700 mt-1">Tambah Buku Baru ✨</h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        @if (session('success'))
            <div class="mb-4 p-3 bg-pink-100 text-pink-800 rounded-xl">{{ session('success') }}</div>
        @endif

        <div class="bg-white p-6 shadow-sm rounded-3xl border border-pink-100">
            <form method="POST" action="{{ route('books.store') }}">
                @csrf
                @include('books._form', ['book' => null])
            </form>
        </div>
    </div>
</x-app-layout>