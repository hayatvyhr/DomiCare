<a href="/search/{{ $service->intervention->category->nom }}/{{ $service->intervention->nom }}/{{ $service->id_service }}"
    class="flex items-center gap-2 mb-4 p-2 border border-gray-300 hover:shadow-md hover:border-primary cursor-pointer transition">
    <img src="/storage/partenaires/{{ $service->partenaire->image }}" alt="profile photo" width="80" height="80"
        class="h-[80px] object-cover rounded-xl border border-gray-200">
    <div class="flex flex-col items-start">
        {{-- <h2 class="font-bold">{{ $service->intervention->nom }}</h2> --}}
        <h2 class="font-bold">{{ $service->partenaire->prenom }} {{ $service->partenaire->nom }}</h2>
        <h2 class="text-gray-400">{{ $service->ville }}</h2>
        <div class="flex gap-4">
            <div class="flex gap-2 items-center text-primary text-opacity-85 font-bold">
                <i class="fa-solid fa-clipboard-list"></i>
                <h2>{{ $service->demandes->count() }}</h2>
            </div>
            <div class="flex gap-2 items-center text-primary text-opacity-85 font-bold">
                <i class="fa-solid fa-comment"></i>
                <h2>{{ $service->commentaires->count() }}</h2>
            </div>
        </div>
        <div class="flex items-center gap-1 text-[#FFBF00] text-[13px]">
            @for ($i = 0; $i < floor($rating = $service->commentaires->count() != 0 ? $service->commentaires->sum('rating') / $service->commentaires->count() : 0); $i++)
                <i class="fa-solid fa-star"></i>
            @endfor
            @if ($rating - floor($rating) >= 0.299)
                <i class="fa-solid fa-star-half-stroke"></i>
            @else
                <i class="fa-regular fa-star"></i>
            @endif
            @for ($i = floor($rating) + 1; $i < 5; $i++)
                <i class="fa-regular fa-star"></i>
            @endfor
            <h2 class="text-gray-500 ml-1">({{ number_format($rating, 2, '.', ',') }})</h2>
        </div>
    </div>
</a>
