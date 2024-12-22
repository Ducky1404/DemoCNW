@extends('welcome')

@section('title', 'Them moi bai dang')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Them moi bai dang</h1>
                <form action="{{ route('posts.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Tieu de</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Noi dung</label>
                        <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="created_at" class="form-label">Ngay tao</label>
                        <input type="datetime-local" class="form-control" id="created_at" name="created_at" required>
                    </div>
                    <div class="mb-3">
                        <label for="updated_at" class="form-label">Ngay cap nhat</label>
                        <input type="datetime-local" class="form-control" id="updated_at" name="updated_at" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Luu</button>
                </form>
            </div>
        </div>
    </div>
@endsection
