@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('All Ringtones') }}
                    <span class="float-end"><a href="{{route('ringtones.create')}}"><button class="btn btn-outline-secondary">Creat Ringtone</button></a></span>

                </div>
                <div class="card-body">
              <table class="table table-striped">
                 <thead>
                      <tr>
                          <th scope="col">Title</th>
                          <th scope="col">Description</th>
                          <th scope="col">Category</th>
                          <th scope="col">Total Download</th>
                          <th scope="col">File</th>
{{--                          <th scope="col">Format</th>--}}
                          <th scope="col">Size</th>
                          <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($ringtones as $key=> $ringtone)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$ringtone->title}}</td>
                            <td>{{$ringtone->description}}</td>
                            <td>{{$ringtone->category_id}}</td>
                            <td><audio controls>
                                <source src="{{asset('/audio/'.$ringtone->file)}}" type="audio/mpeg">
                                </audio>
                            </td>
                            <td>{{$ringtone->size/1000}}Kb</td>
                            <td>
                                <a href="{{route('ringtones.edit',$ringtone->id)}}" class="btn btn-outline-primary">Edit</a>
                                <a href="{{route('ringtones.destroy',$ringtone->id)}}" class="btn btn-outline-danger my-1">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>






              </table>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
