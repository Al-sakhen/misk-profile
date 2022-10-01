@extends('dashboard.layouts.master', [
    'active_button' => 'team',
])

@section('breadcrump')
    @include('dashboard.layouts.breadcrump', [
        'title' => 'Team',
        'items' => [
            'Team Members' => route('dashboard.team-members.index'),
            'Create' => '#',
        ],
    ])
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('dashboard/css/team-members.css') }}">
@endpush

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Add new member</h3>
                </div>
                <form action="{{ route('dashboard.team-members.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="form-control" name="name" placeholder="Enter new member name" value="{{ old('name') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="position">Position</label>
                                    <input type="text" id="position" class="form-control" name="position" placeholder="Enter new member position" value="{{ old('position') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" placeholder="Enter small description about the new member" maxlength="200"  >{{ old('description') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Image</label>
                            <div class="input-group">
                                <label for="image" class="preview-img">
                                    <i class="fa fa-image icon fs-1"></i>
                                </label>
                                <input type="file" name="image" class="custom-file-input" id="image" style="opacity: 0" accept="image/*">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Add Member</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#image').on('change', function(e) {
            const file = e.target.files[0];
            const url = URL.createObjectURL(file);
            const img = '<img src="'+ url +'" class="img-fluid uploaded-image" />';
            $('.preview-img').html( img );
        });
    </script>
@endpush

