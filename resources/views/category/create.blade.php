@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <h1>CREATE CATEGORY</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('category.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="">Nama Kategori</label>
                                    <input type="text" name="name" id="title" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="">Deskripsi</label>
                                    <input type="text" name="description" id="description" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ route('category.index') }}" class="btn btn-primary">Close</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
