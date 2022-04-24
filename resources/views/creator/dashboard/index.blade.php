@extends('template.app2')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body text-center">Artikel Saya</div>
                <div class="card-footer d-flex align-items-center justify-content-center">
                    <h1>{{$total_article_by_user}}</h1>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body text-center">Like Saya</div>
                <div class="card-footer d-flex align-items-center justify-content-center">
                    <h1>{{$total_like_article_by_user}}</h1>
                </div>
            </div>
        </div>

        <br>
        <hr>
        <br>

        @if(Auth::check()&& Auth::user()->level =="admin")
        <h2>Admin Only</h2>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body text-center">Total Creator</div>
                <div class="card-footer d-flex align-items-center justify-content-center">
                    <h1>{{$total_creator}}</h1>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body text-center">Total Artikel</div>
                <div class="card-footer d-flex align-items-center justify-content-center">
                    <h1>{{$total_article}}</h1>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body text-center">Total Category</div>
                <div class="card-footer d-flex align-items-center justify-content-center">
                    <h1>{{$total_category}}</h1>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body text-center">Total Tags</div>
                <div class="card-footer d-flex align-items-center justify-content-center">
                    <h1>{{$total_tags}}</h1>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body text-center">Total Like</div>
                <div class="card-footer d-flex align-items-center justify-content-center">
                    <h1>{{$total_like}}</h1>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body text-center">Total Videos</div>
                <div class="card-footer d-flex align-items-center justify-content-center">
                    <h1>{{$total_videos}}</h1>
                </div>
            </div>
        </div>
        @endif




    </div>
</div>

@endsection