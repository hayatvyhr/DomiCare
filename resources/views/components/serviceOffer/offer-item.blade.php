<a href="{{ request()->segment(count(request()->segments())) }}/{{ $service->id_service }}"
    class="shadow-md border border-gray-700 rounded hover:shadow-lg hover:shadow-primary cursor-pointer hover:scale-105 transition-all ease-in-out flex flex-col justify-between items-center pt-3 group bg-purple-50 bg-opacity-40">
    <img src="/storage/partenaires/{{ $service->partenaire->image }}" height="130" width="130" alt="profile image"
        class=" h-[130px] object-cover rounded-full border-2 border-gray-800">
    <h2 class="font-bold text-2xl mt-2">{{ $service->partenaire->prenom }} {{ $service->partenaire->nom }}</h2>
    <h2 class="font-medium text-gray-800 text-lg">{{ $service->ville }}</h2>
    <div class="flex gap-4 mt-2">
        <div class="flex gap-2 items-center text-lg text-primary font-bold">
            <i class="fa-solid fa-clipboard-list"></i>
            <h2>{{ $service->nb_demandes }}</h2>
        </div>
        <div class="flex gap-2 items-center text-lg text-primary font-bold">
            <i class="fa-solid fa-comment"></i>
            <h2>{{ $service->nb_commentaires }}</h2>
        </div>
    </div>
    <p class="w-3/4 line-clamp-2 mt-1 text-center text-balance">
        {{ $service->description }}
    </p>

    <h2 class="font-bold text-[#ffbf00] color text-[40px] mt-2">${{ $service->prix_intervention }}</h2>
    <div class="flex items-center gap-1 text-[#FFBF00] text-[16px]">
        @for ($i = 0; $i < floor($service->rating); $i++)
            <i class="fa-solid fa-star"></i>
        @endfor
        @if ($service->rating - floor($service->rating) >= 0.299)
            <i class="fa-solid fa-star-half-stroke"></i>
        @else
            <i class="fa-regular fa-star"></i>
        @endif
        @for ($i = floor($service->rating) + 1; $i < 5; $i++)
            <i class="fa-regular fa-star"></i>
        @endfor
        <h2 class="text-gray-500 ml-1">({{ $service->rating }})</h2>
    </div>
    <h2
        class=" self-stretch bg-primary mt-5 text-white p-2 rounded-b group-hover:scale-[1.02] group-hover:translate-y-[-8px] group-hover:rounded-none group-hover:shadow-[0_2px_4px_#000] transition ease-in-out font-bold text-center text-[18px]">
        Réserver
        maintenant</h2>
</a>
