@extends('layouts.app')

@section('title', __('conferences.list'))

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>{{ __('conferences.list') }}</h1>
            @if(isset($showCreateButton) && $showCreateButton)
                <a href="{{ route('admin.conferences.create') }}" class="btn btn-primary">
                    {{ __('conferences.create') }}
                </a>
            @endif
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
                                    <div class="btn-group" role="group">
                                        @if(isset($showViewButton) && $showViewButton)
                                            <a href="{{ route('conferences.show', $conference->id) }}" class="btn btn-sm btn-info">
                                                {{ __('conferences.view_action') }}
                                            </a>
                                        @endif
                                        @if(isset($showEditButton) && $showEditButton)
                                            <a href="{{ route('admin.conferences.edit', $conference->id) }}" class="btn btn-sm btn-warning">
                                                {{ __('conferences.edit_action') }}
                                            </a>
                                        @endif
                                        @if(isset($showDeleteButton) && $showDeleteButton && $conference->status === 'planned')
                                            <form action="{{ route('admin.conferences.destroy', $conference->id) }}" method="POST" class="d-inline" 
                                                  onsubmit="return confirm('{{ __('conferences.delete_confirmation') }}');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    {{ __('conferences.delete') }}
                                                </button>
                                            </form>
                                        @endif
                                    </div>
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

