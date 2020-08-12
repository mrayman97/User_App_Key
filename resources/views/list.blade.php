@extends('layouts.app')

@section('content')

    <div class="jumbotron text-center">
        <div align="right">
            <a href="{{ route('applications.index') }}" class="btn btn-default">{{__('pagination.previous')}}</a>
        </div>
        <br />
        <img src="{{ asset($data->logo) }}" class="img-thumbnail" style="width: 15%; height: 15%"/>
        <h3>{{ __('index.app_id') }} - {{ $data->app_id }} </h3>
        <h3>{{ __('index.manager_name') }} - {{ $data->manager }}</h3>
        <h3>{{ __('index.app_name') }} - {{ $data->name }}</h3>
        <h3>{{ __('index.description') }} - {{ $data->description }}</h3>
        <h3>{{ __('index.created_at') }} - {{ $data->created_at }}</h3>
        <h3>{{ __('index.updated_at') }} - {{ $data->updated_at }}</h3>
    </div>
@endsection
