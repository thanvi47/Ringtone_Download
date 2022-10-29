@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('All Photos') }}
                    <span class="float-end"><a href="{{route('photos.create')}}"><button
                                class="btn btn-outline-secondary">Upload Photos</button></a></span>

                </div>
                <div class="card-body">
              <table class="table table-striped">
                 <thead>
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">Title</th>
                          <th scope="col">Description</th>

                          <th scope="col">File</th>
                          <th scope="col">Format</th>
                          <th scope="col">Size</th>
                          <th scope="col">Edit</th>
                          <th scope="col">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($photos as $key=> $photo)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$photo->title}}</td>
                            <td>{{$photo->description}}</td>

                            <td>
                              <img src="{{asset('uploads/'.$photo->file)}}" alt="" width="100" >
                            </td>

                            <td>{{$photo->format}}</td>
                            <td>{{$photo->size/1000}}Kb</td>
                            <td>
                                <a href="{{route('photos.edit',$photo->id)}}" class="btn btn-outline-primary">Edit</a>
</td>
                            <td>
                                    <form action="{{route('photos.destroy',$photo->id)}}" method="post" onSubmit="return confirm('Do you Want to delete?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                                    </form>


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
    <script type="text/javascript">
        function pauseOthers(element) {

           $ ("audio").not(element).each(function(index, audio) {
              audio.pause() ;
           })

        }
    </script>

