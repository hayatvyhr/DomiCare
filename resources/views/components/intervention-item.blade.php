<div
    class="shadow-md rounded-xl hover:shadow-lg hover:shadow-primary cursor-pointer hover:scale-105 transition-all ease-in-out">
    <img src="/services/{{ $intervention->image() }}" alt="{{ $intervention->nom() }}" width="500" height="200"
        class='h-[150px] md:h-[200px] object-cover rounded-xl'>
    <div class="flex flex-col items-baseline p-3">
        <h2 class="p-1 text-primary font-medium bg-purple-200 rounded-full px-2 text-[12px]">
            {{ $intervention->category->nom() }}
        </h2>
        <h2 class="font-bold text-lg mt-2 h-7">{{ $intervention->nom }}</h2>
        <h2>{{ $intervention->description() }}</h2>
        <button
            class="bg-primary text-white text-sm leading-6 font-medium py-2 px-3 rounded-xl hover:bg-[#7C3AED] transition mt-3">Voir
            Offres</button>
    </div>
</div>
