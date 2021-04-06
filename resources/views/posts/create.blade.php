@extends('posts.layout')

@section('content')

    <div class="row mt-5">
        <div class="col-md-12">
            <h2>เพิ่มรายการนักศึกษา</h2>
            <a href="{{ route('posts.index') }}" class="btn btn-primary my-3">กลับ</a>
        </div>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong>
            There were some problems with your input. <br><br>
            <ul>
                @foreach ($errors -> all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div> 
    @endif

    <form action="{{ route('posts.store') }}" method="post">
        @csrf

        <div class="row">
            
            <div class="col-md-12">
                <div class="form-group">
                    <strong>รหัสนักศึกษา</strong>
                    <input type="namber" name="main_id" class="form-control" placeholder="Enter Data" required max="10">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <strong>ชื่อ</strong>
                    <input type="text" name="fname" class="form-control" placeholder="Enter Data" required maxlength="50">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <strong>นามสกุล</strong>
                    <input type="text" name="lname" class="form-control" placeholder="Enter Data" required maxlength="50">
                </div>
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-success my-3">เพิ่ม</button>
            </div>

        </div>
    </form>


@endsection