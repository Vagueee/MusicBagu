<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Music;


class MusicController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $musics = Music::all();
        return view('dashboard', compact('musics'));
    }

    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'lyrics' => 'required',
            'audio' => 'nullable',
            'audio.*' => 'audio|mimes:3gp,mp3,mp4',

        ]);

        $imageName = time(). '.' . $request->audio->extension();
        $request->audio->move(public_path('storage/audio'), $imageName);
        $music = music::create([
            'title' => $request->title,
            'artist' => $request->artist,
            'lyrics' => $request->lyrics,
            'audio' => $imageName
        ]);

        return redirect('/dashboard')->with('success', ' Data berhasil dibuat');
    }

    public function show($id)
    {
        $music = music::find($id);
        return view('detail', ["music" => $music]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $music = music::findOrfail($id);
        return view('edit', ['music' => $music]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'lyrics' => 'required',
            'audio' => 'nullable',
            'audio.*' => 'audio|mimes:3gp,mp3,mp4',

        ]);

        $imageName = time(). '.' . $request->audio->extension();
        $request->audio->move(public_path('storage/audio'), $imageName);
        $music = music::find($id)->update([
            'title' => $request->title,
            'artist' => $request->artist,
            'lyrics' => $request->lyrics,
            'audio' => $imageName
        ]);

        return redirect('/dashboard')->with('success', 'Data telah diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $music = music::find($id);

        $music->delete();

        return redirect('/dashboard')->with('success', 'Data telah dihapus');
    }

}