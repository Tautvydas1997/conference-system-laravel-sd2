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
            <div class="row">
                @foreach($conferences as $conference)
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $conference->name }}</h5>
                                <p class="card-text">{{ \Illuminate\Support\Str::limit($conference->description, 100) }}</p>
                                <p class="card-text">
                                    <small class="text-muted">
                                        {{ __('conferences.date') }}: {{ $conference->date }} {{ $conference->time }}
                                    </small>
                                </p>
                                <p class="card-text">
                                    <small class="text-muted">
                                        {{ __('conferences.address') }}: {{ $conference->address }}
                                    </small>
                                </p>
                            </div>
                            <div class="card-footer">
                                <div class="btn-group w-100" role="group">
                                    <a href="{{ route('client.show', $conference->id) }}" class="btn btn-info">
                                        {{ __('conferences.view_action') }}
                                    </a>
                                    @if($conference->status === 'planned')
                                        <form action="{{ route('client.register', $conference->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-success">
                                                {{ __('conferences.register') }}
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection

