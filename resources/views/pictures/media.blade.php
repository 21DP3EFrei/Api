@if ($pictures->isEmpty())
<div class="mb-3">
    <h1 class="text-white text-4xl font-bold text-center">No media here yet...</h1>
</div>
@else
<div class="row mt-3">
        @foreach($pictures as $picture)
            <div class="col-md-3 mb-3">
                <div class="card h-80">
                    <a href="{{ route('pictures.show', $picture) }}">
                        <img src="{{ asset('storage/' . $picture->Fails) }}" class="card-img-top object-contain w-full h-60" alt="{{ $picture->Nosaukums }}">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $picture->Nosaukums }}</h5>
                        <p class="card-text text-gray-500">{{ $picture->Apraksts }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
