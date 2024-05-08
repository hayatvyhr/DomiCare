<div class="group relative rounded-xl">
    @if ($demande->etat == 'completed')
        <button
            class="rating-btn flex filter-none opacity-0 group-hover:opacity-100 text-xl absolute bg-white text-[#FFBE00]  justify-center items-center inset-y-[70px] inset-x-[168px] border border-gray-500  font-semibold p-2 z-10 gap-2 rounded shadow-2xl hover:bg-[#FFBE00] hover:text-white transition ease-in-out cursor-pointer"
            onclick="document.querySelector('.commentaire-form-{{ $demande->id_demande }}').classList.remove('hidden');
            document.querySelector('.overlay').classList.remove('hidden');
            document.body.classList.add('remove-scrolling');">
            <i class="fa-solid fa-star"></i>
            <h2>Noter</h2>
        </button>
    @endif
    @if ($demande->etat == null)
        <form action="/supprimer" method="POST">
            @csrf
            <input type="number" name="id_demande" value="{{ $demande->id_demande }}" hidden>
            <button
                class="flex filter-none opacity-0 group-hover:opacity-100 text-xl absolute bg-white text-red-700  justify-center items-center inset-y-[70px] inset-x-[168px] border border-gray-500  font-semibold p-2 z-10 gap-2 rounded shadow-2xl hover:bg-red-600 hover:text-white transition ease-in-out">
                <i class="fa-solid fa-trash"></i>
                <h2>Supprimer</h2>
            </button>
        </form>
    @endif
    <div
        class="flex gap-4 border border-gray-300 rounded-xl p-4 @if ($demande->etat == null || $demande->etat == 'completed') group-hover:filter group-hover:grayscale group-hover:blur-[6px] transition ease-in-out @endif ">
        <img src="/storage/partenaires/{{ $demande->partenaire->image }}" alt="profile photo" width="140"
            height="140" class="object-cover rounded-xl border">
        <div class="flex flex-col gap-[4px]">
            <h2 class="font-bold text-lg">{{ $demande->service->intervention->nom }}</h2>
            <div class="flex gap-2 items-center text-primary font-medium">
                <i class="fa-solid fa-user text-lg"></i>
                <h2>{{ $demande->partenaire->prenom }} {{ $demande->partenaire->nom }}</h2>
            </div>
            <div class="flex gap-2 items-center text-gray-500 font-medium">
                <i class="fa-solid fa-location-dot text-primary text-lg"></i>
                <h2>{{ $demande->service->ville }}</h2>
            </div>
            <div class="flex gap-2 items-center text-gray-500 font-medium">
                <i class="fa-solid fa-calendar-days text-primary text-lg"></i>
                <h2>Date : <span
                        class="text-black">{{ date('F j, Y (h:s A)', strtotime($demande->date_reservation)) }}</span>
            </div>
            <div class="flex gap-2 items-center text-gray-500 font-medium">
                <i class="fa-solid fa-hourglass-half text-primary text-lg"></i>
                <h2>Durée : <span class="text-black">{{ $demande->duree }} jours</span></h2>
            </div>
        </div>
    </div>
</div>

@php
    $client_id = auth()->user()->client->id_client;
    $service_id = $demande->service->id_service;

    $comment = $demande->service->commentaires
        ->where('id_client', $client_id)
        ->where('id_service', $service_id)
        ->first();
@endphp

@if ($demande->etat == 'completed')
    <form action="/commenter" method="POST"
        class="hidden commentaire-form commentaire-form-{{ $demande->id_demande }} fixed m-auto h-[450px]  md:w-[700px] sm:w-[600px] w-[400px] left-0 right-0 top-0 bottom-0 bg-white z-20 rounded-xl flex flex-col gap-2 justify-center items-start px-10 py-8">
        @csrf
        <div class="close-btn text-[25px] self-end hover:text-red-700 transition cursor-pointer"><i
                class="fa-solid fa-xmark"></i>
        </div>
        <h2 class="font-bold text-lg">Entrer une note entre 0 et 5 : </h2>
        <input type="number" name="rating" min="0" max="5" step="0.1" placeholder="Note"
            value="{{ $comment ? $comment->rating : '' }}"
            class="bg-[#F4F3F4] border focus:border-primary [&:not(:placeholder-shown)]:border-primary rounded focus:outline-0 px-3 py-2 w-28"
            required />
        <h2 class="font-bold text-lg mt-4 ">Saisir le commentaire : </h2>
        <textarea name="commentaire" cols="30" rows="5" placeholder="Commentaire"
            class="bg-[#F4F3F4] border focus:border-primary rounded focus:outline-0 px-3 py-2 w-full resize-none [&:not(:placeholder-shown)]:border-primary scrollbar"
            required>{{ $comment ? $comment->commentaire : '' }}</textarea>
        {{-- <input type="number" name="id_demande" value="{{ $demande->id_demande }}" hidden> --}}
        <input type="number" name="id_client" value="{{ auth()->user()->client->id_client }}" hidden>
        <input type="number" name="id_service" value="{{ $demande->service->id_service }}" hidden>
        <input type="number" name="id_user" value="{{ $demande->partenaire->user->id_user }}" hidden>
        <input type="date" name="date_commentaire" value="{{ date('Y-m-d') }}" hidden>
        <input type="text" name="emetteur" value="client" hidden>
        <button
            class="self-center mt-6 flex gap-3 font-medium bg-primary text-white px-4 py-2 justify-center rounded items-center hover:bg-[#7C3AED] transition [&:not(:placeholder-shown)]:border-primary">
            <i class="fa-solid fa-check"></i>
            <h2>Soumettre</h2>
        </button>
    </form>
@endif

{{-- {{ $demande->service->commentaires->where('id_client', auth()->user()->client->id_client)->where('id_demande', $demande->id_demande) }} --}}
