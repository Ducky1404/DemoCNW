@extends('welcome')

@section('title', 'Quản Lý Lịch Học')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Quản lý lịch học</h1>
                <a style="margin-bottom: 20px" href="{{ route('schedules.create') }}" class="btn btn-primary">Thêm Lịch Học</a>
                <table class="table">
                    <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Mã Phòng Học</th>
                        <th scope="col">Tên Môn Học</th>
                        <th scope="col">Ngày học trong tuần</th>
                        <th scope="col">Thời gian</th>
                        <th scope="col">Hành Động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($schedules as $schedule)
                        <tr>
                            <th scope="row">{{ $schedule->id }}</th>
                            <td>{{ $schedule->classroom_id }}</td>
                            <td>{{ $schedule->course_name }}</td>
                            <td>{{ $schedule->day_of_week }}</td>
                            <td>{{ $schedule->time_slot }}</td>
                            <td>
                                <a href="{{ route('schedules.detail',['schedule' => $schedule->id]) }}" class="btn btn-success"><i class="fa-solid fa-eye"></i></a>
                                <a href="{{ route('schedules.edit', ['schedule' => $schedule->id]) }}" class="btn btn-warning"><i class="fa-solid fa-pen"></i></a>

                                <!-- Delete Button -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $schedule->id }}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteModal{{ $schedule->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $schedule->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $schedule->id }}">Xác Nhận Xóa</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Bạn có chắc muốn xóa?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                <form action="{{ route('schedules.destroy', ['schedule' => $schedule->id]) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Xác Nhận</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $schedules->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
