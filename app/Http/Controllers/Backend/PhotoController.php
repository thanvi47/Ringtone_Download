<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.photo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'image'=>'required',

        ]);
      $image=$request->file('image');
      $filename=$image->hashName();
      $format=$request->image->getClientOriginalExtension();
      $path='uploads/'.$filename;
      $path1='uploads/1280x1024/'.$filename;
      $path2='uploads/316x255/'.$filename;
      $path3='uploads/128x95/'.$filename;
      Image::make($image->getRealPath())->resize(1920,1080)->save($path);
      Image::make($image->getRealPath())->resize(1280,1024)->save($path1);
        Image::make($image->getRealPath())->resize(316,255)->save($path2);
        Image::make($image->getRealPath())->resize(128,95)->save($path3);
        $photo=new Photo();
        $photo->title=$request->title;
        $photo->description=$request->description;
        $photo->file=$filename;
        $photo->format=$format;
        $photo->size=$request->image->getSize();
        $photo->save();
        return redirect()->back()->with('message','Photo has been uploaded successfully');


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
}
