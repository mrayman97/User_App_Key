@extends('layouts.app')

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
                    <div class="card-header">{{ __('index.list_of_user_app_keys') }}</div>
                    <div>
                        <a href="{{ route('userappkeys.create') }}" class="btn btn-success btn-sm">{{ __('index.create') }}</a>
                        <br>
                        <form action="{{ route('importUserAppKeys') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file" class="form-control">
                            <button class="btn btn-success">{{ __('index.import_user_app_keys_data') }}</button>
                            <a class="btn btn-warning" href="{{ route('exportUserAppKeys') }}">{{ __('index.export_user_app_keys_data') }}</a>
                        </form>
                    </div>

                    <table class="table table-bordered table-striped">
                        <tr>
                            <th width="10%">{{ __('index.app_id') }}</th>
                            <th width="10%">{{ __('index.email') }}</th>
                            <th width="10%">{{ __('index.key') }}</th>
                            <th width="20%">{{ __('index.type') }}</th>
                            <th width="15%">{{ __('index.created_at') }}</th>
                            <th width="15%">{{ __('index.updated_at') }}</th>
                            <th width="20%">{{ __('index.method') }}</th>
                        </tr>

                        @foreach($users as $row)
                            <tr>
                                <td>{{ $row->app_id }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->key }}</td>
                                <td>{{ $row->type }}</td>
                                <td>{{ $row->created_at }}</td>
                                <td>{{ $row->updated_at }}</td>
                                <td>
                                    <a href="{{ route('userappkeys.show', $row->key) }}" class="btn btn-primary">{{__('index.show')}}</a>
                                    <a href="{{ route('userappkeys.edit',$row->key) }}" class="btn btn-warning">{{__('index.edit')}}</a>
                                    <form action="{{ route('userappkeys.destroy',$row->key) }}" method="post">
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
