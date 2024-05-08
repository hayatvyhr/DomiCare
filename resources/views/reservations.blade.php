<!DOCTYPE html>
<html lang="en">
    <x-head />

    <body>
        <x-navbar>
            <div class=" lg:px-36 px-16 lg:py-16 py-10">
                <h2 class="font-bold text-xl">Mes Réservations</h2>
                <div class="flex gap-2 p-[4px] rounded bg-[#F4F3F4]  w-full mt-3 ">
                    <a href="/reservations/onHold"
                        class="px-2 py-1 rounded {{ request()->segment(count(request()->segments())) == 'onHold' ? 'bg-white text-primary' : 'bg-none text-gray-600' }} hover:bg-white font-semibold cursor-pointer transition hover:text-primary ">
                        <h2>En attente</h2>
                    </a>
                    <a href="/reservations/accepted"
                        class="px-2 py-1 rounded {{ request()->segment(count(request()->segments())) == 'accepted' ? 'bg-white text-primary' : 'bg-none text-gray-600' }} hover:bg-white font-semibold cursor-pointer transition hover:text-primary ">
                        <h2>Acceptées</h2>
                    </a>
                    <a href="/reservations/refused"
                        class="px-2 py-1 rounded {{ request()->segment(count(request()->segments())) == 'refused' ? 'bg-white text-primary' : 'bg-none text-gray-600' }} hover:bg-white font-semibold cursor-pointer transition hover:text-primary ">
                        <h2>Refusées</h2>
                    </a>
                    <a href="/reservations/completed"
                        class="px-2 py-1 rounded {{ request()->segment(count(request()->segments())) == 'completed' ? 'bg-white text-primary' : 'bg-none text-gray-600' }} hover:bg-white font-semibold cursor-pointer transition hover:text-primary ">
                        <h2>Terminées</h2>
                    </a>
                </div>
                <div class="grid md:grid-cols-2 grid-cols-1 gap-3 mt-3">

                    @if ($demandes->isNotEmpty())
                        @foreach ($demandes as $demande)
                            <x-reservations.reservation-item :demande="$demande" />
                        @endforeach
                    @else
                        <h2>Aucune réservation trouvée</h2>
                    @endif
                </div>
            </div>
        </x-navbar>
        <div class="overlay hidden fixed h-full w-full z-10 bg-black opacity-80 top-0 transition"></div>
        @vite('resources/js/reservations.js')
    </body>

</html>
