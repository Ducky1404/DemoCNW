@extends('welcome')

@section('title', 'Thêm Thông Tin Lịch Học')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Thêm Thông Tin Lịch Học</h1>
                <form id="editClassroomForm" action="{{ route('schedules.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="classroom_id" class="form-label">Classroom</label>
                        <select class="form-select" id="classroom_id" name="classroom_id" required>
                            <option value="" disabled selected>Chọn phòng học</option>
                            @foreach ($classrooms as $classroom)
                                <option value="{{ $classroom->id }}">
                                    {{ $classroom->room_number }} - {{ $classroom->building }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="course_name" class="form-label">Tên môn học</label>
                        <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Nhập tên môn học" required>
                    </div>

                    <div class="mb-3">
                        <label for="day_of_week" class="form-label">Ngày học trong tuần</label>
                        <select class="form-select" id="day_of_week" name="day_of_week" required>
                            <option value="" disabled selected>Chọn ngày học</option>
                            @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                <option value="{{ $day }}">{{ $day }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="time_slot" class="form-label">Thời gian</label>
                        <select class="form-select" id="time_slot" name="time_slot" required>
                            <option value="" disabled selected>Chọn khung giờ</option>
                            @foreach (['08:00 - 10:00', '10:00 - 12:00', '13:00 - 15:00', '15:00 - 17:00', '18:00 - 20:00'] as $slot)
                                <option value="{{ $slot }}">{{ $slot }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editClassroomModal">
                        Lưu
                    </button>
                    <!-- Edit Classroom Modal -->
                    <div class="modal fade" id="editClassroomModal" tabindex="-1" aria-labelledby="editClassroomModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editClassroomModalLabel">Xác nhận thêm</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Bạn có chắc muốn thêm thông tin lớp học này không?
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
