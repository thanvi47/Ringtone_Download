@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(Session::has('message'))
                    <div class="alert alert-success">{{Session::get('message')}}</div>
                @endif
                <div class="card">
                    <div class="card-header">{{ __('Update Ringtone') }}</div>
                    <div class="card-body">
                        <form action="{{route('ringtones.update',[$ringtone->id])}}" method="post"
                              enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div class="form-group">
                                <label for="name">Tile</label>
                                <input type="text" class="form-control @error('title')is-invalid @enderror "
                                       name="title" value="{{$ringtone->title}}">
                                @error('title')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Description</label>
                                <input type="text" class="form-control @error('description')is-invalid @enderror"
                                       name="description" value="{{$ringtone->description}}">
                                @error('description')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label for="name">File</label>
                                <input type="file" class="form-control @error('file')is-invalid @enderror" name="file"
                                       accept="audio/*">
                                @error('file')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Category</label>
                                <select class="form-control @error('category')is-invalid @enderror" name="category">
                                    <option value="">Select Category</option>
                                    @foreach(App\Models\Category::all() as $category)
                                        <option @if($ringtone->category_id==$category->id) selected
                                                @endif value="{{$category->id}}">{{$category->name}}</option>

                                    @endforeach
                                </select>
                                @error('category')<span class="text-danger">{{$message}}</span>@enderror

                            </div>
                            <br>
                            <div class="form-group">
                                <button class="btn btn-outline-primary" type="submit">Submit</button>


                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
