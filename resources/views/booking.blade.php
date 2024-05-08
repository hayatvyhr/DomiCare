<!DOCTYPE html>
<html lang="en">
    <x-head />

    <body>
        <x-navbar>
            {{-- {{ now()->parse(date('Y-m-d'))->addDays(2) }} --}}

            @error('date_reservation')
                <div class="flex items-center justify-center p-4 mb-2 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800 text-center"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Invalid!</span> {{ $message }}
                    </div>
                </div>
            @enderror

            <div class="lg:py-20 md:py-14 py-8 lg:px-24 md:px-8 px-8">
                <x-booking.service-info :service="$service" />
                <div class="grid grid-cols-3 mt-16">
                    <div class="md:col-span-2 col-span-3 md:order-first order-last">
                        <h2 class="font-bold text-[25px]">Description</h2>
                        <p class="mt-4 text-lg text-gray-700">{{ $service->description }}</p>
                        <h2 class="font-bold text-[25px] mt-8">Comments</h2>
                        <div class="grid lg:grid-cols-2 grid-cols-1 lg:gap-6 gap-4 mt-4">
                            @if ($service->commentaires->isNotEmpty())
                                @foreach ($service->commentaires as $commentaire)
                                    <x-booking.service-comment-item :commentaire="$commentaire" />
                                @endforeach
                            @else
                                <h2>Aucune commentaire trouvée.</h2>
                            @endif
                        </div>
                    </div>
                    <div class='md:pl-10 md:mb-0 mb-5'>
                        <button
                            class="booking-btn flex gap-2 w-full text-white bg-primary items-center rounded p-2 font-medium justify-center hover:bg-[#7C3AED] transition ease-in-out"><i
                                class="fa-regular fa-calendar-check"></i>Réserver</button>
                        <div class="md:block hidden">
                            <h2 class="font-bold text-lg mt-3 mb-3">Offres similaires</h2>
                            @if ($similarServices->isNotEmpty())
                                @foreach ($similarServices as $similarService)
                                    <x-booking.service-suggestion-item :service="$similarService" />
                                @endforeach
                            @else
                                <h2>Aucune offre similaire trouvée.</h2>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </x-navbar>
        <x-booking.sidebar-booking :service="$service" />
        <div class="overlay hidden fixed h-full w-full z-10 bg-black opacity-80 top-0 transition"></div>
        {{-- * for calendar picker --}}
        @vite('resources/js/booking.js')
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    </body>

</html>
