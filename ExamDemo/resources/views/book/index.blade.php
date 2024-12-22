@extends('welcome')

@section('title', 'Quan Ly Sach')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Quan Ly Sach</h1>
                <a href="{{ route('books.create') }}" class="btn btn-primary">Them moi</a>
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Ten sach</th>
                            <th scope="col">Tac gia</th>
                            <th scope="col">The loai</th>
                            <th scope="col">Nam xuat ban</th>
                            <th scope="col">So luong</th>
                            <th scope="col">Ngay cap nhat</th>
                            <th scope="col">Hanh dong</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($books as $book)
                        <tr>
                            <th scope="row">{{ $book->id }}</th>
                            <td>{{ $book->name }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->category }}</td>
                            <td>{{ $book->year }}</td>
                            <td>{{ $book->quantity }}</td>
                            <td>{{ $book->updated_at }}</td>

                            <td>
                                <a href="{{ route('books.detail',['book' => $book->id]) }}" class="btn btn-success"><i class="fa-solid fa-eye"></i></a>
                                <a href="{{ route('books.edit', ['book' => $book->id]) }}" class="btn btn-warning"><i class="fa-solid fa-pen"></i></a>

                                <!-- Delete Button -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $book->id }}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteModal{{ $book->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $book->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $book->id }}">Confirm Deletion</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this book?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <form action="{{ route('books.destroy', ['book' => $book->id]) }}" method="POST" style="display:inline;">
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
                    {{$books->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>
    </div>
@endsection
