@extends('template.app2')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Videos</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Videos</li>
    </ol>
    <div class="row">
        <div class="col-xl-4">
            <div style=" display: flex; justify-content: flex-start; padding-right: 50px"> <button class="btn btn-primary animation-on-hover" type="button"><a href="{{route('videos.create')}}" style="color: white;">Tambah Videos</a></button></div>
        </div>
        <div class="table-responsive ps">
            <table class="table tablesorter " id="">
                <thead class=" text-primary">
                    <tr>
                        <th>No</th>
                        <th style="width: 30%;">Name</th>
                        <th>Video</th>
                        <th style="width: 20%;" class="text-center">#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_videos as $item)
                    <tr>
                        <td>{{++$no}}</td>
                        <td>{{$item->name}}</td>
                        <td>
                            <video width="320" height="240" controls>
                                <source src="{{asset('videos/'.$item->video)}}" type="video/mp4">
                                <source src="{{asset('videos/'.$item->video)}}" type="video/ogg">
                                Your browser does not support the video tag.
                            </video>
                        </td>
                        <td style="text-align: center;"><button class="btn btn-info btn-sm"><a href="{{route('videos.edit', $item->id)}}" style="color: white; font-weight: 600">Edit</a></button>
                            <form action="{{route('videos.delete',$item->id)}}" method="post" style="display: inline;">
                                @csrf
                                <button class="btn btn-danger btn-sm" onclick="return confirm('yakin mau dihapus?')" style="color: white;">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

                <tr>
                    <td colspan="2"></td>
                    <td colspan="1">
                        <div></div>
                    </td>
                </tr>

            </table>

        </div>
    </div>
</div>
@endsection