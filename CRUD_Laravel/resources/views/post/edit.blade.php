@extends('welcome')

@section('title', 'Sua bai dang')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Sua bai dang</h1>
                <form action="{{ route('posts.update', ['post' => $post->post_id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Tieu de</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Noi dung</label>
                        <textarea class="form-control" id="content" name="content" rows="3" required>{{ $post->content }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="updated_at" class="form-label">Ngay cap nhat</label>
                        <input type="datetime-local" class="form-control" id="updated_at" name="updated_at" value="{{ $post->updated_at->format('Y-m-d\TH:i') }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Cap nhat</button>
                </form>
            </div>
        </div>
    </div>
@endsection
