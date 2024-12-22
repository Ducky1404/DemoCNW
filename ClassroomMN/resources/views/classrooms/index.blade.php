@extends('welcome')

@section('title', 'Quản Lý Lớp Học')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Quản lý lớp học</h1>
                <a style="margin-bottom: 20px" href="{{ route('classrooms.create') }}" class="btn btn-primary">Thêm Phòng Học</a>
                <table class="table">
                    <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Phòng Học</th>
                        <th scope="col">Sức Chứa</th>
                        <th scope="col">Tòa Nhà</th>
                        <th scope="col">Hành Động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($classrooms as $classroom)
                        <tr>
                            <th scope="row">{{ $classroom->id }}</th>
                            <td>{{ $classroom->room_number }}</td>
                            <td>{{ $classroom->capacity }}</td>
                            <td>{{ $classroom->building }}</td>
                            <td>
                                <a href="{{ route('classrooms.detail',['classroom' => $classroom->id]) }}" class="btn btn-success"><i class="fa-solid fa-eye"></i></a>
                                <a href="{{ route('classrooms.edit', ['classroom' => $classroom->id]) }}" class="btn btn-warning"><i class="fa-solid fa-pen"></i></a>

                                <!-- Delete Button -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $classroom->id }}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteModal{{ $classroom->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $classroom->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $classroom->id }}">Confirm Deletion</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this book?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <form action="{{ route('classrooms.destroy', ['classroom' => $classroom->id]) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
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
                    {{ $classrooms->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
