@extends('welcome')

@section('title', 'Chi Tiết Phòng Học')
@section('main')
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Chi Tiết Phòng Học</h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="title" class="form-label"><strong>Phòng học:</strong></label>
                    <p id="title" class="form-control-plaintext">{{ $classrooms->room_number }}</p>
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label"><strong>Sức chứa:</strong></label>
                    <p id="author" class="form-control-plaintext">{{ $classrooms->capacity }}</p>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label"><strong>Tòa Nhà:</strong></label>
                    <p id="description" class="form-control-plaintext">{{ $classrooms->building }}</p>
                </div>
            </div>
            <div class="card-footer">
                <!-- Nút Hành Động -->
                <a href="{{ route('classrooms.edit', $classrooms->id) }}" class="btn btn-warning">Sửa Thông Tin</a>
                <!-- Delete Button -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $classrooms->id }}">
                    Xóa
                </button>
                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal{{ $classrooms->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $classrooms->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel{{ $classrooms->id }}">XÁC NHẬN</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Bạn có chắc muốn xóa không?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                <form action="{{ route('classrooms.destroy', ['classroom' => $classrooms->id]) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Xác nhận</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('classrooms.index') }}" class="btn btn-secondary">Quay lại</a>
            </div>
        </div>
    </div>
@endsection

