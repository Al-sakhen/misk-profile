<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ $title }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    @foreach ($items as $item => $link )
                        @if (!$loop->last)
                            <li class="breadcrumb-item"><a href="{{ $link }}">{{ $item }}</a></li>
                        @else
                            <li class="breadcrumb-item active">{{ $item }}</li>
                        @endif
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</div>
