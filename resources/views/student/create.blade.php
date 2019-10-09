@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add Student</h5>
                    <a href="{{ route('student.index') }}" class="btn btn-primary btn-sm">All Student</a>
                </div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <form action="{{ route('student.store') }}" method="post">
                                @csrf 
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control"  name="name">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control"  name="email">
                                </div>
                                <div class="form-group text-center">
                                    <button class="btn btn-success">
                                        Add Students
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
