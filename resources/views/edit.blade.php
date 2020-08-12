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
        <a href="{{ route('applications.index') }}" class="btn btn-default">{{__('pagination.previous')}}</a>
    </div>

    <form method="post" action="{{ route('applications.update',$data->app_id) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label class="col-md-4 text-right">{{__('crud.select_app_id')}}</label>
            <div class="col-md-8">
                <input type="text" name="app_id" value="{{ $data->app_id }}" class="form-control input-lg" />
            </div>
        </div>
        <br />
        <br />
        <div class="form-group">
            <label class="col-md-4 text-right">{{__('crud.enter_manager_name')}}</label>
            <div class="col-md-8">
                <input type="text" name="manager" class="form-control input-lg" value="{{ $data->manager }}" disabled/>
            </div>
        </div>
        <br />
        <br />
        <div class="form-group">
            <label class="col-md-4 text-right">{{__('crud.enter_name_app')}}</label>
            <div class="col-md-8">
                <input type="text" name="name" value="{{ $data->name }}" class="form-control input-lg" />
            </div>
        </div>
        <br />
        <br />
        <div class="form-group">
            <label class="col-md-4 text-right">{{__('crud.enter_description')}}</label>
            <div class="col-md-8">
                <input type="text" name="description" value="{{ $data->description }}" class="form-control input-lg" />
            </div>
        </div>
        <br />
        <br />
        <div class="form-group">
            <label class="col-md-4 text-right">{{__('crud.select_logo')}}</label>
            <input type="file" name="logo">
        </div>
        <br /><br />
        <div class="form-group text-center">
            <input type="submit" name="edit" class="btn btn-primary input-lg" value="{{__('index.edit')}}" />
        </div>
    </form>

@endsection