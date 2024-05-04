<a href="/search/{{ $category->nom() }}"
    class="flex gap-3 p-3 font-medium items-center border rounded-xl mb-3 cursor-pointer hover:bg-purple-50 hover:text-primary hover:shadow-md hover:border-primary transition-all ease-in-out">
    <img src="/categories/{{ $category->icon() }}" alt="cleaning" width="30" height="30">
    <h2>{{ Str::ucfirst($category->nom()) }}</h2>
</a>
