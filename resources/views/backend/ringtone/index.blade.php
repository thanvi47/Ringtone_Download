@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('All Ringtones') }}
                    <span class="float-end"><a href="{{route('ringtones.create')}}"><button class="btn btn-outline-secondary">Creat Ringtone</button></a></span>

                </div>
                <div class="card-body">
              <table class="table table-striped">
                 <thead>
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">Title</th>
                          <th scope="col">Description</th>
                          <th scope="col">Category</th>
                          <th scope="col">Total Download</th>
                          <th scope="col">File</th>
                          <th scope="col">Format</th>
                          <th scope="col">Size</th>
                          <th scope="col">Edit</th>
                          <th scope="col">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($ringtones as $key=> $ringtone)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$ringtone->title}}</td>
                            <td>{{$ringtone->description}}</td>
                            <td>{{$ringtone->category->name}}</td>
                            <td><audio controls onplay="pauseOthers()">
                                <source src="{{asset('/audio/'.$ringtone->file)}}" type="audio/mpeg">
                                </audio>
                            </td>
                            <td>{{$ringtone->size/1000}}Kb</td>
                            <td>{{$ringtone->format}}</td>
                            <td>
                                <a href="{{route('ringtones.edit',$ringtone->id)}}" class="btn btn-outline-primary">Edit</a>
</td>
                            <td>
                                    <form action="{{route('ringtones.destroy',$ringtone->id)}}" method="post" onSubmit="return confirm('Do you Want to delete?')">
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
           $("audio").not(element).each(function(index, audio) {
              audio.pause() ;
           })

        }
    </script>

