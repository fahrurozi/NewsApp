@extends('template.app2')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Tambah Events</h1>

    <div class="row">
        @if(count($errors)>0)
        <ul class="alert alert-danger" style="padding-left: 50px;">
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
        <form method="post" action="{{route('events.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="judul">Event Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Masukan Judul Buku">
            </div>
            <div class="form-group">
                <label for="penulis">Description</label>
                <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="penulis">Date</label>
                <input type="text" name="date" id="date" class="date form-control" placeholder="masukan tanggal">
            </div>
            <div class="">
                <label for="foto">Poster</label>
                <input required type="file" class="form-control" name="image" id="foto">
                <img id="preview" style="height: 150px;width: 150px; display: none" />
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ url()->previous() }}" style="color: red; font-weight: 400">Batal</a>
        </form>
    </div>

    @endsection

    