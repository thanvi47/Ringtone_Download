<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Ringtone;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

class RingtoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('boo');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.ringtone.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'title' => 'required',
        'description' => 'required',
        'file' => 'required',
        'category' => 'required',
      ]);
      $fileName=$request->file->hashName();
      $format=$request->file->getClientOriginalExtension();
      $size=$request->file->getSize();
      $request->file->move(public_path('audio'),$fileName);

      $ringtones = new Ringtone();
        $ringtones->title = $request->title;
        $ringtones->description = $request->description;
        $ringtones->slug =Str::slug($request->title);
        $ringtones->file = $request->file;
        $ringtones->format = $format;
        $ringtones->size = $size;
        $ringtones->category_id = $request->category;
        $ringtones->save();
        return redirect()->back()->with('message','Ringtone added successfully');

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
