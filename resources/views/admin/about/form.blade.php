<div class="container-fluid px-4">
    <h1 class="mt-4">About</h1>

    <div class="row">
        @if(count($errors)>0)
        <ul class="alert alert-danger" style="padding-left: 50px;">
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
        <form method="post" action="{{route('about.update'),1}}">
            @csrf
            <div class="form-group">
                <label for="name">Description</label>
                <!-- <input type="text" value="{{$data_about->description??null}}" name="name" id="name" class="form-control" placeholder="Masukan Nama Kategori"> -->
                <textarea name="description" id="description" cols="30" rows="5" class="form-control" placeholder="description">{{$data_about->description??null}}</textarea>
            </div>
            <div class="form-group">
                <label for="name">Vision</label>
                <textarea name="vision" id="vision" cols="30" rows="5" class="form-control" placeholder="Vision">{{$data_about->vision??null}}</textarea>
            </div>
            <div class="form-group">
                <label for="name">Mission</label>
                <textarea name="mission" id="mission" cols="30" rows="5" class="form-control" placeholder="Vision">{{$data_about->mission??null}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ url()->previous() }}" style="color: red; font-weight: 400">Batal</a>
        </form>
    </div>