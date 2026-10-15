<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\BookService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct(
        private BookService $bookService
    ) {}

    public function index()
    {
        return response()->json($this->bookService->listAll());
    }

    public function store(Request $request)
    {
        $book = $this->bookService->create($request->all());

        return response()->json($book, 201);
    }

    public function show(int $id)
    {
        return response()->json($this->bookService->findById($id));
    }

    public function update(Request $request, int $id)
    {
        $book = $this->bookService->update($id, $request->all());

        return response()->json($book);
    }

    public function destroy(int $id)
    {
        $this->bookService->delete($id);

        return response()->noContent();
    }
}