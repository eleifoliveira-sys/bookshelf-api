<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        return response()->json(Genre::all());
    }

    public function store(Request $request)
    {
        $genre = Genre::create($request->all());

        return response()->json($genre, 201);
    }

    public function show(int $id)
    {
        return response()->json(Genre::findOrFail($id));
    }

    public function update(Request $request, int $id)
    {
        $genre = Genre::findOrFail($id);
        $genre->update($request->all());

        return response()->json($genre);
    }

    public function destroy(int $id)
    {
        Genre::findOrFail($id)->delete();

        return response()->noContent();
    }
}