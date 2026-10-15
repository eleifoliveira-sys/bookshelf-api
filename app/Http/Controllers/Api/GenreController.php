<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\GenreService;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function __construct(
        private GenreService $genreService
    ) {}

    public function index()
    {
        return response()->json($this->genreService->listAll());
    }

    public function store(Request $request)
    {
        $genre = $this->genreService->create($request->all());

        return response()->json($genre, 201);
    }

    public function show(int $id)
    {
        return response()->json($this->genreService->findById($id));
    }

    public function update(Request $request, int $id)
    {
        $genre = $this->genreService->update($id, $request->all());

        return response()->json($genre);
    }

    public function destroy(int $id)
    {
        $this->genreService->delete($id);

        return response()->noContent();
    }
}