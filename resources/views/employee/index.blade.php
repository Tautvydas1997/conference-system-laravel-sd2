@extends('layouts.app')

@section('title', __('conferences.list'))

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>{{ __('conferences.list') }}</h1>
            <a href="{{ route('home') }}" class="btn btn-secondary">
                {{ __('common.home') }}
            </a>
        </div>

        @if($conferences->isEmpty())
            <div class="alert alert-info">
                {{ __('conferences.no_conferences') }}
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('conferences.name') }}</th>
                            <th>{{ __('conferences.date') }}</th>
                            <th>{{ __('conferences.time') }}</th>
                            <th>{{ __('conferences.status') }}</th>
                            <th>{{ __('common.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($conferences as $conference)
                            <tr>
                                <td>{{ $conference->name }}</td>
                                <td>{{ $conference->date }}</td>
                                <td>{{ $conference->time }}</td>
                                <td>
                                    @if($conference->status === 'planned')
                                        <span class="badge bg-success">{{ __('conferences.planned') }}</span>
                                    @else
                                        <span class="badge bg-secondary">{{ __('conferences.completed') }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('employee.show', $conference->id) }}" class="btn btn-sm btn-info">
                                        {{ __('conferences.view_action') }}
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

