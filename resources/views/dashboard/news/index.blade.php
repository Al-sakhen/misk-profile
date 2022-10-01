@extends('dashboard.layouts.master', [
    'active_button' => 'news',
])
@section('breadcrump')
    @include('dashboard.layouts.breadcrump', [
        'title' => 'News',
        'items' => [
            'News' => route('dashboard.news.index'),
        ],
    ])
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">News Table</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <a href="{{ route('dashboard.news.create') }}" class="btn btn-outline-success">Create News</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($news as $new)
                            <tr>
                                <td>{{$loop->iteration }}</td>
                                <td class="text-wrap">{{ $new->title }}</td>
                                <td>
                                    <img src="{{ asset('storage/'.$new->image) }}" class="img-thumbnail" height="60" width="100" alt="accountig news">
                                </td>
                                <td class="d-flex">
                                    <button href="#" class="btn btn-sm btn-outline-danger mr-2 delete-news">
                                        Delete
                                        <form action="{{ route('dashboard.news.destroy' ,  $new->id ) }}" method="POST" class="delete-form">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </button>

                                    <a href="{{ route('dashboard.news.edit' , $new->id) }}" class="btn btn-outline-info mr-2">Update</a>
                                </td>
                            </tr>

                            @empty
                            <tr>
                                <td colspan="4" class="text-center">There Isn't Any News Yet</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('.delete-news').on('click', function(e) {
            var newsId = $(this).data('newsid');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).find('.delete-form').submit();
                }
            })
        })
    </script>
@endpush
