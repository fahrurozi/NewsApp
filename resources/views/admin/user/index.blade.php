@extends('template.app2')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Users</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Users</li>
    </ol>
    <div class="row">
        <div class="col-xl-4">
            <div style=" display: flex; justify-content: flex-start; padding-right: 50px"> <button class="btn btn-primary animation-on-hover" type="button"><a href="{{route('users.create')}}" style="color: white;">Tambah User</a></button></div>
        </div>
        <div class="table-responsive ps">
            <table class="table tablesorter " id="">
                <thead class=" text-primary">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th style="width: 20%;" class="text-center">#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_users as $item)
                    <tr>
                        <td>{{++$no}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->level}}</td>
                        <td class="d-flex justify-content-center"><button class="btn btn-info btn-sm"><a href="{{route('users.edit', $item->id)}}" style="color: white; font-weight: 600">Edit</a></button>
                            <form action="{{route('users.delete',$item->id)}}" method="post" style="display: inline;">
                                @csrf
                                <button class="btn btn-danger btn-sm" onclick="return confirm('yakin mau dihapus?')" style="color: white;">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

                <tr>
                    <td colspan="4"></td>
                    <td colspan="1">
                        <div>{{$data_users->links()}}</div>
                    </td>
                </tr>

            </table>

        </div>
    </div>
</div>
@endsection