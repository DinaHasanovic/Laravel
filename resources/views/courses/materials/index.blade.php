<x-layout>
        @foreach ($courseMaterials as $material)
            <div class="material">
                <h3>{{ $material->title }}</h3>
                <a href="{{ Storage::url($material->file_path) }}" download>Download Material</a>
            </div>
        @endforeach
</x-layout>
