@extends('layouts.main')
@section('title', 'index')
@section('contents')
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">

                <div class="row mt-3">
                    <div class="float-left mr-3">{{ $index->links() }}</div>
                    <button type="button" class="btn" onclick="listView()"><i class="fa fa-bars"></i> List</button>
                    <button type="button" class="btn" onclick="gridView()"><i class="fa fa-th-large"></i> Grid</button>
                </div>

                <div class="row mt-3">
                    @foreach ($index as $shownews)
                        <div class="column own_card">
                            <div class="own_card-header">
                                @if ($shownews->user->gender)
                                    <img src="{{ asset('../images/male.png') }}" width="30" height="30">
                                @else
                                    <img src="{{ asset('../images/female.png') }}" width="30" height="30">
                                @endif
                                <a>{{ $shownews->user->name }}</a>
                                <h4>{{ $shownews->title }}</h4>
                            </div>
                            <div class="own_card-body">
                                <p class="selector">{{ $shownews->message }}</p>
                            </div>
                            <div class="own_card-footer">
                                <i class="fa fa-globe float-right"></i>
                                <a href="#info" data-toggle="modal">
                                    <i class="fa fa-info_circle float-right mr-2 text-secondary"></i>
                                </a>
                            </div>
                        </div>

                        <div class="modal fade" id="info">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        If you wanna to see more...
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <img src="{{ asset('images/how.gif') }}" class="center" alt="wanna">
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <a href="login" class="btn btn-primary">Login</a>
                                        <a href="register" class="btn btn-secondary">SignUp</a>
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
