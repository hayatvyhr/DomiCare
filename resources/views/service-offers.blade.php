<!DOCTYPE html>
<html lang="en">
    <x-head />

    <body>
        <x-navbar>
            <h2 class="font-bold text-[40px] text-center mt-6"><span
                    class="text-primary">{{ Str::ucfirst($categoryName) }}
                    ▶</span> {{ $interventionName }}</h2>
            <div
                class="flex lg:flex-row flex-col justify-center items-center lg:gap-28 lg:text-[20px] text-[18px]  border-b-2 rounded border-primary p-4 mt-5">
                <div class="flex lg:gap-10 gap-8 items-center justify-center">
                    <h2 class="font-bold">Trier par :</h2>
                    <form action="" method="GET">
                        <input type="text" name="sortby" value="nb_commentaires" hidden>
                        <input type="text" name="ville" value="{{ $ville }}" hidden>
                        <button
                            class="flex gap-2 items-center hover:text-primary text-gray-600 hover:scale-105 transition cursor-pointer"><i
                                class="fa-solid fa-comment"></i>
                            Commentaires</button>
                    </form>
                    <form action="" method="GET">
                        <input type="text" name="sortby" value="nb_demandes" hidden>
                        <input type="text" name="ville" value="{{ $ville }}" hidden>
                        <button
                            class="flex gap-2 items-center hover:text-primary hover:scale-105 transition cursor-pointer text-gray-600"><i
                                class="fa-solid fa-clipboard-list"></i> Demandes</button>
                    </form>
                    <form action="" method="GET">
                        <input type="text" name="sortby" value="rating" hidden>
                        <input type="text" name="ville" value="{{ $ville }}" hidden>
                        <button
                            class="flex gap-2 items-center hover:text-primary text-gray-600 hover:scale-105 transition cursor-pointer"><i
                                class="fa-solid fa-star"></i>Note</button>
                    </form>
                </div>
                <form action="" method="GET"
                    class="flex lg:gap-5 lg:mt-0 mt-5 gap-8 items-center justify-center">
                    <h2 class="font-bold">Filtrer par :</h2>
                    <input type="text" name="sortby" value="{{ $sortby }}" hidden>
                    <select
                        class="hover:text-primary hover:scale-105 text-gray-600 hover:border-primary border border-gray-300 p-[1px]  rounded lg:w-40 w-36 focus:outline-0 cursor-pointer cities-list transition"
                        name="ville" id="ville-register">
                        <option class="option-input" value="{{ old('ville') }}" selected hidden>
                            {{ old('ville') ? old('ville') : 'Ville' }}</option>
                        <option value="all" class="text-black">Tous</option>
                        <option value="Tetouan" class="text-black">Tetouan</option>
                        <option value="Tanger" class="text-black">Tanger</option>
                        <option value="Casablanca" class="text-black">Casablanca</option>
                        <option value="Rabat" class="text-black">Rabat</option>
                        <option value="Agadir" class="text-black">Agadir</option>
                    </select>
                    <button
                        class="bg-primary text-white text-sm leading-6 font-medium py-1 px-3 rounded hover:bg-[#7C3AED]  transition">Chercher</button>
                </form>
            </div>
            @if ($services->isNotEmpty())
                <div class="grid grid-cols-1 sm:grid-cols-2  lg:grid-cols-3 gap-8 mt-8">
                    @foreach ($services as $service)
                        @if ($service->is_available)
                            <x-ServiceOffer.offer-item :service="$service" />
                        @endif
                    @endforeach
                </div>
            @else
                <div class="flex gap-16 items-center justify-center w-full mt-5">
                    <img src="/no_results_v2.jpg" width="400" height="400" />
                    <div class="flex flex-col gap-2 items-center text-primary">
                        <i class="fa-solid fa-face-sad-tear text-[60px]"></i>
                        <h2 class="font-semibold text-[30px]">Aucun service trouvé</h2>
                    </div>
                </div>
            @endif
        </x-navbar>
    </body>

</html>
