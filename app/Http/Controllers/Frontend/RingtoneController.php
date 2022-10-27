<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Ringtone;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

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
       return view('welcome', compact('ringtones'));
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
    public function show($id,$slug)
    {
$ringtone = Ringtone::where('id',$id)->where('slug',$slug)->first();
return view('show',compact('ringtone'));
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
    public function downloadRingtone($id){
        $ringtone=Ringtone::findOrFail($id);
        $ringtonePath=$ringtone->file;
        $filePath=public_path('audio/').$ringtonePath;
        $ringtone->increment('download');
        $ringtone->save();
        return Response::download($filePath);

    }
    public function category($id){
$ringtones=Ringtone::where('category_id',$id)->get();

return view('ringtone-category',compact('ringtones'));
    }
}
