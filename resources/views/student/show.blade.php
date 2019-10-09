@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">View Student Data</h5>
                    <a href="{{ route('student.index') }}" class="btn btn-primary btn-sm">All Student</a>
                </div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control"  name="name" value="{{ $student->name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control"  name="email" value="{{ $student->email }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
