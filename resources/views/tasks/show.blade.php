@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                    <h1>DETAIL TUGAS</h1>
                    </div>  
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="">Kategori</label>
                            <input type="text" readonly name="category" class="form-control" value="{{ $task->category->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="">Judul</label>
                            <input type="text" readonly name="title" class="form-control" value="{{ $task->title }}">
                        </div>
                        <div class="mb-3">
                            <label for="">Deskripsi</label>
                            <input type="text" readonly name="description" class="form-control" value="{{ $task->description }}">
                        </div>
                        <div class="mb-3">
                            <label for="">Tenggat</label>
                            <input type="date" readonly name="due_date" class="form-control" value="{{ $task->due_date }}">
                        </div>

                        <div class="mb-3">
                            <label for="">Is Completed</label>
                            <input type="checkbox" name="completed" disabled {{ $task->completed ? 'checked' : '' }} value="{{ $task->completed ? 'Sudah' : 'Belum' }}">
                            <input type="hidden" name="completed_hidden" value="{{ $task->completed ? 'Sudah' : 'Belum' }}">
                        </div>

                        <div class="mb-3">
                            <a href="{{ route('task.index') }}" class="btn btn-primary">Close</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

