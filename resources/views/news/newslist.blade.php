@extends('layouts.app')
@section('title', 'newslist')
@section('user_sidebar')
@endsection
@section('news_sidebar')
    @parent
@endsection
@section('contents')
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h4 class="text-center mt-3">All NEWS Admin view</h4>
                <div class="row">
                    <div class="float-left mr-3">{{ $allnews->links() }}</div>
                    <button type="button" class="btn" onclick="listView()"><i class="fa fa-bars"></i> List</button>
                    <button type="button" class="btn" onclick="gridView()"><i class="fa fa-th-large"></i> Grid</button>
                </div>

                <div class="row mt-3 mb-3">
                    @foreach ($allnews as $shownews)
                        <div class="column own_card">
                            <div class="own_card-header">
                                @if ($shownews->user->gender)
                                    <img src="{{ asset('../images/male.png') }}" width="30" height="30">
                                @else
                                    <img src="{{ asset('../images/female.png') }}" width="30" height="30">
                                @endif
                                <a
                                    href="{{ route('user#details', $shownews->user->id) }}">{{ $shownews->user->name }}</a>
                                <h4>{{ $shownews->title }}</h4>
                            </div>

                            <div class="own_card-body">
                                <p class="selector">{{ $shownews->message }}</p>
                            </div>

                            <div class="own_card-footer">

                                @if ($shownews->public_flag)
                                    <a href="#flag{{ $shownews->id }}" data-toggle="modal" value="1" data-backdrop="static" data-keyboard="false"><i
                                            class="fa fa-globe float-right"></i></a>
                                @else
                                    <a href="#flag{{ $shownews->id }}" data-toggle="modal" value="0" data-backdrop="static" data-keyboard="false"><i
                                            class="fa fa-lock float-right"></i></a>
                                @endif

                                <a href="#model{{ $shownews->id }}" data-toggle="modal" data-backdrop="static" data-keyboard="false">
                                    <i class="fa fa-trash float-right mr-2 text-danger"></i>
                                </a>
                                <a href="#info{{ $shownews->id }}" data-toggle="modal" data-backdrop="static" data-keyboard="false">
                                    <i class="fa fa-info_circle float-right mr-2 text-secondary"></i>
                                </a>
                            </div>
                        </div>

                        <div class="modal fade" id="model{{ $shownews->id }}">
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
                                        <a href="{{ route('news#delete', $shownews->id) }}"
                                            class="btn btn-danger">Yes</a>
                                        <a class="btn btn-secondary" data-dismiss="modal">No</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="flag{{ $shownews->id }}">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h5 class="modal-title">Do you want to change?</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <img src="{{ asset('images/lock.gif') }}" class="center" alt="Trash">
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        {!! Form::open(['method' => 'POST', 'route' => ['flag#edit', $shownews->id], 'class' => 'form-inline']) !!}
                                        @csrf
                                        {!! Form::select('public_flag', ['1' => 'Public', '0' => 'Private'], $shownews->public_flag, ['class' => 'form-control mr-2']) !!}
                                        {!! Form::submit('Yes', ['class' => 'btn btn-primary mr-2']) !!}
                                        <button class="btn btn-secondary" data-dismiss="modal">No</button>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="info{{ $shownews->id }}">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="text-center">{{$shownews->title}}</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <p name="message">{!! $shownews->message !!}</p>
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
