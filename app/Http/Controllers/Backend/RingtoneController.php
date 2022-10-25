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
        $ringtones = Ringtone::all();
        return view('backend.ringtone.index', compact('ringtones'));
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
        $ringtones->file = $fileName;
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
$ringtone=Ringtone::find($id);
return view('backend.ringtone.edit',compact('ringtone'));

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
            'category' => 'required',
        ]);

   $ringtone=Ringtone::find($id);
   $fileName=$ringtone->file;
   $format=$ringtone->format;
   $size=$ringtone->size;
   $download=$ringtone->download;
    if($request->hasFile('file')){
        $fileName=$request->file->hashName();
        $format=$request->file->getClientOriginalExtension();
        $size=$request->file->getSize();
        $request->file->move(public_path('audio'),$fileName);
            unlink(public_path('audio/'.$ringtone->file));
            $downdload=0;


    }
        $ringtone->title = $request->title;
        $ringtone->description = $request->description;

        $ringtone->file = $fileName;
        $ringtone->format = $format;
        $ringtone->size = $size;
        $ringtone->download=$download;
        $ringtone->category_id = $request->category;
        $ringtone->save();
        return redirect()->back()->with('message','Ringtone updated successfully');

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
