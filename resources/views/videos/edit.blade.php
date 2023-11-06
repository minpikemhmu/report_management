@extends('template')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <h6 style="font-weight: bold;color:black">Video Management</h6>
            <a href="{{ route('videos.index') }}" class="btn btn-sm btn-dark"><i class="fa-solid fa-arrow-left-long"></i>
                back</a>
        </div>
        <div class="card mx-auto mb-5 mt-3">
            <div class="row m-3">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <span class="">Edit Existing Video</span>
                    <form method="POST" action="{{ route('videos.update', $video->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input name="title" type="text" class="form-control" id="title"
                                placeholder="Video Title" value="{{ $video->title }}">
                            <div class="form-control-feedback text-danger"> {{ $errors->first('title') }} </div>
                        </div>


                        <div class="form-group">
                            <label for="title">Description</label></br>
                            <textarea name="description" id="description" cols="100" rows="5" placeholder="Description">
                            {{ $video->description }}
                            </textarea>
                            <div class="form-control-feedback text-danger"> {{ $errors->first('description') }} </div>
                        </div>

                        <div class="form-group">
                            <label for="link">Link</label>
                            <input name="link" type="text" class="form-control" id="link"
                                placeholder="Video Link" value="{{$video->link}}">
                            <div class="form-control-feedback text-danger"> {{ $errors->first('link') }} </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>

                </div>
            </div>
        </div>
    </div>
@endsection
