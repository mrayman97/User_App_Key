{{--@extends('layout')--}}
@extends('layouts.app')

{{--@section('main')--}}
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p> {{ $message }} </p>
                        </div>
                    @endif
                    <div class="card-header">{{ __('index.list_of_applications') }}</div>
                    <div>
                        <a href="{{ route('applications.create') }}" class="btn btn-success btn-sm">{{ __('index.create') }}</a>
                        <br>
                        <form action="{{ route('importApplication') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file" class="form-control">
                            <button class="btn btn-success">{{ __('index.import_application_data') }}</button>
                            <a class="btn btn-warning" href="{{ route('exportApplication') }}">{{ __('index.export_application_data') }}</a>
                        </form>
                    </div>

                    <table class="table table-bordered table-striped">
                        <tr>
                            <th width="10%">{{ __('index.logo') }}</th>
                            <th width="10%">{{ __('index.app_id') }}</th>
                            <th width="10%">{{ __('index.app_name') }}</th>
                            <th width="10%">{{ __('index.manager_name') }}</th>
                            <th width="15%">{{ __('index.description') }}</th>
                            <th width="15%">{{ __('index.created_at') }}</th>
                            <th width="15%">{{ __('index.updated_at') }}</th>
                            <th width="15%">{{ __('index.method') }}</th>
                        </tr>

                        @foreach($data as $row)
                            <tr>
                                <td><img src="{{ asset($row->logo) }}" class="img-thumbnail" width="75" /></td>
                                <td>{{ $row->app_id }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->manager }}</td>
                                <td>{{ $row->description }}</td>
                                <td>{{ $row->created_at }}</td>
                                <td>{{ $row->updated_at }}</td>
                                <td>
                                    <a href="{{ route('applications.show', $row->app_id) }}" class="btn btn-primary">{{__('index.show')}}</a>
                                    <a href="{{ route('applications.edit',$row->app_id) }}" class="btn btn-warning">{{__('index.edit')}}</a>
                                    <form action="{{ route('applications.destroy',$row->app_id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">{{__('index.delete')}}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection