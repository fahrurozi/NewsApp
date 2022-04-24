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
        <form method="post" action="{{route('article.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="judul">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Masukan Judul Buku">
            </div>
            <div class="form-group">
                <label for="penulis">Content</label>
                <textarea name="content" id="content" class="form-control" cols="30" rows="20"></textarea>
            </div>
            <div class="form-group">
                <label for="harga">Category</label>
                <!-- <input type="text" name="category" id="category" class="form-control" placeholder="category"> -->
                <select class="form-control" name="category">
                    <option value="" disabled selected>Pilih Kategori</option>
                    @foreach($data_category as $category)
                    <option value="{{$category->name}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="harga">Tags</label>
                <!-- <input type="text" name="tags" id="tags" class="form-control" placeholder="tags"> -->

                <select class="form-control" id="tags" name="tags[]" multiple>
                    @foreach($data_tags as $tag)
                    <option value="{{$tag->name}}">{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="">
                <label for="foto">Cover</label>
                <input required type="file" class="form-control" name="image" id="foto">
                <img id="preview" style="height: 150px;width: 150px; display: none" />
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ url()->previous() }}" style="color: red; font-weight: 400">Batal</a>
        </form>
    </div>

    @endsection

    @section('js')
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
        };

        CKEDITOR.editorConfig = function(config) {
            config.removePlugins = 'resize';
        };

        CKEDITOR.replace('content', options);
    </script>
    @endsection