@extends('welcome')

@section('title', 'Sửa Thông Tin sách')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Sửa thông tin sách</h1>
                <form id="editBookForm" action="{{ route('books.update', ['book' => $books->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên Sách</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $books->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label">Tác Giả</label>
                        <input type="text" class="form-control" id="author" name="author" value="{{ $books->author }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Thể Loại</label>
                        <input type="text" class="form-control" id="category" name="category" value="{{ $books->category }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="year" class="form-label">Năm Xuất Bản</label>
                        <input type="number" class="form-control" id="year" name="year" value="{{ $books->year }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Số Lượng</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $books->quantity }}" required>
                    </div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editBookModal">
                        Lưu
                    </button>
                    <!-- Edit Book Modal -->
                    <div class="modal fade" id="editBookModal" tabindex="-1" aria-labelledby="editBookModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editBookModalLabel">Confirm Update</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to update this book?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary" onclick="document.getElementById('editBookForm').submit();">Confirm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
