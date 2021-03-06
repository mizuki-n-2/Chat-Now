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
@if (session('error_message'))
<div class="error_message bg-danger text-white">
    {{ session('error_message') }}
</div>
@endif

<div class="py-2">
    <div class="d-flex">
        <div class="left container">

            {{-- message --}}
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card msg-wrapper">
                        <div class="card-header bg-dark text-white title">Talk Now</div>

                        {{-- message submit --}}
                        <form action="{{ route('add') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-12 d-flex justify-content-between">
                                    <div class="pt-3" id="icon-btn">
                                        <i class="far fa-image fa-2x" id="photo-btn"></i>
                                        <i class="far fa-comment fa-2x d-none" id="msg-btn"></i>
                                    </div>
                                    <div>
                                        <button type="submit" id="submit-btn"
                                            class="btn btn-primary mt-2">Submit</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <textarea name="message" class="form-control textarea" rows="3"
                                        placeholder="push massage (shift + Enter)"
                                        onkeydown="if(event.shiftKey&&event.keyCode==13){document.getElementById('submit-btn').click();return false};"></textarea>
                                    <input type="file" id="file" class="d-none" name="image">
                                </div>
                            </div>
                        </form>

                        {{-- message --}}
                        <div class="card-body msg-body" id="msg-body">
                            <div id="message-data"
                                class="d-flex flex-wrap align-items-center justify-content-between mb-4"
                                style="display: none;">
                                <div id="name" class="name"></div>
                                <div id="date" class="text-muted date"></div>
                                <div id="message" class="message mb-3 ml-3"></div>
                                <img src="{{ asset('image/001.JPG') }}" id="img" class="mx-auto d-none">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="right container">
            {{-- user info --}}
            <div class="card">
                <div class="card-header bg-dark text-white title">User Profile</div>
                <div class="card-body">
                    <div class="user-info">
                        @if ($user->profile_img === '')
                        <img src="{{ asset('image/default.png') }}" class="profile-img">
                        @else
                        <img src="{{ asset('storage/prof-img/'.$user->profile_img) }}" class="profile-img">
                        @endif
                        <div class="profile-container">
                            <h5 class="card-title user-name">{{ $user->name }}</h5>
                            <p class="card-text user-profile">{!! nl2br($user->profile) !!}</p>
                            <a href="{{ route('edit') }}" class="profile-edit-btn">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('js')
    <script src="{{ asset('js/message.js') }}"></script>
    @endsection