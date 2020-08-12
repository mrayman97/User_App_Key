@extends('layouts.app')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div align="right">
        <a href="{{ route('userappkeys.index') }}" class="btn btn-default">{{__('pagination.previous')}}</a>
    </div>
    <br />
    <form method="post" action="{{ route('userappkeys.update',$users->key) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label class="col-md-4 text-right">{{__('crud.enter_key')}}</label>
            <div class="col-md-8">
                <input type="text" name="key" value="{{ $users->key }}" class="form-control input-lg" />
            </div>
        </div>
        <br />
        <br />
        <div class="form-group">
            <label class="col-md-4 text-right">{{__('crud.enter_email')}}</label>
            <div class="col-md-8">
                <input type="text" name="email" value="{{ $users->email }}" class="form-control input-lg" />
            </div>
        </div>
        <br />
        <br />
        <div class="form-group">
            <label class="col-md-4 text-right">{{__('crud.select_type')}}</label>
            <select name="type" id="type">
                <option value="{{ $users->type }}">{{ $users->type }}</option>
                <option value="Admin">Admin</option>
                <option value="Read&Write">Read&Write</option>
                <option value="Read">Read</option>
            </select>
{{--            <div class="col-md-8">--}}
{{--                <input type="text" name="type" value="{{ $users->type }}" class="form-control input-lg" />--}}
{{--            </div>--}}
        </div>
        <br />
        <br />
        <div class="form-group">
            <label class="col-md-4 text-right">{{__('crud.select_app_id')}}</label>
            <select name="app_id" class="form-control input-lg">
                <option value="{{ $users->app_id }}">{{ $users->app_id }}</option>
                @foreach($eloqapplications as $eloqapplication)
                    <option value="{{ $eloqapplication->app_id }}">{{ $eloqapplication->name }}</option>
                @endforeach
            </select>
        </div>
        <br />
        <br />
        <div class="form-group text-center">
            <input type="submit" name="edit" class="btn btn-primary input-lg" value="{{__('index.edit')}}" />
        </div>
    </form>

@endsection