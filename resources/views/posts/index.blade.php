@extends('posts.layout')

@section('content')
    <div class="row mt-5">
        <div class="col-md-12">
            <h2>Students Laravel 8 CRUD</h2>
            <a href="{{ route('posts.create') }}" class="btn btn-success my-3" >เพิ่มรายการนักศึกษา</a>
        </div> 
    </div>

    @if($message = Session::get('success'))
       <div class= "alert alert-success">
           {{ $message }}
       </div>
    @elseif($message = Session::get('error'))
       <div class= "alert alert-danger">
           {{ $message }}
       </div>
    @endif


    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th width="5px">ลำดับ</th>
                <th width="100px">รหัสนักศึกษา</th>
                <th width="250px">ชื่อ</th>
                <th width="250px">นามสกุล</th>
                <th width="250px">ดำเนินการ</th>
            </tr>
        </thead>
        @foreach ( $data as $key => $value )
            <tr>
                <td>{{++$i}}</td>
                <td>{{$value->main_id}}</td>
                <td>{{Str::limit ($value->fname, 100) }}</td>
                <td>{{Str::limit ($value->lname, 100) }}</td>
                <td>
                    <form action="{{ route('posts.destroy',$value->id) }}" method="post">
                        <a href="{{ route('posts.show',$value->id) }}" class="btn btn-primary">ดูข้อมูล</a>
                        <a href="{{ route('posts.edit',$value->id) }}" class="btn btn-warning">จัดการเกรด</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                          </svg>ลบ</button>
                    </form>
                </td>
            </tr>     
        @endforeach


    </table>

    {!! $data->links() !!}
    
@endsection