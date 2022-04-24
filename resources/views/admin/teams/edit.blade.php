@extends('template.app2')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Tambah Article</h1>

    <div class="row">
        @if(count($errors)>0)
        <ul class="alert alert-danger"  style="padding-left: 50px;">
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
        <form method="post" action="{{route('teams.update',$team->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="judul">Name</label>
                <input type="text" name="name" value="{{$team->name}}" id="name" class="form-control" placeholder="Masukan Nama Lengkap">
            </div>
            <div class="form-group">
                <label for="penulis">Position</label>
                <input type="text" name="position" value="{{$team->position}}" id="position" class="form-control" placeholder="Masukan Posisi">
            </div>
            <div class="">
                <label for="foto">Image</label>
                <input required type="file" class="form-control" name="image" id="foto">
                <img id="preview" style="height: 150px;width: 150px; display: none" />
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ url()->previous() }}" style="color: red; font-weight: 400">Batal</a>
        </form>
    </div>

    @endsection