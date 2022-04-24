@extends('template.app2')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Article</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Article</li>
    </ol>
    <div class="row">
        <div class="col-xl-4">
        <div class="col-md-4" style=" display: flex; justify-content: flex-end; padding-right: 50px"> <button class="btn btn-primary animation-on-hover" type="button"><a href="{{route('article.create')}}" style="color: white;">Tambah Buku</a></button></div>
        </div>
        <div class="table-responsive ps">
            <table class="table tablesorter " id="">
                <thead class=" text-primary">
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th style="width: 40%;">Content</th>
                        <th>Image</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Tags</th>
                        <th>date</th>
                        <th style="width: 10%;" class="text-center">#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_article as $item)
                    <tr>
                        <td>{{++$no}}</td>
                        <td>{{$item->title}}</td>
                        <!-- <td>{!! \Illuminate\Support\Str::limit($item->content, 450, $end='...') !!}</td> -->
                        <td>{{ \Illuminate\Support\Str::limit(strip_tags(html_entity_decode($item->content)), 450, $end='...') }}</td>
                        <td><img src="{{asset('thumb/'.$item->image)}}" alt=""></td>
                        <td>{{$item->users->name}}</td>
                        <td>{{$item->category}}</td>
                        <td>{{$item->tags}}</td>
                        <td>{{$item->updated_at}}</td>
                        <td class="align-middle text-center"><button class="btn btn-info btn-sm"><a href="{{route('article.edit',$item->id)}}" style="color: white; font-weight: 600">Edit</a></button>
                            <form action="{{route('article.delete', $item->id)}}" method="post" style="display: inline;">
                                @csrf
                                <button class="btn btn-danger btn-sm" onclick="return confirm('yakin mau dihapus?')" style="color: white;">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

                <tr>
                    <td colspan="6"></td>
                    <td colspan="1">
                        <div>{{$data_article->links()}}</div>
                    </td>
                </tr>

            </table>

        </div>
    </div>
</div>

@endsection