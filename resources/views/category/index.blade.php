@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav class="navbar navbar-expand-md navbar-dark bg-slate-500 shadow-sm mb-2">
                <div class="container">
                        
                    <ul class="navbar-nav me-auto mx-3 gap-2">
                        <li><a href="{{ url('home') }}" class="text-decoration-none text-black text-uppercase">Home</a></li>
                        <li><a href="{{ url('index')}}" class="text-decoration-none text-black text-uppercase">Daftar Tugas</a></li>
                        <li><a href="{{ url('/category/index')}}" class="text-decoration-none text-black text-uppercase">List Kategori</a></li>
                    </ul>
                    <form action="{{ route('task.index') }}" method="GET" class="d-flex gap-1">
                        <input type="text" class="form-control" name="search" placeholder="Search tasks...">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </nav>

            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                    <span class="fs-1 font-bold">DAFTAR KATEGORI</span>
                    <a href="{{ url('/category/create' )}}" class="btn btn-success">Tambah</a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status')}}
                    </div>
                    @endif
                    <table class="table table-fixeds text-center">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Kategori</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $category)
                            <tr>
                                <td class="">{{ $key + 1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td>
                                    <div class="d-flex justify-content-evenly">
                                        <a href="{{ url('/category/show', $category->id) }}" class="btn btn-success">Detail</a>
                                        <a href="{{ url('/category/update', $category->id) }}" class="btn btn-warning">Update</a>
                                        <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
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
