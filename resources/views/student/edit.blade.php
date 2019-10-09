@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Student Data</h5>
                    <a href="{{ route('student.index') }}" class="btn btn-primary btn-sm">All Student</a>
                </div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <form action="{{ route('student.update', ['student' => $student]) }}" method="post">
                                @csrf 
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control"  name="name" value="{{ $student->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control"  name="email" value="{{ $student->email }}">
                                </div>
                                <div class="form-group text-center">
                                    <button class="btn btn-success">
                                        Update Students
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
