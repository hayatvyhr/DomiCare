<!DOCTYPE html>
<html lang="en">
    <x-head />

    <body>
        <x-navbar>
            <div>
                <div class="md:grid grid-cols-4 mt-8">
                    <div>
                        <div class="mr-6">
                            <h2 class="font-bold mb-3 text-lg text-primary ">Categories</h2>
                            {{-- * Side Category Navbar --}}
                            @foreach ($categories as $category)
                                <x-servicesByCategory.category-sidebar-item :category="$category" />
                            @endforeach
                        </div>
                    </div>
                    <div class="col-span-3">
                        <h2 class="font-bold text-[22px]">{{ Str::ucfirst($categoryName) }}</h2>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-6 mt-5">
                            @foreach ($interventions as $intervention)
                                <x-index.intervention-item :intervention="$intervention" />
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </x-navbar>
    </body>

</html>
