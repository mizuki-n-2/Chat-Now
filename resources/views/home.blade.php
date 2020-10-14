@extends('layouts.app')

@section('content')

<div class="d-flex">
    <div class="left py-2">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="container">
            

            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card msg">
                        <div class="card-header">Talk now</div>

                        <div class="card-body msg-body">
                            <div id="message-data"></div>
                        </div>
                  
                    </div>
                </div>
            </div>

            <form action="{{ route('add') }}" method="POST" class="form">
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
                        <textarea name="message" class="form-control" rows="4" placeholder="push message (shift + Enter)" onkeydown="if(event.shiftKey&&event.keyCode==13){document.getElementById('submit').click();return false};"></textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="right bg-primary vh-100">

    </div>
</div>

@endsection

@section('js')
    <script src="{{ asset('js/message.js') }}"></script>
@endsection