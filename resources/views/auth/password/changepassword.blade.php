@extends('layouts.app')
@section('title', 'changepassword')
@section('user_sidebar')
@endsection
@section('news_sidebar')
@endsection
@section('contents')
    <div class="containeer">
        <div class="row own_card center">
            <div class="col-md-12">
                <h4>Change Password</h4>
                {!! Form::open(['method' => 'POST', 'route' => 'change#passwordok']) !!}
                @csrf

                <div class="flex-container">
                    <div class="form-label">
                        <label for="current_password">{{ __('Current Password') }}</label>
                    </div>
                    @if ($errors->has('current_password'))
                        <span class="error text-danger">{{ $errors->first('current_password') }}</span>
                    @endif
                    {!! Form::password('current_password', ['class' => 'form-control', 'placeholder' => 'Current-']) !!}
                </div>

                <div class="flex-container">
                    <div class="form-label">
                        <label for="new_password">{{ __('New Password') }}</label>
                    </div>
                    @if ($errors->has('new_password'))
                        <span class="error text-danger">{{ $errors->first('new_password') }}</span>
                    @endif
                    {!! Form::password('new_password', ['class' => 'form-control', 'placeholder' => 'New-']) !!}
                </div>

                <div class="flex-container">
                    <div class="form-label">
                        <label for="new_confirm_password">{{ __('New Confirm Password') }}</label>
                    </div>
                    @if ($errors->has('new_confirm_password'))
                        <span class="error text-danger">{{ $errors->first('new_confirm_password') }}</span>
                    @endif
                    {!! Form::password('new_confirm_password', ['class' => 'form-control', 'placeholder' => 'Confirm-']) !!}
                </div>

                {!! Form::submit('Confirm', ['class' => 'form-control btn btn-primary mt-4']) !!}
                {!! Form::close() !!}

                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show mt-2">
                        <strong>{{ session()->get('message') }}</strong>
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
