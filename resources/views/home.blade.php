@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $blg)
                                    <tr>
                                        <td scope="row">{{ $blg->title }}</td>
                                        <td>{{ $blg->type }}</td>
                                        <td>{{ $blg->category }}</td>
                                        <td>{{ $blg->description }}</td>
                                        <td><a href="{{ route('addBlog') }}">
                                                <button type="button" name="" id=""
                                                    class="btn btn-primary btn-lg btn-block">Edit</button>
                                            </a>
                                            <a href="{{ route('deleteBlog') }}/{{ $blg->id }}">
                                                <button type="button" name="" id=""
                                                    class="btn btn-danger btn-lg btn-block">Delete</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
