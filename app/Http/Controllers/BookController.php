<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private function rules(): array
    {
        return [
            'category_id'  => 'nullable|required_without:new_category|exists:categories,id',
            'new_category' => 'nullable|string|max:100',
            'title'        => 'required|string|max:255',
            'author'       => 'required|string|max:255',
            'publisher'    => 'required|string|max:255',
            'year'         => 'required|integer|min:1900|max:' . date('Y'),
            'stock'        => 'required|integer|min:0',
        ];
    }

    private function payload(Request $request): array
    {
        $data = $request->validate($this->rules());

        if (!empty($data['new_category'])) {
            $category = Category::firstOrCreate(['name' => trim($data['new_category'])]);
            $data['category_id'] = $category->id;
        }

        unset($data['new_category']);

        return $data;
    }

    public function index(Request $request)
    {
        $books = Book::with('category')
            ->when($request->search, function ($q, $s) {
                $q->where(function ($q) use ($s) {
                    $q->where('title', 'like', "%$s%")
                      ->orWhere('author', 'like', "%$s%");
                });
            })
            ->when($request->category_id, fn ($q, $c) => $q->where('category_id', $c))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $categories = Category::all();

        return view('books.index', compact('books', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        Book::create($this->payload($request));

        if ($request->has('again')) {
            return redirect()->route('books.create')
                ->with('success', 'Buku berhasil ditambahkan. Silakan tambah buku lainnya.');
        }

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function show(Book $book)
    {
        $book->load('category');

        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $categories = Category::all();

        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $book->update($this->payload($request));

        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus.');
    }
}