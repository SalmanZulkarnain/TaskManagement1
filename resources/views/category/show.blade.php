@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                    <h1>DETAIL KATEGORI</h1>
                    </div>  
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="">Nama Kategori</label>
                            <input type="text" readonly name="name" class="form-control" value="{{ $category->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="">Deskripsi</label>
                            <input type="text" readonly name="description" class="form-control" value="{{ $category->description }}">
                        </div>

                        <div class="mb-3">
                            <a href="{{ route('category.index') }}" class="btn btn-primary">Close</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

