@extends('dashboard.layouts.master', [
    'active_button' => 'news',
])

@section('breadcrump')
    @include('dashboard.layouts.breadcrump', [
        'title' => 'News',
        'items' => [
            'News' => route('dashboard.news.index'),
            'Create' => '#',
        ],
    ])
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('dashboard/css/news.css') }}">
@endpush



@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Add new news</h3>
                </div>
                <form action="{{ route('dashboard.news.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Title</label>
                            <textarea name="title" class="form-control">{{ old('title') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Image</label>
                            <div class="input-group">
                                <label for="image" class="preview-img">
                                    Select Image
                                </label>
                                <input type="file" name="image" class="custom-file-input" id="image" style="opacity: 0" accept="image/*">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('dashboard/js/news.js') }}"></script>
@endpush
