<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function wallpaper()
    {
        $wallpapers = Photo::all();
        return view('wallpaper', compact('wallpapers'));


    }   public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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


    public function download1920x1080($id)
    {
        $photo = Photo::find($id);
        $file = public_path()."/uploads/".$photo->file;
        $headers = array('Content-Type: application/pdf',);
        return response()->download($file, 'Wallpaper1920x1080.jpg', $headers);
    }
    public function download1280x1024($id)
    {
        $photo = Photo::find($id);
        $file = public_path()."/uploads/1280x1024/".$photo->file;
        $headers = array('Content-Type: application/pdf',);
        return response()->download($file, 'Wallpaper1280x1024.jpg', $headers);
    }
    public function download316x255($id)
    {
        $photo = Photo::find($id);
        $file = public_path()."/uploads/316x255/".$photo->file;
        $headers = array('Content-Type: application/pdf',);
        return response()->download($file, 'Wallpaper316x255.jpg', $headers);
    }
    public function download118x95($id)
    {
        $photo = Photo::find($id);
        $file = public_path()."/uploads/128x95/".$photo->file;
        $headers = array('Content-Type: application/pdf',);
        return response()->download($file, 'Wallpaper118x95.jpg', $headers);
    }




}
