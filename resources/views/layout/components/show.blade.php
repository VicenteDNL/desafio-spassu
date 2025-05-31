@php

    $even = [];
    $odd = [];
    $pos = 0;
    foreach ($data as $index => $item) {
        if ($pos % 2 === 0) {
            $even[$index] = $item;
        } else {
            $odd[$index] = $item;
        }
        $pos++;
    }

@endphp

<h5 class="mt-5">{{ $caption ?? null }}</h5>
<div class="card shadow-sm mb-5 mt-2">
    <div class="card-body m-4">
        <div class="row">
            <div class="col-12 col-md-6">
                @foreach ($even as $key => $item)
                    <div class="mt-3">
                        <div><small><strong> {{ $key }}</strong></small> </div>
                        <div>{!! $item !!}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-6">
                @foreach ($odd as $key => $item)
                    <div class="mt-3">
                        <div><small><strong> {{ $key }}</strong></small> </div>
                        <div>{!! $item !!}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
