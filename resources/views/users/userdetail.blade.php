@extends('layouts.app')
@section('title', 'userdetail')
@section('user_sidebar')
@endsection
@section('news_sidebar')
@endsection
@section('contents')
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card center mt-3" style="width:50%">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        @if ($userdetails->gender)
                            <img src="{{ asset('../images/male.png') }}" class="center" width="5%" height="5%">
                        @else
                            <img src="{{ asset('../images/female.png') }}" class="center">
                        @endif
                        <h5 class="card-title text-center">{{ $userdetails->name }}</h5>
                        <p class="card-title text-center">{{ $userdetails->email }}</p>
                    </div>

                    <div class="card-footer">
                    </div>
                </div>
                <br>

                <div class="row">
                    <button type="button" class="btn" onclick="listView()"><i class="fa fa-bars"></i> List</button>
                    <button type="button" class="btn" onclick="gridView()"><i class="fa fa-th-large"></i> Grid</button>
                </div>
                {{ $profilenews->links() }}

                <div class="row mt-3 mb-3">
                    @foreach ($profilenews as $usernews)
                        <div class="column own_card">
                            <div class="own_card-header">
                                <p>{{ $usernews->name }}</p>
                                <h4>{{ $usernews->title }}</h4>
                            </div>
                            <div class="own_card-body">
                                <p class="selector">{{ $usernews->message }}</p>
                            </div>
                            <div class="own_card-footer">
                                @if (Auth()->user()->is_admin == 'true')

                                    @if ($usernews->public_flag)
                                        <a href="#flag{{ $usernews->id }}" data-toggle="modal" value="1"
                                            data-backdrop="static" data-keyboard="false"><i
                                                class="fa fa-globe float-right"></i></a>
                                    @else
                                        <a href="#flag{{ $usernews->id }}" data-toggle="modal" value="0"
                                            data-backdrop="static" data-keyboard="false"><i
                                                class="fa fa-lock float-right"></i></a>
                                    @endif

                                    <a href="#model{{ $usernews->id }}" data-toggle="modal" data-backdrop="static"
                                        data-keyboard="false">
                                        <i class="fa fa-trash float-right mr-2 text-danger"></i>
                                    </a>
                                    <a href="#info{{ $usernews->id }}" data-toggle="modal" data-backdrop="static"
                                        data-keyboard="false">
                                        <i class="fa fa-info_circle float-right mr-2 text-secondary"></i>
                                    </a>
                                @else
                                    @if ($usernews->public_flag)
                                        <i class="fa fa-globe float-right"></i>
                                    @else
                                        <i class="fa fa-lock float-right"></i>
                                    @endif
                                    <a href="#info{{ $usernews->id }}" data-toggle="modal" data-backdrop="static"
                                        data-keyboard="false">
                                        <i class="fa fa-info_circle float-right mr-2 text-secondary"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <!--delete-->
                        <div class="modal fade" id="model{{ $usernews->id }}">

                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h5 class="modal-title">Do you want to delete it?</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <img src="{{ asset('images/trash.gif') }}" class="center" alt="Trash">
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <a href="{{ route('news#delete', $usernews->id) }}"
                                            class="btn btn-danger">Yes</a>
                                        <a class="btn btn-secondary" data-dismiss="modal">No</a>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--flag-->
                        <div class="modal fade" id="flag{{ $usernews->id }}">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h5 class="modal-title">Do you want to change?</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <img src="{{ asset('images/lock.gif') }}" class="center" alt="Flag">
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        {!! Form::open(['method' => 'POST', 'route' => ['flag#edit', $usernews->id], 'class' => 'form-inline']) !!}
                                        @csrf
                                        {!! Form::select('public_flag', ['1' => 'Public', '0' => 'Private'], $usernews->public_flag, ['class' => 'form-control mr-2']) !!}
                                        {!! Form::submit('Yes', ['class' => 'btn btn-primary mr-2']) !!}
                                        <button class="btn btn-secondary" data-dismiss="modal">No</button>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--info-->
                        <div class="modal fade" id="info{{ $usernews->id }}">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="text-center">{{ $usernews->title }}</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <p name="message">{!! $usernews->message !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
