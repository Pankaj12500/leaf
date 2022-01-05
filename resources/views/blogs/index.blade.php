@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Blogs
                        <a class="btn btn-primary float-right " href="{{ route('blogs.create') }}">Add</a>
                    </div>

                    <div class="card-body">
                        @if (session('successMsg'))
                            <div class="alert alert-success" role="alert">
                                {{ session('successMsg') }}
                            </div>
                        @endif
                        
                        @if (session('successError'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('successError') }}
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
                                        <td>{{ $blg->title }}</td>
                                        <td>{{ $blg->type }}</td>
                                        <td>{{ $blg->category }}</td>
                                        <td>{{ $blg->description }}</td>
                                        <td>
                                            <a href="{{ route('blogs.edit', $blg->id) }}">
                                                Edit
                                            </a>
                                            <a href="#" onclick="event.preventDefault();
                                                document.getElementById('delete').submit();">
                                               Delete
                                            </a>

                                            <form id="delete" action="{{ route('blogs.delete', $blg->id) }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
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
