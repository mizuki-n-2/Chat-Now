@extends('layouts.app')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="py-2">
    <div class="container">
        
        {{-- message --}}
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card msg-wrapper">
                    <div class="card-header bg-dark text-white msg-title">Talk Now</div>
                    <div class="card-body msg-body" id="msg-body">
                        <div id="message-data" class="d-flex flex-wrap align-items-center justify-content-between mt-0" style="display: none;">
                            <div id="name" class="name"></div>
                            <div id="date" class="text-muted date"></div>
                            <div id="message" class="message mb-3 ml-3"></div>
                        </div>   
                    </div>      
                </div>
            </div>
        </div>

        {{-- message submit --}}
        <form action="{{ route('add') }}" method="POST">
            @csrf

            <div class="row justify-content-center">
                <div class="col-12 d-flex justify-content-between">
                    <div class="pt-3"><i class="far fa-image fa-2x"></i></div>
                    <div>
                        <button type="submit" id="submit" class="btn btn-outline-primary mt-2">submit</button>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12">
                    <textarea name="message" class="form-control" rows="3" placeholder="push massage (shift + Enter)" onkeydown="if(event.shiftKey&&event.keyCode==13){document.getElementById('submit').click();return false};"></textarea>
                </div>
            </div>
        </form>

    </div>
</div>

@endsection

@section('js')
    <script src="{{ asset('js/message.js') }}"></script>
@endsection