@extends('welcome')

@section('title', 'Sửa thông tin lớp học')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Sửa thông tin lớp học</h1>
                <form id="editClassroomForm" action="{{ route('classrooms.update', ['classroom' => $classroom->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="room_number" class="form-label">Phòng học</label>
                        <input type="text" class="form-control" id="room_number" name="room_number" value="{{ $classroom->room_number }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="capacity" class="form-label">Sức chứa</label>
                        <input type="number" class="form-control" id="capacity" name="capacity" value="{{ $classroom->capacity }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="building" class="form-label">Tòa nhà</label>
                        <input type="text" class="form-control" id="building" name="building" value="{{ $classroom->building }}" required>
                    </div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editClassroomModal">
                        Lưu
                    </button>
                    <!-- Edit Classroom Modal -->
                    <div class="modal fade" id="editClassroomModal" tabindex="-1" aria-labelledby="editClassroomModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editClassroomModalLabel">Xác nhận cập nhật</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Bạn có chắc muốn cập nhật thông tin lớp học này không?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                    <button type="button" class="btn btn-primary" onclick="document.getElementById('editClassroomForm').submit();">Xác nhận</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
