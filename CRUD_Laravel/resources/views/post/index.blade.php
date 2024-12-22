@extends('welcome')

@section('title', 'Quan ly bai dang')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Quan ly bai dang</h1>
                <a href="{{ route('posts.create') }}" class="btn btn-primary">Them moi</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tieu de</th>
                            <th scope="col">Noi dung</th>
                            <th scope="col">Ngay tao</th>
                            <th scope="col">Ngay cap nhat</th>
                            <th scope="col">Hanh dong</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <th scope="row">{{ $post->post_id }}</th>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->content }}</td>
                                <td>{{ $post->created_at }}</td>
                                <td>{{ $post->updated_at }}</td>
                                <td>
                                    <a href="{{ route('posts.edit', ['post' => $post->post_id]) }}" class="btn btn-warning">Sua</a>
                                    <form action="{{ route('posts.destroy', ['post' => $post->post_id]) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Xoa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $posts->links('vendor.pagination.custom-pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection
