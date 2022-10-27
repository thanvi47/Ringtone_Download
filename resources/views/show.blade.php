@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header">{{$ringtone->title }}</div>

                <div class="card-body">
                    <audio controls onplay="pauseOthers()" controlsList="nodownload">
                        <source src="{{asset('/audio/'.$ringtone->file)}}" type="audio/mpeg">
                    </audio>
                </div>
                <div class="card-footer">
                    <form action="{{route('ringtones.download',$ringtone->id)}}" method="post">
                        @csrf
                    <button class="btn btn-outline-secondary" type="submit">Download</button>
                    </form>
                </div>
            </div>
            <table class="table mt-4">
                <tr>
                    <th>Name</th>
                    <td>{{$ringtone->title}}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{$ringtone->description}}</td>
                </tr>
                <tr>
                    <th>Format</th>
                    <td>{{$ringtone->format}}</td>
                </tr>
                <tr>
                    <th>Size</th>
                    <td>{{$ringtone->size/1000}}Kb</td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td>{{$ringtone->category->name}}</td>
                </tr>
                <tr>
                    <th>Download</th>
                    <td>{{$ringtone->download}}</td>
                </tr>
            </table>
        </div>
        <div class="col-md-4 mt-5 card">
            <div class="card-header">
                Categories
            </div>
            @foreach(\App\Models\Category::all() as $category)
                <div class="card-header bg-opacity-75">
                    <a href="{{url('category',$category->id)}}" class="text-decoration-none ">   {{$category->name}}</a>
                </div>
            @endforeach

        </div>
    </div>
</div>
@endsection
