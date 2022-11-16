@extends('admin.master.index')
@section('headerScript')
    <link href="{{asset('/admin/DataTables/datatables.css')}}" rel="stylesheet" />

@endsection

@section('content')
    <div class="col-12 shadow shadow-lg p-5">
        <table id="example" class="table-bordered table-hover table-striped display text-center" style="width:100%">
            <thead>
                <tr >
                    <th >#</th>
                    <th class="text-center">مشخصات</th>
                    <th class="text-center">ایمیل</th>
                    <th class="text-center">وضعیت</th>
                    <th class="text-center">ویرایش</th>
                    <th class="text-center">حذف</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->fname.' '.$item->lname}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->type}}</td>
                        <td>
                            <a href="/panel/user/{{$item->id}}/edit" class="btn btn-warning">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <form method="post" action="/panel/user/{{$item->id}}">
                                {{csrf_field()}}
                                {{method_field('PATCH')}}
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            <tfoot>
                <tr >
                    <th >#</th>
                    <th class="text-center">مشخصات</th>
                    <th class="text-center">ایمیل</th>
                    <th class="text-center">وضعیت</th>
                    <th class="text-center">ویرایش</th>
                    <th class="text-center">حذف</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection


@section('footerScript')
    <script src="{{asset('/admin/DataTables/datatables.js')}}" ></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
@endsection
