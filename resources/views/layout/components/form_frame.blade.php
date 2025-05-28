<h5 class="mt-5">{{ $caption ?? null }}</h5>
<div class="card shadow-sm mt-2">
    <div class="card-body m-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @yield('form')
    </div>
</div>
