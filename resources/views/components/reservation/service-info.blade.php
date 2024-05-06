<div class="flex md:flex-row flex-col gap-4 items-center">
    <img src="/storage/partenaires/{{ $service->partenaire->image }}" alt="image" width="150" height="150"
        class="rounded-full h-[150px] object-cover border border-gray-300">
    <div class="flex md:flex-row flex-col justify-between items-center w-full">
        <div class="flex flex-col md:items-baseline items-center gap-[2px] md:mt-0 mt-4 ">
            <div class="flex gap-3">
                <h2 class="text-primary bg-purple-100 rounded-full py-1 px-3 font-medium">
                    {{ Str::ucfirst($service->intervention->category->nom) }}</h2>
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
            </div>
            <h2 class="md:text-[40px] text-[28px] font-bold">{{ $service->intervention->nom }} </h2>
            <div class="flex gap-4">
                <div class="flex gap-2 items-center text-lg text-primary font-bold">
                    <i class="fa-solid fa-clipboard-list"></i>
                    <h2>{{ $service->nb_demandes }}</h2>
                </div>
                <div class="flex gap-2 items-center text-lg text-primary font-bold">
                    <i class="fa-solid fa-comment"></i>
                    <h2>{{ $service->nb_commentaires }}</h2>
                </div>
            </div>
            <h2 class="flex gap-3 text-lg text-gray-500 items-center"><i
                    class="fa-solid fa-location-dot"></i>{{ $service->ville }}</h2>
            <h2 class="flex gap-2 text-lg text-gray-500 items-center"><i
                    class="fa-solid fa-envelope"></i>{{ $service->partenaire->email }}</h2>
        </div>
        <div class="flex flex-col md:self-end items-center md:gap-3 gap-2 md:items-end md:mt-0 mt-2">
            <div class="flex">
                <h2 class="font-bold text-[#ffbf00] color text-[55px]">$ {{ $service->prix_intervention }}
                </h2>
                {{-- <button
                    class="bg-primary text-white py-2 px-3 rounded hover:bg-[#7C3AED] transition ease-in-out  md:inline hidden"><i
                        class="fa-solid fa-bookmark"></i></button> --}}
            </div>
            <h2 class="flex gap-2 md:text-xl text-lg text-primary items-center"><i
                    class="fa-solid fa-user"></i>{{ $service->partenaire->prenom }} {{ $service->partenaire->nom }}
            </h2>
            <h2 class="flex gap-2 md:text-xl text-lg text-gray-500 items-center"><i class="fa-solid fa-clock"></i>
                available 8:00 AM to
                10:PM</h2>
        </div>
    </div>
</div>
