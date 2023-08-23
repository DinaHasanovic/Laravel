<x-layout>
    <link rel="stylesheet" href="{{ asset('css/materialCart.css') }}">
    <div class="material-cart_container">
        <div class="material-cart">
            @if (!empty($courseMaterials))
                @foreach ($courseMaterials as $material)
                    <div class="material">
                        <h3>{{ $material->title }}</h3>
                        <h2><i class="fa-solid fa-folder-open" style="font-size: 45px"></i></h2>
                        <a href="{{ Storage::url($material->file_path) }}" download><i class="fa-solid fa-file-arrow-down"></i> Download Material</a>
                    </div>
                @endforeach
            @else
                <p class="no-materials">No materials found for this course</p>
            @endif
        </div>
    </div>
</x-layout>
