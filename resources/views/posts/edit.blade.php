@extends('posts.layout')

@section('content')
    <div class="row mt-5">
        <div class="col-md-12">
            <h2>จัดการเกรด</h2>
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


<form action="{{ route('posts.update', $post->id) }}" method="post">
    @csrf
    @method('PUT')

    <div class="row">
        
        <div class="col-md-12">
            <div class="form-group">
                <strong>รหัสนักศึกษา</strong>
                <input type="text" name="main_id" value="{{ $post->main_id }}" class="form-control" placeholder="Enter Data" readonly>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>ชื่อ</strong>
                <input type="text" name="fname" value="{{ $post->fname }}" class="form-control" placeholder="Enter Data" readonly>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>นามสกุล</strong>
                <input type="text" name="lname" value="{{ $post->lname }}" class="form-control" placeholder="Enter Data" readonly >
            </div>
        </div>


            <div class="form-group">
                <strong>รายวิชา</strong>
                <select class="form-select"  name="subject"  value="{{ $post->subject }}" required>
              
                <option value=''>---กรุณาเลือก---</option>
                <option value='1' {{$post->subject == 1 ? 'selected' : '' }}>ภาษาไทย</option>
                <option value='2' {{$post->subject == 2 ? 'selected' : '' }}>ภาษาอังกฤษ</option>
                <option value='3' {{$post->subject == 3 ? 'selected' : '' }}>คณิตศาสตร์</option>
                <option value='4' {{$post->subject == 4 ? 'selected' : '' }}>วิทยาศาสตร์</option>
                <option value='5' {{$post->subject == 5 ? 'selected' : '' }}>สังคมศาสตร์</option>
                </select>
            </div>

            <div class="form-inline">
                <strong class="input-group-text">คะเเนน</strong>
                <input type="number" class="form-control" placeholder="Enter Data" name='score' id='score' value="{{ $post->score }}" required>
                <strong class="input-group-text ms-3">เกรด</strong>
                <input type="text" class="form-control" placeholder="Enter Data" name='grade' id='grade' value="{{ $post->grade }}" readonly>
                <div class="form-check">
                </div>
                <button  onclick="myFunction()" type="button"  class="btn btn-primary">คำนาณ</button>
            </div>

        <div class="col-md-12">
            <button type="submit" class="btn btn-success my-3" id='dtn_submit' >เพิ่ม</button>
        </div>
    </div>
</form>

<script>
document.getElementById("dtn_submit").disabled = true;
//เอา id จาก dtn_submit เเล้วปิดปุ่ม เมื่อรันหน้านี้

function myFunction() {
//กด myFunction เเล้วเข้า function

  var namber = document.getElementById("score").value;
// เอา id input เเล้วมาเก็บไว้ที่ namber

if(namber==''){
   alert('กรุณากรอกข้อมูลคะเเนน');
   document.getElementById("dtn_submit").disabled = true;
   //เอา id dtn_submit ไม่มีค่า เเล้วปิดปุ่ม
}else{
    if(namber>=80){
        greeting = "A";
    }else if (namber >=75) {
        greeting = "B+";
    }else if (namber >= 70) {
        greeting = "B";
    }else if (namber >= 65) {
        greeting = "C+";
    }else if (namber >= 60) {
        greeting = "C";
    }else if (namber >= 55) {
        greeting = "D+";
    }else if (namber >= 50) {
        greeting = "D";
    }else if (namber <= 49) {
        greeting = "ไม่ผ่าน";
    }
    document.getElementById("grade").value = greeting
    //เอา greeting ไปเข้า id grade

    document.getElementById("dtn_submit").disabled = false;
    //เอา id dtn_submit มีค่า เเล้วเปิด
}


}

</script>

<style>

#score{
    background-color: #87CEFA;
    opacity: 1.0;
    /* border:8px solid #e6d45a;  */
}
#grade{
    background-color: #FFB6C1;
    opacity: 1.0;
}

</style>

@endsection