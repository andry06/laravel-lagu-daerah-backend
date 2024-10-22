<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateFolkSongRequest;
use App\Http\Requests\UpdateFolkSongRequest;
use App\Models\FolkSong;

class SongController extends Controller
{
    public function index()
    {
        $folkSongs = FolkSong::paginate(10);
        info($folkSongs);
        return response()->json([
            'status' => 'success',
            'data' => $folkSongs,
        ]);
    }

    public function create(CreateFolkSongRequest $request)
    {

        $request->validated();

        $folkSong = FolkSong::create($request->validated());

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $fileName = time().'.'.$request->image->extension();
            $image->storeAs('images', $fileName);
            $folkSong->update([
                'image_url' => $fileName,
            ]);
        }

        return response()->json([
            'status' => 'success',
            'data' => $folkSong,
        ], 201);
    }

    public function update(UpdateFolkSongRequest $request, FolkSong $folkSong)
    {
        $folkSong->update($request->validated());

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $fileName = time().'.'.$request->image->extension();
            $image->storeAs('images', $fileName);
            $folkSong->update([
                'image_url' => $fileName,
            ]);
        }

        return response()->json([
            'status' => 'success',
            'data' => $folkSong,
        ], 200);
    }

    public function delete(FolkSong $folkSong)
    {
        $folkSong->delete();

        return response()->json([
            'status' => 'success',
            'data' => null,
        ], 204);
    }
}
