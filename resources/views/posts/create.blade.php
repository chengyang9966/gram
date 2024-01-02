@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <form method="POST" action="/p" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <h1>Add New Post</h1>
                    </div>
                    <div class="row mb-3">
                        <label for="caption" class="col-md-4 col-form-label">{{ __('Post Caption') }}</label>

                        <div>
                            <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror"
                                name="caption" value="{{ old('caption') }}" required autocomplete="caption" autofocus>
                            @error('caption')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="image" class="col-md-4 col-form-label @error('image') is-invalid @enderror">{{ __('Post Image') }}</label>
                        <input class="form-control" type="file" name="image" id="image">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="row my-4">
                        <button class="btn btn-primary w-25">Add New Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
