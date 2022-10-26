@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($ringtones as $ringtone)
                <div class="card mt-5">
                    <div class="card-header">{{$ringtone->title }}</div>

                    <div class="card-body">
                        <audio controls onplay="pauseOthers()" controlsList="nodownload">
                            <source src="{{asset('/audio/'.$ringtone->file)}}" type="audio/mpeg">
                        </audio>
                    </div>
                    <div class="card-footer">
                        <a href="" class="text-decoration-none ">Info and Download Ringtone</a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-4 mt-5 card">
                <div class="card-header">
                    Categories
                </div>
                @foreach(\App\Models\Category::all() as $category)
                <div class="card-header bg-opacity-75">
                    <a href="" class="text-decoration-none ">   {{$category->name}}</a>
                </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
