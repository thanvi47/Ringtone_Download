@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach($wallpapers as $wallpaper)
            <div class="col-md-8 mt-4">

                    <div class="card">
                        <div class="card-header">{{ $wallpaper->title }}</div>

                        <div class="card-body">
                            <p>{{$wallpaper->description}}</p>
                            <img src="/uploads/{{$wallpaper->file}}" alt="" class="img-thumbnail">
                        </div>
                    </div>
            </div>
                <div class="col-md-3 mt-4">
                    <form action="{{route('download1',$wallpaper->id)}}" method="post" class="form-control mb-2">@csrf
                        <button class="btn btn-outline-primary">
                            Download 1920x1080
                        </button>
                    </form>
                    <form action="{{route('download2',$wallpaper->id)}}" method="post" class="form-control mb-2">@csrf
                        <button class="btn btn-outline-primary">
                            Download 1280x1024
                        </button>
                    </form>
                    <form action="{{route('download3',$wallpaper->id)}}" method="post" class="form-control mb-2">@csrf
                        <button class="btn btn-outline-primary">
                            Download 316x255
                        </button>
                    </form>
                    <form action="{{route('download4',$wallpaper->id)}}" method="post" class="form-control mb-2 ">@csrf
                        <button class="btn btn-outline-primary">
                            Download 128x95
                        </button>
                    </form>
                </div>
        @endforeach

        </div>

    </div>
@endsection
