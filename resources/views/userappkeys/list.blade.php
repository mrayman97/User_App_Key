@extends('layouts.app')

@section('content')

    <div class="jumbotron text-center">
        <div align="right">
            <a class="btn btn-default" href="{{ route('userappkeys.index') }}">{{__('pagination.previous')}}</a>
        </div>
        <br />
        <h3>{{ __('index.key') }} - {{ $users->key }} </h3>
        <h3>{{ __('index.app_id') }} - {{ $users->app_id }}</h3>
        <h3>{{ __('index.email') }} - {{ $users->email }}</h3>
        <h3>{{ __('index.type') }} - {{ $users->type }}</h3>
        <h3>{{ __('index.created_at') }} - {{ $users->created_at }}</h3>
        <h3>{{ __('index.updated_at') }} - {{ $users->updated_at }}</h3>
    </div>
@endsection
