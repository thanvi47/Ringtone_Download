@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Ringtone') }}</div>
                    <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Tile</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label for="name">Description</label>
                            <input type="text" class="form-control" name="description">

                        </div>
                        <div class="form-group">
                            <label for="name">File</label>
                            <input type="file" class="form-control" name="file">

                        </div>
                        <div class="form-group">
                            <label for="name">Category</label>
                            <select  class="form-control" name="category">
                                @foreach(App\Models\Category::all() as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                               @endforeach
                            </select>

                        </div>
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
