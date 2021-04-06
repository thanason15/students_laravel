@extends('posts.layout')

@section('content')

    <div class="contaiher">
        <div class="row mt-5">
            <div class="col-md-12">
                <h2>ขัอมูลนักศึกษา</h2>
                <a href="{{ route('posts.index') }}" class="btn btn-primary my-3">กลับ</a>
            </div>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <strong class="input-group-text">รหัสนักศึกษา</strong>
            </div>
            <div class="form-control">{{ $post->main_id }}</div>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <strong class="input-group-text">ชื่อ</strong>
            </div>
            <div class="form-control">{{ $post->fname }}</div>
            
            <div class="input-group-prepend">
                <strong class="input-group-text">นามสกุล</strong>
            </div>
            <div class="form-control">{{ $post->lname }}</div>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <strong class="input-group-text">รายวิชา</strong>
            </div>
            <div class="form-control">
                @if ($post->subject == 1)
                    ภาษาไทย
                @elseif ($post->subject == 2)
                    ภาษาอังกฤษ
                @elseif ($post->subject == 3)
                    คณิตศาสตร์
                @elseif ($post->subject == 4)
                    วืทยาศาสตร์
                @elseif ($post->subject == 5)
                    สังคมศาสตร์ 
                @else
                    -
                @endif
            </div>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <strong class="input-group-text">คะเเนน</strong>
            </div>
            <div class="form-control">{{ $post->score }}</div>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <strong class="input-group-text">เกรด</strong>
            </div>
            <div class="form-control">{{ $post->grade }}</div>
        </div>
    </div>   

   
     
@endsection