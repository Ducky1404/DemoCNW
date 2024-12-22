@extends('welcome')

@section('title', 'Chi tiet sach')
@section('main')
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Book Details</h4>
            </div>
            <div class="card-body">
                <!-- Hiển thị thông tin sách -->
                <div class="mb-3">
                    <label for="title" class="form-label"><strong>Title:</strong></label>
                    <p id="title" class="form-control-plaintext">{{ $books->name }}</p>
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label"><strong>Author:</strong></label>
                    <p id="author" class="form-control-plaintext">{{ $books->author }}</p>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label"><strong>Category:</strong></label>
                    <p id="description" class="form-control-plaintext">{{ $books->category }}</p>
                </div>

                <div class="mb-3">
                    <label for="published_date" class="form-label"><strong>Update At:</strong></label>
                    <p id="published_date" class="form-control-plaintext">{{ $books->updated_at }}</p>
                </div>
            </div>
            <div class="card-footer">
                <!-- Nút Hành Động -->
                <a href="{{ route('books.edit', $books->id) }}" class="btn btn-warning">Sửa</a>
                <!-- Delete Button -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $books->id }}">
                    Xóa
                </button>
                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal{{ $books->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $books->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel{{ $books->id }}">XÁC NHẬN</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Bạn có chắc muốn xóa không?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                <form action="{{ route('books.destroy', ['book' => $books->id]) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Xác nhận</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('books.index') }}" class="btn btn-secondary">Quay lại</a>
            </div>
        </div>
    </div>
@endsection

