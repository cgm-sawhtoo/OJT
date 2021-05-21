@extends('layouts.main')
@section('title', 'Forgot my password')
@section('contents')
    <div class="container">
        <div class="row own_card center">
            <div class="col-md-12">
                <h5>Reset Password</h5>
                <hr>
                {!! Form::open(['method' => 'POST', 'route' => 'post#email']) !!}
                @csrf
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <strong>{{ session('status') }}</strong>
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                @endif
                <div class="flex-container">
                    <div class="form-label">
                        <label for="email">{{ __('Email address') }}</label>
                    </div>
                    @if ($errors->has('email'))
                        <span class="error text-danger">{{ $errors->first('email') }}</span>
                    @endif
                    {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Enter email']) !!}
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                        else.</small>
                </div>
                {!! Form::submit('Reset Password', ['class' => 'form-control btn btn-primary mt-2']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
