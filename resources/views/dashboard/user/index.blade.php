@extends('dashboard.layouts.master' , [
    'active_button' => null
])

@section('breadcrump')
    @include('dashboard.layouts.breadcrump', [
        'title' => 'Profile Page',
        'items' => [
            'Profie' => route('dashboard.team-members.index'),
            'Edit' => '#',
        ],
    ])
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('dashboard/css/team-members.css') }}">
@endpush


@section('content')
<div class="container">
    <div class="card " >
        <div class="card-body">
            <form action="{{ route('dashboard.update-profile') }}" method="POST" enctype="multipart/form-data" class="w-75 m-auto">
                @csrf
                @method('PUT')
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="input-group d-flex flex-column">
                            @if (auth()->user()->image)
                                <label for="image" class="preview-img">
                                    <img src="{{ asset('storage/' . auth()->user()->image ) }}" class="img-fluid uploaded-image">
                                </label>
                            @else
                                <label for="image" class="preview-img">
                                    <i class="fa fa-image icon fs-1"></i>
                                </label>
                            @endif
                            <b>Click Up To Change Your Profile Pic</b>
                            <input type="file" name="image" class="custom-file-input" id="image" style="opacity: 0" accept="image/*">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name' , auth()->user()->name)  }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ auth()->user()->email }}" disabled>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
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
            const img = `<img src="${url} " class="img-fluid uploaded-image" />`;
            $('.preview-img').html( img );
        });
    </script>
@endpush
