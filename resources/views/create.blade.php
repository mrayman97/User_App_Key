@extends('layouts.app')

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div align="right">
        <a href="{{ route('applications.index') }}" class="btn btn-default">{{__('pagination.previous')}}</a>
    </div>

    <form method="post" action="{{ route('applications.store') }}" enctype="multipart/form-data">

        @csrf
        <div class="form-group">
            <label class="col-md-4 text-right">{{__('crud.select_app_id')}}</label>
            <div class="col-md-8">
                <input type="text" name="app_id" class="form-control input-lg" />
            </div>
        </div>
        <br />
        <br />
        <div class="form-group">
            <label class="col-md-4 text-right">{{__('crud.enter_manager_name')}}</label>
            <div class="col-md-8">
                <input type="text" name="manager" class="form-control input-lg" value="{{ $manager }}"/>
            </div>
        </div>
        <br />
        <br />
        <div class="form-group">
            <label class="col-md-4 text-right">{{__('crud.enter_name_app')}}</label>
            <div class="col-md-8">
                <input type="text" name="name" class="form-control input-lg" />
            </div>
        </div>
        <br />
        <br />
        <div class="form-group">
            <label class="col-md-4 text-right">{{__('crud.enter_description')}}</label>
            <div class="col-md-8">
                <input type="text" name="description" class="form-control input-lg" />
            </div>
        </div>
        <br />
        <br />
        <div class="form-group">
            <label class="col-md-4 text-right">{{__('crud.select_logo')}}</label>
            <div class="col-md-8">
                <input type="file" name="logo" />
            </div>
        </div>
        <br /><br />
        <div class="form-group text-center">
            <input type="submit" name="add" class="btn btn-primary input-lg" value="{{__('index.create')}}" />
        </div>

    </form>

@endsection

