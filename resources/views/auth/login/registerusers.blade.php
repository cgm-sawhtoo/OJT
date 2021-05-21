@extends('layouts.main')
@section('title', 'registeruser')
@section('contents')
    <div class="container">
        <div class="row own_card center">
            <div class="col-md-12">
                <h4>Register Page</h4>
                {!! Form::open(['method' => 'POST', 'route' => 'register#user']) !!}
                @csrf

                <div class="login-error alert-warning">
                    @if (session()->has('error'))
                        <div class="alert alert-warning alert-dismissible fade show">
                            <strong>Warning! {{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                        </div>
                    @endif
                </div>

                <div class="alert-success">
                    @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <strong>{{ session()->get('message') }}</strong>
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                        </div>
                    @endif
                </div>

                <div class="flex-container">
                    <div class="form-label">
                        <label for="name">{{ __('Name') }}</label>
                    </div>
                    @if ($errors->has('name'))
                        <span class="error text-danger">{{ $errors->first('name') }}</span>
                    @endif
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Name..']) !!}
                </div>

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
                    <label for="gender">{{ __('Gender') }}</label>
                    {!! Form::select('gender', ['1' => 'Male', '0' => 'Female'], '1', ['class' => 'form-control']) !!}
                </div>

                {!! Form::hidden('is_admin', 'false') !!}
                {!! Form::submit('Sing Up', ['class' => 'form-control btn btn-primary mt-4']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
