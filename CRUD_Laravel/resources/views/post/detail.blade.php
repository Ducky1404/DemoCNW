@extends('welcome')

@section('title', 'Chi tiet bai dang')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Chi tiet bai dang</h1>
                <div class="mb-3">
                    <label class="form-label">Tieu de</label>
                    <p>{{ $post->title }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label">Noi dung</label>
                    <p>{{ $post->content }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label">Ngay tao</label>
                    <p>{{ $post->created_at }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label">Ngay cap nhat</label>
                    <p>{{ $post->updated_at }}</p>
                </div>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Quay lai</a>
            </div>
        </div>
    </div>
@endsection
