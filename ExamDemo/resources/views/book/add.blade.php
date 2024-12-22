@extends('welcome')

@section('title', 'Them moi sach')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Them moi sach</h1>
                <form action="{{ route('books.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Ten sach</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label">Tac gia</label>
                        <input type="text" class="form-control" id="author" name="author" required>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">The loai</label>
                        <input type="text" class="form-control" id="category" name="category" required>
                    </div>
                    <div class="mb-3">
                        <label for="year" class="form-label">Nam xuat ban</label>
                        <input type="number" class="form-control" id="year" name="year" required>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">So luong</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
