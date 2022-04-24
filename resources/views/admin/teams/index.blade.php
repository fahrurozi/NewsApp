@extends('template.app2')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Teams</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Teams</li>
    </ol>
    <div class="row">
        <div class="col-xl-4">
            <div style=" display: flex; justify-content: flex-start; padding-right: 50px"> <button class="btn btn-primary animation-on-hover" type="button"><a href="{{route('teams.create')}}" style="color: white;">Tambah Team</a></button></div>
        </div>
        <div class="table-responsive ps">
            <table class="table tablesorter " id="">
                <thead class=" text-primary">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Image</th>
                        <th style="width: 20%;" class="text-center">#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_teams as $item)
                    <tr>
                        <td>{{++$no}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->position}}</td>
                        <td><img src="{{asset('images/teams/'.$item->image)}}" style="width: 200px; height: 200px; object-fit: cover;" alt=""></td>
                        <td><button class="btn btn-info btn-sm"><a href="{{route('teams.edit',$item->id)}}" style="color: white; font-weight: 600">Edit</a></button>
                            <form action="{{route('teams.delete',$item->id)}}" method="post" style="display: inline;">
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
                        <div>{{$data_teams->links()}}</div>
                    </td>
                </tr>

            </table>

        </div>
    </div>
</div>
@endsection