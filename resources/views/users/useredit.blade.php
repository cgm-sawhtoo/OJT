@extends('layouts.app')
@section('title', 'useredit')
@section('user_sidebar')
@endsection
@section('news_sidebar')
@endsection
@section('contents')
    <div class="container">
        <div class="row own_card center">
            <div class="col-md-12">
                {!! Form::open(['method' => 'POST', 'route' => ['user#update', $useredit->id]]) !!}
                @csrf
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show mt-2">
                        <strong>{{ session()->get('message') }}</strong>
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                @endif

                <div class="flex-container">
                    <div class="form-label">
                        <label for="name">{{ __('Name') }}</label>
                    </div>
                    @if ($errors->has('name'))
                        <span class="error text-danger">{{ $errors->first('name') }}</span>
                    @endif
                    {!! Form::text('name', $useredit->name, ['class' => 'form-control', 'placeholder' => 'Name..']) !!}
                </div>

                <div class="flex-container">
                    <div class="form-label">
                        <label for="email">{{ __('Email') }}</label>
                    </div>
                    @if ($errors->has('email'))
                        <span class="error text-danger">{{ $errors->first('email') }}</span>
                    @endif
                    {!! Form::text('email', $useredit->email, ['class' => 'form-control', 'placeholder' => 'Email address..']) !!}
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                        else.</small>
                </div>

                @if (auth()->user()->is_admin == 'true')
                <div class="flex-container">
                    <label for="is_admin">{{ __('User Type') }}</label>
                    {!! Form::select('is_admin', [false => 'User', true => 'Admin'], $useredit->is_admin, ['class' => 'form-control']) !!}
                </div>
                @else
                    {!! Form::hidden('is_admin', 'false') !!}
                @endif

                <div class="flex-container">
                    <label for="gender">{{ __('Gender') }}</label>
                    {!! Form::select('gender', ['1' => 'Male', '0' => 'Female'], $useredit->gender, ['class' => 'form-control']) !!}
                </div>
                {!! Form::submit('Update', ['class' => 'form-control btn btn-primary mt-4']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
