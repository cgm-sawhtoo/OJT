@extends('layouts.app')
@section('title', 'usernewslist')
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
                <h4 class="text-center mt-3">NEWS User's view</h4>
                <div class="row">
                    <div class="mr-3">{{ $usernews->links() }}</div>
                    <button type="button" class="btn" onclick="listView()"><i class="fa fa-bars"></i> List</button>
                    <button type="button" class="btn" onclick="gridView()"><i class="fa fa-th-large"></i> Grid</button>
                </div>

                <div class="row mt-3 mb-3">
                    @foreach ($usernews as $shownews)
                        <div class="column own_card">
                            <div class="own_card-header">
                                <a href="{{ route('user#details', $shownews->user->id) }}">{{ $shownews->user->name }}</a>
                                <h4>{{ $shownews->title }}</h4>
                                <p class="selector">{{ $shownews->message }}</p>
                            </div>

                            <div class="own_card-body">
                                @if ($shownews->user->gender)
                                    <img src="{{ asset('../images/male.png') }}" width="30" height="30">
                                @else
                                    <img src="{{ asset('../images/female.png') }}" width="30" height="30">
                                @endif
                            </div>
                            <div class="own_card-footer">
                                <i class="fa fa-globe float-right"></i>
                                <a href="#info{{ $shownews->id }}" data-toggle="modal">
                                    <i class="fa fa-info_circle float-right mr-2 text-secondary"></i>
                                </a>
                            </div>
                        </div>
                        <div class="modal fade" id="info{{ $shownews->id }}">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="text-center">{{ $shownews->title }}</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <textarea class="form-control" rows="15" disabled
                                            name="message">{{ $shownews->message }}</textarea>
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
