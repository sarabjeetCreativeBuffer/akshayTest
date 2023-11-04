@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Task Lists</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('task.create') }}"> Create New Task</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Category Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($tasks as $key=> $task)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $task->task_name }}</td>
                <td>{{ $task->category->category_name }}</td>
                <td>
                    <form action="{{ route('task.destroy', $task->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('task.show', $task->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('task.edit', $task->id) }}">Edit</a>
                        @csrf

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{-- {!! $users->links() !! --}}
@endsection
