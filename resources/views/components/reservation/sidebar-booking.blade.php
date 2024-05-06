<form
    class="booking-form fixed top-0 right-[-380px]  w-[380px] h-full bg-white shadow-xl z-20 transition duration-300 px-6 py-8 overflow-y-scroll scrollbar">
    <div class="flex flex-col justify-between">
        <div class="close-btn text-[25px] self-end hover:text-red-700 transition cursor-pointer"><i
                class="fa-solid fa-xmark"></i>
        </div>
        <h2 class="font-bold text-[18px]">Réserver le service</h2>
        <h2 class="text-sm mt-2">Précisez la date et la durée pour réserver le service</h2>
        <h2 class="font-medium mt-8">Sélectionner la date</h2>
        <div class="mt-2 p-[7px] rounded">
            <input type="datetime-local" name="reservation_date" placeholder="date et heure"
                class="calendar border border-gray-300 [&:not(:placeholder-shown)]:border-primary mb-2 px-2 py-1 w-full focus:outline-0 rounded font-medium text-primary"
                required>
        </div>
        <h2 class="font-medium mt-8">Spécifier la durée (jours)</h2>
        <input type="number" name="reservation_durée" min="1" max="50"
            class="border border-gray-300 mb-2 px-2 py-1 w-full focus:outline-0 rounded font-medium mt-3 text-primary [&:not(:placeholder-shown)]:border-primary"
            placeholder="Durée par jour" required>
        <div class="flex gap-3 self-end mt-6">
            <h2
                class="cancel-btn font-medium bg-gray-200 hover:bg-gray-300  px-4 py-2 rounded transition cursor-pointer">
                Annuler
            </h2>
            <button
                class="flex gap-3 font-medium bg-primary text-white px-4 py-2 justify-center rounded items-center hover:bg-[#7C3AED] transition">
                <i class="fa-solid fa-calendar-check"></i>
                <h2>Confirmer</h2>
            </button>
        </div>
    </div>
</form>
{{-- right-[-350px] translate-x-[-350px] --}}
