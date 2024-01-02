@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
        <img class="w-100" src="{{$user->profile->profileImage() }}" class="rounded-circle" alt="logo">
        </div>
        <div class="col-9 p-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                    <h1 >{{ $user->username }}</h1>
                    <follow-button></follow-button>
                </div>
                @auth
                @can('update',$user->profile)
                <a href="/p/create">Add new Post</a>
                @endcan
                @endauth
            </div>
            @can('update',$user->profile)
            <a href="/profile/{{base64_encode($user->id)}}/edit">Edit Profile</a>
            @endcan
            <div class="row w-75">
                <div class="col-3"><strong>{{ $user->posts->count() }}</strong> posts</div>
                <div class="col-4"><strong>23k</strong> followers</div>
                <div class="col-4"><strong>153</strong> following</div>
            </div>
            <div class="pt-2 fw-bold">{{ $user->profile->title ?? '' }}</div>
            <p class="mb-0">{{ $user->profile->description ?? ''}}</p>
            <div><a href="{{ $user->profile->url ?? ''}}" target="__blank">{{ $user->profile->url ?? ''}}</a></div>
        </div>
    </div>
    <div class="row pt-4">
        @foreach($user->posts as $post)
        <div class="col-4 mb-3">
            <a href="/p/{{base64_encode($post->id)}}">
                <img class="w-100" src="/storage/{{$post -> image}}" alt="">
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
