<div class="mb-5">
    <div class="pr-10 pl-10">
        <div class="p-5 shadow-sm flex md:justify-between justify-center">
            <div class="flex items-center gap-8">
                <a href="/"><img src='/logo.svg' alt='Logo' class="md:inline w-[150px] hidden" /></a>
                <div class="lg:flex items-center gap-8 hidden font-medium">
                    <a href="/">
                        <h2 class="hover:scale-105 hover:text-primary cursor-pointer ">Accueil</h2>
                    </a>
                    <a href="/search/plomberie">
                        <h2 class="hover:scale-105 hover:text-primary cursor-pointer ">Services</h2>
                    </a>
                    <h2 class="hover:scale-105 hover:text-primary cursor-pointer ">À propos
                    </h2>
                </div>
            </div>
            <div>
                @auth
                    <div class="flex justify-center items-center gap-3">
                        <a href="/profile/{{ auth()->user()->username }}" class="mr-2"><img title="My Profile"
                                data-toggle="tooltip" data-placement="bottom"
                                src="/storage/{{ auth()->user()->user_type == 'client' ? 'clients' : 'partenaires' }}/{{ auth()->user()->user_type == 'client' ? auth()->user()->client->image : auth()->user()->partenaire->image }}"
                                class="w-10 rounded-full border-2 border-gray-700 hover:border-primary hover:scale-110 transition" /></a>
                        <form action="/logout" method="POST" class="d-inline">
                            @csrf
                            <button
                                class="  text-gray-700 leading-6 text-xl  rounded hover:text-red-700 hover:scale-110  transition cursor-pointer group">
                                <i class="fa-solid fa-door-closed group-hover:hidden"></i>
                                <i class="fa-solid fa-door-open hidden group-hover:inline"></i></button>
                        </form>
                    </div>
                @else
                    <form action="/login" method="POST" class="mb-0 pt-2 pt-md-0">
                        @csrf
                        <div class="flex items-center gap-5">
                            <div
                                class="p-2 w-40 border border-gray flex gap-3 items-center rounded
                            text-gray-400
                            has-[input:focus]:text-primary
                            has-[input:not(:placeholder-shown)]:text-primary
                            has-[input:focus]:border-primary
                            has-[input:not(:placeholder-shown)]:border-primary
                            transition linear">
                                <i class="fa-solid fa-user"></i>
                                <input name="loginusername" type="text" placeholder="Username"
                                    class="w-full focus:outline-0 text-black"autocomplete="off" />
                            </div>
                            <div
                                class="p-2 w-40 border border-gray flex gap-3 items-center rounded
                        text-gray-400
                        has-[input:focus]:text-primary
                        has-[input:not(:placeholder-shown)]:text-primary
                        has-[input:focus]:border-primary
                        has-[input:not(:placeholder-shown)]:border-primary
                        transition linear">
                                <i class="fa-solid fa-lock"></i>
                                <input name="loginpassword" class="w-full focus:outline-0 text-black" type="password"
                                    placeholder="Password " />
                            </div>
                            <div>
                                <button
                                    class="bg-primary text-white text-sm leading-6 font-medium py-2 px-3 rounded hover:bg-[#7C3AED]  transition">Connexion</button>
                            </div>

                    </form>
                    <a href="/signup"
                        class="md:inline hidden bg-black text-white text-sm leading-6 font-medium py-2 px-3 rounded hover:bg-[#2a2a2a]  transition cursor-pointer">S'inscrire</a>
                </div>
            @endauth
        </div>
    </div>
    <!-- header ends here -->

    @if (session()->has('success'))
        <div class="flex items-center justify-center p-4 mb-2 mt-2 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if (session()->has('failure'))
        <div class="flex items-center justify-center p-4 mb-2 mt-2 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                {{ session('failure') }}
            </div>
        </div>
    @endif

    {{ $slot }}
</div>
