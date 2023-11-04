@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Task</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('task.list') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('task.update') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $task->task_name }}" class="form-control"
                        placeholder="Name">
                </div>
                <input type="hidden" name="id" value="{{ $task->id }}" class="form-control">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Category </strong>
                    <select class="form-control" name="category">
                        @foreach ($categories as $category)
                            <option value="">Select</option>
                            <option value="{{ $category->id }}" {{ $task->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status </strong>
                    <select class="form-control" name="status" placeholder="">
                        <option value="">Select</option>
                        <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="complete" {{ $task->status == 'complete' ? 'selected' : '' }}>Complete</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
