@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>My Gallery</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            @if ($galleries->count() > 0)
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr class="table-info">
                            <th>Name of the gallery</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($galleries as $gallery)
                            <tr>
                                <td>{{$gallery->name}}</td>
                                <td><a href="{{url('gallery/view/' . $gallery->id)}}">view</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <div class="col-md-4">
            @if (count($errors)>0)
               <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div> 
            @endif
            <form class="form" action="{{url('gallery/save')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                  <input type="text" name="gallery_name" id="gallery_name" class="form-control" placeholder="Name of the gallery" aria-describedby="helpId" value="{{old('gallery_name')}}">
                </div>
                <button class="btn btn-raised btn-primary">save</button>
            </form>
        </div>
    </div>

@endsection