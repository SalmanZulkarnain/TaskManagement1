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
                        {{-- Notification --}}
                    <button id="dropdown-button-notif" style="cursor: pointer;" class="position-relative d-flex align-items-center p-2 rounded-pill bg-primary border-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill text-white" viewBox="0 0 16 16">
                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901"/>
                          </svg>
                          @if (!$taskDueDates->isEmpty())
                            <h5 style="top: .45rem; right: .3rem; line-height: 0;" class="m-0 p-0 text-danger position-absolute">●</h5>
                        @endif
                    </button>
                    <div id="dropdown-notif" style="top: 5rem; z-index: 99999; padding: .8rem 1rem" class="position-absolute d-none bg-white border border-success rounded shadow-sm">
                        @if ($taskDueDates->isEmpty())
                            <p>No notifications.</p>
                        @else
                            @foreach ($taskDueDates as $taskDueDate)
                                @if ($taskDueDate->completed === 1)
                                    <p style="max-width: 300px;" class="m-0 d-flex"><span style="max-width: 140px;text-overflow: ellipsis; overflow: hidden; white-space: nowrap;" class="text-primary fw-bold">'{{$taskDueDate->title}}'</span> &nbsp; task has been completed.</p>
                                    <hr style="margin: .5rem 0" class="hr border-success"></hr>
                                @else
                                    <p style="max-width: 300px;" class="m-0 d-flex">Today's &nbsp; <span style="max-width: 140px;text-overflow: ellipsis; overflow: hidden; white-space: nowrap;" class="text-primary fw-bold">'{{$taskDueDate->title}}'</span> &nbsp; task due date!</p>
                                    <p style="font-size: .7rem" class="m-0 text-secondary">{{ ($taskDueDate->due_date) }}</p>
                                    <hr style="margin: .5rem 0" class="hr border-success"></hr>
                                @endif
                            @endforeach
                        @endif
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
                    <span class="fs-1 font-bold">DAFTAR TUGAS</span>
                    <a href="{{ url('create' )}}" class="btn btn-success">Tambah</a>
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
                                <th>Kategori</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Tenggat</th>
                                <th>Selesai</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $key => $task)
                            <tr>
                                <td class="">{{ $key + 1 }}</td>
                                <td>{{ $task->category->name }}</td>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->description }}</td>
                                <td>{{ $task->due_date }}</td>
                                <td>{{ $task->completed ? "Sudah" : "Belum" }}</td>
                                <td>
                                    <div class="d-flex justify-content-evenly">
                                        <form action="{{route('task.completed', $task->id)}}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Tandai selesai</button>
                                        </form>
                                        <a href="{{ url('show', $task->id) }}" class="btn btn-success">Detail</a>
                                        <a href="{{ url('update', $task->id) }}" class="btn btn-warning">Update</a>
                                        <form action="{{ route('task.destroy', $task->id) }}" method="POST">
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

<script>
    document.addEventListener("DOMContentLoaded", function () {
    const dropdownButton = document.getElementById("dropdown-button-notif");
    const dropdown = document.getElementById("dropdown-notif");

    dropdownButton.addEventListener("click", function () {
        dropdown.classList.toggle("d-none");
    });
});
</script>

@endsection
