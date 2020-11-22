@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{__('Edit article')}}</div>
                    <div class="card-body">
                    <form action='/article/{{$article->id}}' method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Title</label>
                            <input type="text" class="form-control {{ $errors->has('title') ? 'border-danger' : "" }}" id="title"
                             name="title" value="{{$article->title ?? old('title')}}">
                            <small class="form-text text-danger">{!! $errors->first('title') !!}</small>
                        </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea class="form-control {{ $errors->has('content') ? 'border-danger' : "" }}" id="content"
                                    name="content" rows="5">{{$article->content ?? old('content')}}</textarea>
                                <small class="form-text text-danger">{!! $errors->first('content') !!}</small>
                            </div>
                            <button class="btn btn-primary mt-4" type="submit"><i class="fas fa-edit"></i> Edit article</button>
                        </form>
                        <a class="btn btn-primary float-right" href="{{ URL::previous() }}"><i class="fas fa-arrow-circle-up"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
