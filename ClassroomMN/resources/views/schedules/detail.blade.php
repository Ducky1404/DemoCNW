@extends('welcome')

@section('title', 'Chi Tiết Lịch Học')
@section('main')
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Chi Tiết Lịch Học</h4>
            </div>
            <div class="card-body">

                <div class="mb-3">
                    <label for="title" class="form-label"><strong>Classroom ID:</strong></label>
                    <p id="title" class="form-control-plaintext">{{ $schedules->classroom_id }}</p>
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label"><strong>Tên môn học:</strong></label>
                    <p id="title" class="form-control-plaintext">{{ $schedules->course_name }}</p>
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label"><strong>Ngày học trong tuần:</strong></label>
                    <p id="author" class="form-control-plaintext">{{ $schedules->day_of_week }}</p>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label"><strong>Thời gian:</strong></label>
                    <p id="description" class="form-control-plaintext">{{ $schedules->time_slot  }}</p>
                </div>

            </div>
            <div class="card-footer">
                <!-- Nút Hành Động -->
                <a href="{{ route('schedules.edit', $schedules->id) }}" class="btn btn-warning">Sửa Lịch Học</a>
                <!-- Delete Button -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $schedules->id }}">
                    Xóa
                </button>
                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal{{ $schedules->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $schedules->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel{{ $schedules->id }}">XÁC NHẬN</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Bạn có chắc muốn xóa không?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                <form action="{{ route('schedules.destroy', ['schedule' => $schedules->id]) }}" method="POST" style="display:inline;">
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

