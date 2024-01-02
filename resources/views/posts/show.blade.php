@extends('layouts.app')

@section('content')
<div class="contaier">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{$post ->image}}" class="w-100" alt="">
        </div>
        <div class="col-4">
            <div class="">
               <div>
                <img src="{{ $post->user->profile->profileImage() }}" alt="">
               </div>
                <p>{{$post -> caption}}</p>
            </div>
        </div>
    </div>
    
</div>
@endsection