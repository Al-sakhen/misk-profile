@if ( $errors->any() )
    @foreach ($errors->all() as $error)
        <div class="alert alert-message alert-danger">
            <p class="m-0">
                <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                {{ $error }}
            </p>
        </div>
    @endforeach
@endif

@if (session()->has('status'))
    <div class="alert alert-message alert-{{ session('status') }}">
        <p class="m-0">
            @php $icons = ['success' => 'check', 'danger' => 'exclamation-circle']; @endphp
            <i class="fa fa-{{ $icons[session('status')] }}" aria-hidden="true"></i>
            {{ session('message') }}
        </p>
    </div>
@endif

