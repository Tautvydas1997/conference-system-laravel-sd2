@extends('layouts.app')

@section('title', __('common.home'))

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h2>{{ __('common.student_info') }}</h2>
            </div>
            <div class="card-body">
                <p><strong>{{ __('common.student_name') }}:</strong> Tautvydas</p>
                <p><strong>{{ __('common.student_surname') }}:</strong> Kasperavičius</p>
                <p><strong>{{ __('common.student_group') }}:</strong> PIT-22-I-NT</p>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h3>{{ __('common.role_systems') }}</h3>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    @auth
                        @if(auth()->user()->isClient())
                            <a href="{{ route('client.index') }}" class="btn btn-primary btn-lg">
                                {{ __('common.client_system') }}
                            </a>
                        @endif
                        
                        @if(auth()->user()->isEmployee())
                            <a href="{{ route('employee.index') }}" class="btn btn-success btn-lg">
                                {{ __('common.employee_system') }}
                            </a>
                        @endif
                        
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('admin.index') }}" class="btn btn-warning btn-lg">
                                {{ __('common.admin_system') }}
                            </a>
                        @endif
                    @else
                        <p class="text-muted">{{ __('auth.please_login') }}</p>
                        <a href="{{ route('login') }}" class="btn btn-primary btn-lg">
                            {{ __('auth.login') }}
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-secondary btn-lg">
                            {{ __('auth.register') }}
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

