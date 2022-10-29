@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(Session::has('message'))
                    <div class="alert alert-success">{{Session::get('message')}}</div>
                @endif
                <div class="card">
                    <div class="card-header">{{ __('Upload Photo') }}</div>
                    <div class="card-body">
                    <form action="{{route('photos.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tile</label>
                            <input type="text" class="form-control @error('title')is-invalid @enderror " name="title">
                            @error('title')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Description</label>
                            <input type="text" class="form-control @error('description')is-invalid @enderror" name="description">
@error('description')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Image</label>
                            <input type="file" class="form-control @error('image')is-invalid @enderror" name="image" accept="image/*" >
                            @error('image')<span class="text-danger">{{$message}}</span>@enderror
                        </div>

                        <br>
                        <div class="form-group">
                            <button class="btn btn-outline-primary" type="submit">Submit </button>


                        </div>
                    </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
