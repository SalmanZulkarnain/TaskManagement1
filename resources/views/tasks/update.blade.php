@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>UPDATE TUGAS</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('task.update', $task->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="">Judul</label>
                            <input type="text" name="title" class="form-control" value="{{ $task->title }}">
                        </div>
                        <div class="mb-3">
                            <label for="">Deskripsi</label>
                            <input type="text" name="description" class="form-control" value="{{ $task->description }}">
                        </div>
                        <div class="mb-3">
                            <label for="">Tenggat</label>
                            <input type="date" name="due_date" class="form-control" value="{{ $task->due_date }}">
                        </div>
                        <div class="mb-3">
                            <select name="category" class="form-select">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="">Is Completed</label>
                            <input type="checkbox" name="completed" {{ $task->completed ? 'checked' : '' }} value="{{ $task->completed ? 'Sudah' : 'Belum' }}">
                            <input type="hidden" name="completed_hidden" value="{{ $task->completed ? 'Sudah' : 'Belum' }}">
                        </div>

                        <div class="flex justify-between">
                            <button type="submit" class="btn btn-primary">Update</button>
                        
                            <a href="{{ route('task.index') }}" class="btn btn-primary">Close</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
