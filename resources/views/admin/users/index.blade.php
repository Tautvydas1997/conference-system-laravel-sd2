@extends('layouts.app')

@section('title', __('users.list'))

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>{{ __('users.list') }}</h1>
            <div>
                <a href="{{ route('admin.index') }}" class="btn btn-secondary">
                    {{ __('common.admin_panel') }}
                </a>
            </div>
        </div>

        @if($users->isEmpty())
            <div class="alert alert-info">
                {{ __('users.no_users') }}
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('users.first_name') }}</th>
                            <th>{{ __('users.last_name') }}</th>
                            <th>{{ __('users.email') }}</th>
                            <th>{{ __('users.role') }}</th>
                            <th>{{ __('common.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->isClient())
                                        <span class="badge bg-primary">{{ __('users.client') }}</span>
                                    @elseif($user->isEmployee())
                                        <span class="badge bg-success">{{ __('users.employee') }}</span>
                                    @elseif($user->isAdmin())
                                        <span class="badge bg-warning">{{ __('users.admin') }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">
                                        {{ __('users.edit_action') }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection

