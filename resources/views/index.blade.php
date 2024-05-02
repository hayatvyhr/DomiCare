<!DOCTYPE html>
<html lang="en">


    <x-navbar>
        <x-header />
        <div class="mx-9 flex items-center justify-center gap-8">
            @foreach ($categories as $category)
                <x-category-item :category="$category" />
            @endforeach
        </div>

        <div class="mt-5">
            <h2 class="font-bold text-[22px]">Services Populaires</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-5">
                @foreach ($interventions as $intervention)
                    <x-intervention-item :intervention="$intervention" />
                @endforeach
            </div>
        </div>
    </x-navbar>

</html>
