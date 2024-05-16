<!DOCTYPE html>
<html lang="en">
    <x-head />

    <body>
        <x-navbar>
            @error('email')
                <div class="flex items-center justify-center p-4 mt-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
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
            @error('username')
                <div class="flex items-center justify-center p-4 mt-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
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
            @error('password')
                <div class="flex items-center justify-center p-4 mt-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
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
            @error('password_confirmation')
                <div class="flex items-center justify-center p-4 mt-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
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
            @error('ville')
                <div class="flex items-center justify-center p-4 mt-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Invalid!</span>{{ $message }}
                    </div>
                </div>
            @enderror
            <form action="/profile/{{ $user->username }}" method="POST" enctype="multipart/form-data"
                class="flex flex-1 flex-col items-center px-10 ">
                @csrf
                {{-- <h2 class="self-center font-bold text-lg text-gray-700">S'inscrire en tant que :</h2> --}}

                <img src="/storage/clients/{{ $user->client->image }}" alt="" width="200" height="200"
                    class="rounded-full mt-8 border h-[200px] object-cover">



                <div class="flex gap-8 mt-8">
                    <div class="w-full flex flex-col gap-2">
                        <div
                            class="p-2 border flex gap-3 items-center rounded
                                text-gray-400
                                has-[input:focus]:text-primary
                                has-[input:not(:placeholder-shown)]:text-primary
                                has-[input:focus]:border-primary
                                has-[input:not(:placeholder-shown)]:border-primary
                                transition linear">
                            <i class="fa-solid fa-id-card"></i>
                            <input value="{{ $user->client->prenom }}" name="prenom" id="prenom-register"
                                class="w-full focus:outline-0 text-black"autocomplete="off" type="text"
                                autocomplete="off" placeholder="Prénom" required />
                        </div>

                        <div
                            class="p-2 border flex gap-3 items-center rounded
                                text-gray-400
                                has-[input:focus]:text-primary
                                has-[input:not(:placeholder-shown)]:text-primary
                                has-[input:focus]:border-primary
                                has-[input:not(:placeholder-shown)]:border-primary
                                transition linear">
                            <i class="fa-solid fa-address-card"></i>
                            <input value="{{ $user->client->nom }}" name="nom" id="nom-register"
                                class="w-full focus:outline-0 text-black" type="text" autocomplete="off"
                                placeholder="Nom" required />
                        </div>


                        <div
                            class="p-2 border flex gap-3 items-center rounded
                                text-gray-400
                                has-[input:focus]:text-primary
                                has-[input:not(:placeholder-shown)]:text-primary
                                has-[input:focus]:border-primary
                                has-[input:not(:placeholder-shown)]:border-primary
                                transition linear">
                            <i class="fa-solid fa-calendar-days"></i> <input value="{{ $user->client->age }}"
                                name="age" id="age-register" class="w-full focus:outline-0 text-black"
                                type="number" min="0" max="120" autocomplete="off" placeholder="Age"
                                required />
                        </div>

                        <div
                            class="p-2 border flex gap-3 items-center rounded
                                text-gray-400
                                has-[input:focus]:text-primary
                                has-[input:not(:placeholder-shown)]:text-primary
                                has-[input:focus]:border-primary
                                has-[input:not(:placeholder-shown)]:border-primary
                                transition linear">
                            <i class="fa-solid fa-phone"></i>
                            <input value="{{ $user->client->telephone }}" name="telephone" id="telephone-register"
                                class="w-full focus:outline-0 text-black" type="tel" autocomplete="off"
                                pattern="[+]?[0-9]+" placeholder="Téléphone" required />
                        </div>

                        <div
                            class="p-2 border flex gap-3 items-center rounded
                              transition linear border-primary ">
                            <i class="fa-solid fa-city city-icon text-primary"></i>
                            <select class="hover:text-black w-full focus:outline-0 cursor-pointer cities-list peer"
                                name="ville" id="ville-register">
                                <option class="option-input" value="{{ $user->client->ville }}" selected hidden>
                                    {{ old('ville') ? old('ville') : $user->client->ville }}</option>
                                <option value="Tetouan">Tetouan</option>
                                <option value="Tanger">Tanger</option>
                                <option value="Casablanca">Casablanca</option>
                                <option value="Rabat">Rabat</option>
                                <option value="Agadir">Agadir</option>
                            </select>
                        </div>
                    </div>
                    <div class="w-full flex flex-col gap-2">

                        <div
                            class="p-2 border flex gap-3 items-center rounded
                            text-gray-400
                            has-[input:focus]:text-primary
                            has-[input:not(:placeholder-shown)]:text-primary
                            has-[input:focus]:border-primary
                            has-[input:not(:placeholder-shown)]:border-primary
                            transition linear">
                            <i class="fa-solid fa-envelope"></i>
                            <input value="{{ $user->client->email }}" name="email" id="email-register"
                                class="w-full focus:outline-0 text-black" type="text" placeholder="Email"
                                autocomplete="off" required />
                        </div>

                        <div
                            class="p-2 border flex gap-3 items-center rounded
                            transition linear  border-primary">
                            <i class="fa-solid fa-image image-icon text-primary"></i>
                            <input value="{{ $user->client->image }}" name="image" id="image-selector"
                                class="file:hidden cursor-pointer w-full  image-selector-input peer hover:text-black focus:outline-0"
                                type="file" autocomplete="off" accept=".png,.jpeg,.jpg" />
                        </div>


                        <div
                            class="p-2 border flex gap-3 items-center rounded
                            text-gray-400
                            has-[input:focus]:text-primary
                            has-[input:not(:placeholder-shown)]:text-primary
                            has-[input:focus]:border-primary
                            has-[input:not(:placeholder-shown)]:border-primary
                            transition linear">
                            <i class="fa-solid fa-id-badge"></i>
                            <input value="{{ $user->username }}" name="username" id="username-register"
                                class="w-full focus:outline-0 text-black" type="text"
                                placeholder="Nom d'utilisateur" autocomplete="off" required />
                        </div>


                        <div
                            class="p-2 border flex gap-3 items-center rounded
                text-gray-400
                has-[input:focus]:text-primary
                has-[input:not(:placeholder-shown)]:text-primary
                has-[input:focus]:border-primary
                has-[input:not(:placeholder-shown)]:border-primary
                transition linear">
                            <i class="fa-solid fa-lock"></i>
                            <input name="password" id="password-register" class="w-full focus:outline-0 text-black"
                                type="password" placeholder="Mot de passe" min="8" />
                        </div>


                        <div
                            class="p-2 border flex gap-3 items-center rounded
                text-gray-400
                has-[input:focus]:text-primary
                has-[input:not(:placeholder-shown)]:text-primary
                has-[input:focus]:border-primary
                has-[input:not(:placeholder-shown)]:border-primary
                transition linear">
                            <i class="fa-solid fa-lock"></i>
                            <input name="password_confirmation" id="password-register-confirm"
                                class="w-full focus:outline-0 text-black" type="password"
                                placeholder="Confirmer mot de passe" />
                        </div>
                    </div>






                </div>
                <button type="submit"
                    class="bg-primary text-white text-lg leading-6 font-bold py-3 px-10 rounded hover:bg-[#7C3AED] transition mt-6">Modifier</button>
            </form>
        </x-navbar>
    </body>

</html>
