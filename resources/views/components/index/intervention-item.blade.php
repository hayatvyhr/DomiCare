<a href="/search/{{ $intervention->category->nom() }}/{{ $intervention->nom() }}"
    class="shadow-md rounded-xl hover:shadow-lg hover:shadow-primary cursor-pointer hover:scale-105 transition-all ease-in-out flex flex-col justify-between bg-purple-50 bg-opacity-70">
    <img src="/interventions/{{ $intervention->image() }}" alt="{{ $intervention->nom() }}" width="500" height="200"
        class='h-[150px] md:h-[200px] object-cover rounded-xl'>
    <div class="flex flex-col items-baseline p-3">
        <h2 class="p-1 text-primary font-medium bg-purple-200 rounded-full px-2 text-[12px]">
            {{ $intervention->category->nom() }}
        </h2>
        <h2 class="font-bold text-lg mt-2">{{ $intervention->nom }}</h2>
        <h2>{{ $intervention->description() }}</h2>
    </div>
    <button
        class="bg-primary text-white text-sm leading-6 font-medium py-2 px-3 rounded-xl hover:bg-[#7C3AED] transition mt-3 self-start w-24 ml-3 mb-3">Voir
        Offres</button>
</a>
