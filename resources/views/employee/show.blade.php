@extends('layouts.app')

@section('title', __('conferences.show'))

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>{{ __('conferences.show') }}</h2>
                <a href="{{ route('employee.index') }}" class="btn btn-secondary btn-sm">
                    {{ __('conferences.back_to_list') }}
                </a>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-3">{{ __('conferences.name') }}:</dt>
                    <dd class="col-sm-9">{{ $conference->name }}</dd>

                    <dt class="col-sm-3">{{ __('conferences.description') }}:</dt>
                    <dd class="col-sm-9">{{ $conference->description }}</dd>

                    <dt class="col-sm-3">{{ __('conferences.lecturers') }}:</dt>
                    <dd class="col-sm-9">{{ $conference->lecturers }}</dd>

                    <dt class="col-sm-3">{{ __('conferences.date') }}:</dt>
                    <dd class="col-sm-9">{{ $conference->date }}</dd>

                    <dt class="col-sm-3">{{ __('conferences.time') }}:</dt>
                    <dd class="col-sm-9">{{ $conference->time }}</dd>

                    <dt class="col-sm-3">{{ __('conferences.address') }}:</dt>
                    <dd class="col-sm-9">{{ $conference->address }}</dd>

                    <dt class="col-sm-3">{{ __('conferences.status') }}:</dt>
                    <dd class="col-sm-9">
                        @if($conference->status === 'planned')
                            <span class="badge bg-success">{{ __('conferences.planned') }}</span>
                        @else
                            <span class="badge bg-secondary">{{ __('conferences.completed') }}</span>
                        @endif
                    </dd>
                </dl>

                <div class="mt-4">
                    <h4>Užsiregistravę klientai:</h4>
                    @if($registeredUsers->isEmpty())
                        <div class="alert alert-info">
                            Nėra užsiregistravusių klientų.
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>{{ __('users.first_name') }}</th>
                                        <th>{{ __('users.last_name') }}</th>
                                        <th>{{ __('users.email') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($registeredUsers as $user)
                                        <tr>
                                            <td>{{ $user->first_name }}</td>
                                            <td>{{ $user->last_name }}</td>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

