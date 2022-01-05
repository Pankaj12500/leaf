@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-primary float-right " href="{{ route('blogs.index') }}">All</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('blogs.update', $blog->id) }}" novalidate>
                            @csrf
    
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>
    
                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $blog->title }}" required autofocus>
    
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="type" class="col-md-4 col-form-label text-md-right">Type</label>
    
                                <div class="col-md-6">
                                    <input id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ $blog->type }}" required>
    
                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">Category</label>
    
                                <div class="col-md-6">
                                    <input id="category" type="text" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ $blog->category }}" required>
    
                                    @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="Description" class="col-md-4 col-form-label text-md-right">Description</label>
    
                                <div class="col-md-6">
                                    <textarea name="description" id="description" cols="40" rows="5" class="form-control @error('description') is-invalid @enderror">{{ $blog->description }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
