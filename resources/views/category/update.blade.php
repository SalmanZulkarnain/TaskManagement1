@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>UPDATE KATEGORI</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.update', $category->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="">Judul</label>
                            <input type="text" name="name" class="form-control" value="{{ $category->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="">Deskripsi</label>
                            <input type="text" name="description" class="form-control" value="{{ $category->description }}">
                        </div>

                        <div class="flex justify-between">
                            <button type="submit" class="btn btn-primary">Update</button>
                        
                            <a href="{{ route('category.index') }}" class="btn btn-primary">Close</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
