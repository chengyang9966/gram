@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <form action="/profile/{{base64_encode($user->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <h1>Edit User Profile</h1>
                    </div>
                    <div class="row mb-3">
                        <label for="title" class="col-md-4 col-form-label">{{ __('Title') }}</label>

                        <div>
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                name="title" value="{{ old('title') ?? $user->profile->title }}" required autocomplete="title" autofocus>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="description" class="col-md-4 col-form-label">{{ __('Description') }}</label>

                        <div>
                            <input id="description" type="text"
                                class="form-control @error('description') is-invalid @enderror" name="description"
                                value="{{ old('description') ?? $user->profile->description }}" required autocomplete="description" autofocus>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="url" class="col-md-4 col-form-label">{{ __('Url') }}</label>
                        <div>
                            <input id="url" type="text" class="form-control @error('url') is-invalid @enderror"
                                name="url" value="{{ old('url') ?? $user->profile->url }}" required autocomplete="url" autofocus>
                            @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="">
                            <label for="image" class="col-md-4 col-form-label @error('image') is-invalid @enderror">{{ __('Profile Image') }}</label>
                            <input class="form-control" type="file" name="image" id="image">
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="row my-4">
                        <button class="btn btn-primary ms-2">Save Profile</button>
                    </div>
            </div>
        </div>
       
        </form>
    </div>
    </div>
    </div>
@endsection
