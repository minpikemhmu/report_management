<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::paginate(15);
        return view('videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('videos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'link'        => 'required|string'
        ];
    
        $validatedData = $request->validate($rules);
    
        // If the data is validated successfully, you can proceed to store it
        Video::create([
            'title'       => $request->title,
            'description' => $request->description,
            'link'        => $request->link,
          ]);
    
        // Redirect or return a response, e.g., to a success page
        return redirect()->route('videos.index')->with("successMsg",'New Video was ADDED in your data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Video::Find($id);
        return view('videos.edit', compact('video'));
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
        $rules = [
            'title'     => 'string|max:255',
            'description' => 'string',
            'link'        => 'string'
        ];
    
        $validatedData = $request->validate($rules);
    
        // If the data is validated successfully, you can proceed to store it
        $video = Video::find($id);
        $video->update([
            'title'       => $request->title,
            'description' => $request->description,
            'link'        => $request->link,
          ]);
    
        // Redirect or return a response, e.g., to a success page
        return redirect()->route('videos.index')->with("successMsg",'New Video was ADDED in your data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
