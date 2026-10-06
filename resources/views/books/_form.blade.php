@php
    $inp = 'block w-full mt-1 rounded-xl border-pink-200 bg-pink-50/40 focus:border-pink-400 focus:ring-pink-300 shadow-sm';
    $lbl = 'text-sm font-semibold text-pink-700';
    $err = 'text-rose-500 text-xs mt-1';
@endphp

<div class="grid lg:grid-cols-3 gap-6"
     x-data="{ title: @js(old('title', $book?->title ?? '')), author: @js(old('author', $book?->author ?? '')), year: @js(old('year', $book?->year ?? '')) }">

    <div class="lg:col-span-2 space-y-5">
        <div>
            <label class="{{ $lbl }}">Judul Buku</label>
            <input type="text" name="title" x-model="title" placeholder="Contoh: Laskar Pelangi" class="{{ $inp }}">
            @error('title') <p class="{{ $err }}">{{ $message }}</p> @enderror
        </div>

        <div class="grid sm:grid-cols-2 gap-4">
            <div>
                <label class="{{ $lbl }}">Penulis</label>
                <input type="text" name="author" x-model="author" placeholder="Nama penulis" class="{{ $inp }}">
                @error('author') <p class="{{ $err }}">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="{{ $lbl }}">Penerbit</label>
                <input type="text" name="publisher" value="{{ old('publisher', $book?->publisher) }}" placeholder="Nama penerbit" class="{{ $inp }}">
                @error('publisher') <p class="{{ $err }}">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="grid sm:grid-cols-2 gap-4">
            <div>
                <label class="{{ $lbl }}">Tahun Terbit</label>
                <input type="number" name="year" x-model="year" placeholder="{{ date('Y') }}" class="{{ $inp }}">
                @error('year') <p class="{{ $err }}">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="{{ $lbl }}">Jumlah Stok</label>
                <input type="number" name="stock" value="{{ old('stock', $book?->stock ?? 1) }}" min="0" class="{{ $inp }}">
                @error('stock') <p class="{{ $err }}">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="grid sm:grid-cols-2 gap-4 p-4 rounded-2xl bg-pink-50 border border-pink-100">
            <div>
                <label class="{{ $lbl }}">Kategori</label>
                <select name="category_id" class="{{ $inp }}">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($categories as $c)
                        <option value="{{ $c->id }}" @selected(old('category_id', $book?->category_id) == $c->id)>{{ $c->name }}</option>
                    @endforeach
                </select>
                @error('category_id') <p class="{{ $err }}">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="{{ $lbl }}">Atau buat kategori baru ✨</label>
                <input type="text" name="new_category" value="{{ old('new_category') }}" placeholder="Contoh: Komik" class="{{ $inp }}">
                <p class="text-xs text-pink-400 mt-1">Kosongkan jika memakai kategori yang sudah ada.</p>
                @error('new_category') <p class="{{ $err }}">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="flex flex-wrap gap-2 pt-2">
            <button type="submit" class="px-6 py-2.5 bg-pink-500 hover:bg-pink-400 text-white font-semibold rounded-full shadow-sm transition">Simpan</button>
            @unless ($book)
                <button type="submit" name="again" value="1" class="px-6 py-2.5 bg-white border border-pink-300 text-pink-600 hover:bg-pink-50 font-semibold rounded-full transition">Simpan & Tambah Lagi</button>
            @endunless
            <a href="{{ route('books.index') }}" class="px-6 py-2.5 bg-pink-100 hover:bg-pink-200 text-pink-700 rounded-full transition">Batal</a>
        </div>
    </div>

    <div class="lg:sticky lg:top-24 self-start">
        <p class="{{ $lbl }} mb-2">Pratinjau Buku</p>
        <div class="rounded-2xl p-6 text-white shadow-lg min-h-[220px] flex flex-col justify-between"
             style="background:linear-gradient(135deg,#f9a8d4 0%,#f472b6 55%,#fb7185 100%);">
            <div class="text-6xl font-bold opacity-90" x-text="(title || '?').charAt(0).toUpperCase()"></div>
            <div>
                <div class="text-lg font-semibold leading-snug" x-text="title || 'Judul buku'"></div>
                <div class="text-sm text-pink-50" x-text="author || 'Nama penulis'"></div>
                <div class="mt-2 text-xs text-pink-50" x-text="year ? 'Terbit ' + year : ''"></div>
            </div>
        </div>
    </div>
</div>