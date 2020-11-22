@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Articles') }}</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($articles as $article)
                            <li class="list-group-item">
                            <a title="Show Details" href='/article/{{$article->id}}'>{{ $article->title }}</a>
                            @auth
                            <a class="btn btn-sm btn-light ml-2" href='/article/{{$article->id}}/edit'><i class="fas fa-edit">
                            </i> {{trans('main.Edit article')}}</a>
                            <form class="float-right" style="display-inline" action='/article/{{$article->id}}' method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" type="submit"><i class="fas fa-trash"></i> {{trans('main.delete')}}</button>
                            </form>
                            @endauth
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="mt-2">
                {{ $articles->links() }}
            </div>

            @auth
            <div class="mt-2">
                <a href='/article/create'
                class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> Create a new hobby</a>
            </div>
            @endauth




        </div>
    </div>
</div>
@endsection
