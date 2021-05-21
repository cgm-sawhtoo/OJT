@extends('layouts.main')
@section('title', 'Forgot my password')
@section('contents')
    <div class="container">
        <div class="row own_card center">
            <div class="col-md-12">
                <h5>Reset Password</h5>
                <hr>
                {!! Form::open(['method' => 'POST', 'route' => 'reset#passwordok']) !!}
                @csrf
                {!! Form::hidden('token', $token) !!}

                <div class="flex-container">
                    <div class="form-label">
                        <label for="email">{{ __('Email') }}</label>
                    </div>
                    @if ($errors->has('email'))
                        <span class="error text-danger">{{ $errors->first('email') }}</span>
                    @endif
                    {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Email address..']) !!}
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                        else.</small>
                </div>
                <div class="flex-container">
                    <div class="form-label">
                        <label for="password">{{ __('Password') }}</label>
                    </div>
                    @if ($errors->has('password'))
                        <span class="error text-danger">{{ $errors->first('password') }}</span>
                    @endif
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password..']) !!}
                </div>
                <div class="flex-container">
                    <div class="form-label">
                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                    </div>
                    @if ($errors->has('password-confirm'))
                        <span class="error text-danger">{{ $errors->first('password-confirm') }}</span>
                    @endif
                    {!! Form::password('password-confirm', ['class' => 'form-control', 'placeholder' => 'Confirm Password']) !!}
                </div>
                {!! Form::submit('Reset Password', ['class' => 'form-control btn btn-primary mt-4']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
