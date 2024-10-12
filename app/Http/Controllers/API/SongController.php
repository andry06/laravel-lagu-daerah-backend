<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateFolkSongRequest;
use App\Http\Requests\UpdateFolkSongRequest;
use App\Models\FolkSong;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index()
    {
        $folkSong = FolkSong::paginate(10);

        return response()->json([
            'status' => 'success',
            'data' => $folkSong
        ]);
    }


    public function create(CreateFolkSongRequest $request)
    {
        $folkSong = FolkSong::create($request->validated());

        return response()->json([
            'status' => 'success',
            'data' => $folkSong
        ], 201);
    }

    public function update(UpdateFolkSongRequest $request, FolkSong $folkSong)
    {
        $folkSong->update($request->validated());

        return response()->json([
            'status' => 'success',
            'data' => $folkSong
        ], 200);
    }

    public function delete(FolkSong $folkSong)
    {
        $folkSong->delete();

        return response()->json([
            'status' => 'success',
            'data' => null
        ], 204);
    }
}
