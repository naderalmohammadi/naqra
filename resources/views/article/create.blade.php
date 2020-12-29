@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">{{trans('main.create')}}</div>
                    <div class="card-body">
                        <form action="/article" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="title">{{trans('main.title')}}</label>
                            <input type="text" class="form-control {{ $errors->has('title') ? 'border-danger' : "" }}" id="title"
                            name="title" value="{{old('title')}}">
                            <small class="form-text text-danger">{!! $errors->first('title') !!}</small>
                        </div>
                        <div class="form-group">
                            <label for="content">{{trans('main.content')}}</label>
                            <textarea class="form-control {{ $errors->has('content') ? 'border-danger' : "" }}" id="content"
                                name="content" rows="5">{{old('content')}}</textarea>
                            <small class="form-text text-danger">{!! $errors->first('content') !!}</small>
                        </div>
                            <input class="btn btn-primary mt-4" type="submit" value="Save Article">
                        </form>
                        <a class="btn btn-primary float-right" href="/article"><i class="fas fa-arrow-circle-up"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
