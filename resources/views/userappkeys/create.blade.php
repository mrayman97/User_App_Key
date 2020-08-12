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
        <a href="{{ route('userappkeys.index') }}" class="btn btn-default">{{__('pagination.previous')}}</a>
    </div>

    <form method="post" action="{{ route('userappkeys.store') }}" enctype="multipart/form-data">

        @csrf
        <div class="form-group">
            <label class="col-md-4 text-right">{{__('crud.enter_key')}}</label>
            <div class="col-md-8">
                <input type="text" name="key" class="form-control input-lg" />
            </div>
        </div>
        <br />
        <br />
        <div class="form-group">
            <label class="col-md-4 text-right">{{__('crud.enter_email')}}</label>
            <div class="col-md-8">
                <input type="text" name="email" class="form-control input-lg" />
            </div>
        </div>
        <br />
        <br />
        <div class="form-group">
            <label class="col-md-4 text-right">{{__('crud.select_type')}}</label>
            <select name="type" id="type">
                <option value="" disabled>Select Type</option>
{{--                <option value="{{ $enumInstance0->key }}">{{ $enumInstance0->key }}</option>--}}
{{--                <option value="{{ $enumInstance1->key }}">{{ $enumInstance1->key }}</option>--}}
{{--                <option value="{{ $enumInstance2->key }}">{{ $enumInstance2->key }}</option>--}}
                <option value="{{ $enum[0] }}">{{ $enum[0] }}</option>
                <option value="{{ $enum[1] }}">{{ $enum[1] }}</option>
                <option value="{{ $enum[2] }}">{{ $enum[2] }}</option>
            </select>
        </div>
        <br />
        <br />
        <div class="form-group">
            <label class="col-md-4 text-right">{{__('crud.select_app_id')}}</label>
            <select name="app_id" class="form-control input-lg">
                @foreach($eloqapplications as $eloqapplication)
                    <option value="{{ $eloqapplication->app_id }}">{{ $eloqapplication->name }}</option>
                @endforeach
            </select>
        </div>
        <br />
        <br />
        <div class="form-group text-center">
            <input type="submit" name="add" class="btn btn-primary input-lg" value="{{__('index.create')}}" />
        </div>

    </form>

@endsection

