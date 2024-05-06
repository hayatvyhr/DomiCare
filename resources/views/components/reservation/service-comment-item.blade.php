<div class="flex flex-col h-[195px] border border-gray-500 p-4 rounded">
    <div class="flex gap-4">
        <img src="/storage/clients/{{ $commentaire->client->image }}" alt="profile photo" width="50" height="50"
            class="h-[50px] object-cover rounded-full border border-gray-400">
        <div class="col-span-4 flex flex-col">
            <h2 class="font-medium">{{ $commentaire->client->nom }} {{ $commentaire->client->prenom }}</h2>
            <div class="flex gap-3 text-[13px]">
                <div class="flex items-center gap-1 text-[#FFBF00]">
                    @for ($i = 0; $i < floor($commentaire->rating); $i++)
                        <i class="fa-solid fa-star"></i>
                    @endfor
                    @if ($commentaire->rating - floor($commentaire->rating) >= 0.299)
                        <i class="fa-solid fa-star-half-stroke"></i>
                    @else
                        <i class="fa-regular fa-star"></i>
                    @endif
                    @for ($i = floor($commentaire->rating) + 1; $i < 5; $i++)
                        <i class="fa-regular fa-star"></i>
                    @endfor
                </div>
                <h2 class="font-medium text-gray-500">{{ date('d/m/Y', strtotime($commentaire->date_commentaire)) }}
                </h2>
            </div>
        </div>
    </div>
    <p class="mt-3 px-[5px] overflow-y-scroll scrollbar">
        {{ $commentaire->commentaire }}
    </p>
</div>
