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
       $photos=Photo::all();
         return view('backend.photo.index',compact('photos'));
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
        $photo=Photo::find($id);
        return view('backend.photo.edit',compact('photo'));

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
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',

        ]);
        $photo = Photo::find($id);
        $fileName = $photo->file;
        $format = $photo->format;
        $size = $photo->size;
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $newfilename = $image->hashName();
            $format = $request->image->getClientOriginalExtension();
            $size = $request->image->getSize();
            $path = 'uploads/' . $newfilename;
            $path1 = 'uploads/1280x1024/' . $newfilename;
            $path2 = 'uploads/316x255/' . $newfilename;
            $path3 = 'uploads/128x95/' . $newfilename;
            Image::make($image->getRealPath())->resize(1920, 1080)->save($path);
            Image::make($image->getRealPath())->resize(1280, 1024)->save($path1);
            Image::make($image->getRealPath())->resize(316, 255)->save($path2);
            Image::make($image->getRealPath())->resize(128, 95)->save($path3);
            unlink(public_path('uploads/' . $photo->file));
            unlink(public_path('uploads/1280x1024/' . $photo->file));
            unlink(public_path('uploads/316x255/' . $photo->file));
            unlink(public_path('uploads/128x95/' . $photo->file));
            $photo->title = $request->title;
            $photo->description = $request->description;

            $photo->file = $newfilename;
            $photo->format = $format;
            $photo->size = $size;


            $photo->save();
            return redirect()->back()->with('message', 'Photo updated successfully');
        } else{

            $photo->title = $request->title;
        $photo->description = $request->description;

        $photo->file = $fileName;
        $photo->format = $format;
        $photo->size = $size;


        $photo->save();
        return redirect()->back()->with('message', 'Photo updated successfully');


    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $photo=Photo::find($id);
    $photo->delete();
    unlink(public_path('uploads/'.$photo->file));
    unlink(public_path('uploads/1280x1024/'.$photo->file));
    unlink(public_path('uploads/316x255/'.$photo->file));
    unlink(public_path('uploads/128x95/'.$photo->file));
    return redirect()->back()->with('message','Photo has been deleted successfully');
    }
}
