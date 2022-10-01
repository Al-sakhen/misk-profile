@extends('dashboard.layouts.master', [
    'active_button' => 'team',
])
@section('breadcrump')
    @include('dashboard.layouts.breadcrump', [
        'title' => 'Team Members',
        'items' => [
            'Team' => route('dashboard.team-members.index'),
        ],
    ])
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Team Members Table</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <a href="{{ route('dashboard.team-members.create') }}" class="btn btn-outline-success">Add New Member</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($team_members as $member)
                            <tr>
                                <td>{{$loop->iteration }}</td>
                                <td class="text-wrap">{{ $member->name }}</td>
                                <td class="text-wrap">{{ $member->position }}</td>
                                <td>
                                    @if ($member->image)
                                        <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}" class="img-thumbnail" width="70" height="70">
                                    @else
                                        <img src="{{ asset('images/default-user2.jpg') }}" class="img-thumbnail" height="70" width="70" alt="{{ $member->name }}">
                                    @endif
                                </td>
                                <td class="text-wrap">{{ $member->description }}</td>
                                <td class="d-flex">
                                    <button href="#" class="btn btn-sm btn-outline-danger mr-2 delete">
                                        Delete
                                        <form action="{{ route('dashboard.team-members.destroy' ,  $member->id ) }}" method="POST" class="delete-form">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </button>

                                    <a href="{{ route('dashboard.team-members.edit' , $member->id) }}" class="btn btn-outline-info mr-2">Update</a>
                                </td>
                            </tr>

                            @empty
                            <tr>
                                <td colspan="7" class="text-center">There Isn't Any Team Member Yet</td>
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
        $('.delete').on('click', function(e) {
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
