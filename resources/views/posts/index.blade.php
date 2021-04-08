@extends('posts.layout')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
@endsection

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


    <table id="example" class="table table-striped " style="width:100%">
        <thead class="table-dark">
            <tr>
                <th scope="col" width="5px">ลำดับ</th>
                <th scope="col" width="100px">รหัสนักศึกษา</th>
                <th scope="col" width="250px">ชื่อ</th>
                <th scope="col" width="250px">นามสกุล</th>
                <th scope="col" width="250px">ดำเนินการ</th>
            </tr>
        </thead>
        @foreach ( $data as $key => $value )
            <tr>
                <td>{{++$i}}</td>
                <td>{{$value->main_id}}</td>
                <td>{{Str::limit ($value->fname, 100) }}</td>
                <td>{{Str::limit ($value->lname, 100) }}</td>
                {{-- limit คื่อการโชว์ ตัวอักษร เเค่ 100  --}}
                <td>
                    <form action="{{ route('posts.destroy',$value->id) }}" method="post">
                        {{-- method คือการส่งข้อมูล เเบบต่างๆ เช่น post --}}
                        {{-- action ใช้ใน form นั้นหรอการกระทำ --}}
                        <a href="{{ route('posts.show',$value->id) }}" class="btn btn-primary">ดูข้อมูล</a>
                        <a href="{{ route('posts.edit',$value->id) }}" class="btn btn-warning">จัดการเกรด</a>
                        @csrf
                     
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>ลบ</button>
                            <!--Start Add Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">กรุณายืนยันการลบข้อมูล</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                    {{-- เนื้อหา Modal --}}
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ออก</button>
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">ลบ</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- End Add Modal  --}}
                    </form>
                </td>
            </tr>     
        @endforeach
    </table>
    @section('js')
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
        <script>
            $(document).ready(function() {
    $('#example').DataTable();
} );
        </script>
    @endsection
    {{-- {!! $data->links() !!} --}}
    {{-- links คื่อการใช้ฟังชั่นของ laravel App\Providers\AppServiceProvider  public function boot  Paginator::useBootstrap(); --}}
    
@endsection