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
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
