<!DOCTYPE html>
<html lang="en">
    <x-head />

    <body>
        <x-navbar>
            <div class="lg:py-20 md:py-14 py-8 lg:px-24 md:px-8 px-8">
                <x-reservation.service-info :service="$service" />
                <div class="grid grid-cols-3 mt-16">
                    <div class="md:col-span-2 col-span-3 md:order-first order-last">
                        <h2 class="font-bold text-[25px]">Description</h2>
                        <p class="mt-4 text-lg text-gray-700">{{ $service->description }}</p>
                        <h2 class="font-bold text-[25px] mt-8">Comments</h2>
                        <div class="grid lg:grid-cols-2 grid-cols-1 lg:gap-6 gap-4 mt-4">
                            @foreach ($service->commentaires as $commentaire)
                                <x-reservation.service-comment-item :commentaire="$commentaire" />
                            @endforeach
                        </div>
                    </div>
                    <div class='md:pl-10 md:mb-0 mb-5'>
                        <button
                            class="booking-btn flex gap-2 w-full text-white bg-primary items-center rounded p-2 font-medium justify-center hover:bg-[#7C3AED] transition ease-in-out"><i
                                class="fa-regular fa-calendar-check"></i>Réserver</button>
                        <div class="md:block hidden">
                            <h2 class="font-bold text-lg mt-3 mb-3">Offres similaires</h2>
                            @foreach ($similarServices as $service)
                                <x-reservation.service-suggestion-item :service="$service" />
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </x-navbar>
        <x-reservation.sidebar-booking />
        <div class="overlay hidden fixed h-full w-full z-10 bg-black opacity-80 top-0 transition"></div>
        {{-- * for calendar picker --}}
        @vite('resources/js/booking.js')
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    </body>

</html>
