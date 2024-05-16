@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <h1>MANAJEMEN TUGAS</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('task.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="">Judul</label>
                                    <input type="text" name="title" id="title" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="">Deskripsi</label>
                                    <input type="text" name="description" id="description" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="">Tenggat</label>
                                    <input type="date" name="due_date" id="due_date" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="">Kategori</label>
                                    <select name="category" class="form-select">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ route('task.index') }}" class="btn btn-primary">Close</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
