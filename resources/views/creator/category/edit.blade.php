@extends('template.app2')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Category</h1>

    <div class="row">
        @if(count($errors)>0)
        <ul class="alert alert-danger"  style="padding-left: 50px;">
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
        <form method="post" action="{{route('category.update',$data_category->id)}}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" value={{$data_category->name}} name="name" id="name" class="form-control" placeholder="Masukan Nama Kategori">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ url()->previous() }}" style="color: red; font-weight: 400">Batal</a>
        </form>
    </div>

    @endsection