@extends('layouts.app')
@section('title', 'newsupload')
@section('user_sidebar')
@endsection
@section('news_sidebar')
@endsection

@push('tinyarea')
<script src="https://cdn.tiny.cloud/1/tc8q0m3kds4o2xpa6kco0dyd46vi1zf86nw7vl8qsqe7udam/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
        selector: 'textarea',
        menubar: false,
        toolbar: 'bold italic underline | backcolor forecolor fontsizeselect | alignleft aligncenter alignright alignjustify | outdent indent numlist bullist | link removeformat',
        plugins: ['textcolor, lists, link, advlist'],
        fontsize_formats: "8pt 10pt 11pt 12pt 14pt 18pt 24pt 36pt",
        toolbar_items_size : 'small',
        language: 'ja',
        height: '219',
        resize: 'both',
        branding: false,
        setup: function(ed) {
            // after init
            ed.on('init', function(e) {
                var content = vars('content');
                e.target.setContent(content[e.target.id]);
            });
        },
    });
    </script>
@endpush

@section('contents')
    <div class="container">
        <div class="row own_card center">
            <div class="col-md-12">
                <h4>Add NEWS</h4>

                <div class="login-error alert-warning">
                    @if (session()->has('error'))
                        <div class="alert alert-warning alert-dismissible fade show">
                            <strong>Warning! {{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                        </div>
                    @endif
                </div>

                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show mt-2">
                        <strong>{{ session()->get('message') }}</strong>
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                @endif

                {!! Form::open(['method' => 'POST', 'route' => 'news#upload']) !!}
                @csrf
                <div class="flex-container">
                    <div class="form-label">
                        <label for="title">{{ __('Title:') }}</label>
                    </div>
                    @if ($errors->has('title'))
                        <span class="error text-danger">{{ $errors->first('title') }}</span>
                    @endif
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'Enter Your Title..']) !!}
                </div>

                <div class="flex-container">
                    <div class="form-label">
                        <label for="message">{{ __('Message:') }}</label>
                    </div>
                    @if ($errors->has('message'))
                        <span class="error text-danger">{{ $errors->first('message') }}</span>
                    @endif
                    {!! Form::textarea('message', old('message'), ['class' => 'form-control', 'rows' => '8', 'placeholder' => 'Enter Your Message..']) !!}
                </div>

                <div class="flex-container">
                    <label for="public_flag">{{ __('Type:') }}</label>
                    {!! Form::select('public_flag', ['1' => 'Public', '0' => 'Private'], '1', ['class' => 'form-control']) !!}
                </div>
                {!! Form::hidden('user_id', auth()->user()->id) !!}
                {!! Form::submit('Upload', ['class' => 'form-control btn btn-primary mt-4']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
