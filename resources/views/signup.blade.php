<!DOCTYPE html>
<html lang="en">
    <x-head />

    <body>
        <x-navbar>
            <div class="flex items-center mt-6 px-10">
                <div class="lg:flex flex-col items-center flex-1 hidden">
                    <h2 class="font-bold text-[30px] text-center">Ne rate pas l'action, <span
                            class="text-primary">Inscris-toi</span>
                        <br>pour en faire partie !
                    </h2>
                    <img src='/signup.svg' width="420" class="mt-8" />
                </div>
                <form action="/register" method="POST" enctype="multipart/form-data"
                    class="flex flex-1 flex-col items-center px-10">
                    @csrf
                    {{-- <h2 class="self-center font-bold text-lg text-gray-700">S'inscrire en tant que :</h2> --}}
                    <div class="flex gap-10 mt-4">
                        <div class="relative">
                            <input type="radio" name="user_type" id="client" value="client"
                                @if (old('user_type') == 'client' || !old('user_type')) checked @endif class="hidden peer">
                            <label for="client"
                                class="flex flex-col gap-2 w-28 h-28 items-center justify-center p-4 rounded-xl bg-primary border-primary text-gray-700 bg-opacity-15 hover:bg-opacity-65 hover:text-white peer-checked:bg-opacity-100 peer-checked:text-white hover:shadow-md hover:shadow-primary peer-checked:shadow-primary peer-checked:shadow-md cursor-pointer hover:scale-105 transition-all ease-in-out">
                                <i class="fa-solid fa-user text-3xl"></i>
                                <h2 class="font-medium">Client</h2>
                            </label>
                        </div>
                        <div class="relative">
                            <input type="radio" name="user_type" id="partenaire" value="partenaire"
                                @if (old('user_type') == 'partenaire') checked @endif class="hidden peer">
                            <label for="partenaire"
                                class="flex flex-col gap-2 w-28 h-28 items-center justify-center p-4 rounded-xl bg-primary bg-opacity-15 hover:bg-opacity-65 text-gray-700 hover:text-white peer-checked:bg-opacity-100 peer-checked:text-white hover:shadow-md hover:shadow-primary peer-checked:shadow-primary peer-checked:shadow-md cursor-pointer hover:scale-105 transition-all ease-in-out">
                                <i class="fa-solid fa-user-tie text-3xl"></i>
                                <h2 class="font-medium">Partenaire</h2>
                            </label>
                        </div>
                    </div>


                    <div class="grid grid-col-2 gap-3 mt-8 self-stretch">

                        @error('email')
                            <div class="flex items-center p-4 mb-2 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                                role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
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
                            <div class="flex items-center p-4 mb-2 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                                role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
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
                            <div class="flex items-center p-4 mb-2 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                                role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
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
                            <div class="flex items-center p-4 mb-2 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                                role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
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
                            <div class="flex items-center p-4 mb-2 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                                role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    <span class="font-medium">Invalid!</span> {{ $message }}
                                </div>
                            </div>
                        @enderror

                        <div
                            class="p-2 border flex gap-3 items-center rounded
                        text-gray-400
                        has-[input:focus]:text-primary
                        has-[input:not(:placeholder-shown)]:text-primary
                        has-[input:focus]:border-primary
                        has-[input:not(:placeholder-shown)]:border-primary
                        transition linear">
                            <i class="fa-solid fa-id-card"></i>
                            <input value="{{ old('prenom') }}" name="prenom" id="prenom-register"
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
                            <input value="{{ old('nom') }}" name="nom" id="nom-register"
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
                            <i class="fa-solid fa-calendar-days"></i> <input value="{{ old('age') }}" name="age"
                                id="age-register" class="w-full focus:outline-0 text-black" type="number"
                                min="0" max="120" autocomplete="off" placeholder="Age" required />
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
                            <input value="{{ old('telephone') }}" name="telephone" id="telephone-register"
                                class="w-full focus:outline-0 text-black" type="tel" autocomplete="off"
                                pattern="[+]?[0-9]+" placeholder="Téléphone" required />
                        </div>

                        <div
                            class="p-2 border flex gap-3 items-center rounded
                    text-gray-400 transition linear has-[select:hover]:border-primary has-[select:hover]:text-primary">
                            <i class="fa-solid fa-city city-icon"></i>
                            <select class="hover:text-black w-full focus:outline-0 cursor-pointer cities-list peer"
                                name="ville" id="ville-register">
                                <option class="option-input" value="{{ old('ville') }}" selected hidden>
                                    {{ old('ville') ? old('ville') : 'Ville de résidence' }}</option>
                                <option value="Tetouan">Tetouan</option>
                                <option value="Tanger">Tanger</option>
                                <option value="Casablanca">Casablanca</option>
                                <option value="Rabat">Rabat</option>
                                <option value="Agadir">Agadir</option>
                            </select>
                        </div>

                        <div
                            class="p-2 border flex gap-3 items-center rounded
                        text-gray-400
                        has-[input:focus]:text-primary
                        has-[input:not(:placeholder-shown)]:text-primary
                        has-[input:focus]:border-primary
                        has-[input:not(:placeholder-shown)]:border-primary
                        transition linear">
                            <i class="fa-solid fa-envelope"></i>
                            <input value="{{ old('email') }}" name="email" id="email-register"
                                class="w-full focus:outline-0 text-black" type="text" placeholder="Email"
                                autocomplete="off" required />
                        </div>

                        <div
                            class="p-2 border flex gap-3 items-center rounded
                    text-gray-400
                    transition linear has-[input:hover]:text-primary has-[input:hover]:border-primary">
                            <i class="fa-solid fa-image image-icon"></i>
                            <input value="{{ old('image') }}" name="image" id="image-selector"
                                class="file:hidden cursor-pointer image-selector-input peer hover:text-black focus:outline-0"
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
                            <input value="{{ old('username') }}" name="username" id="username-register"
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
                                type="password" placeholder="Mot de passe" required />
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
                                placeholder="Confirmer mot de passe" required />
                        </div>

                    </div>
                    <button type="submit"
                        class="bg-primary text-white text-lg leading-6 font-bold py-3 px-10 rounded hover:bg-[#7C3AED] transition mt-6">Soumettre</button>
                </form>
            </div>
        </x-navbar>
        @vite('resources/js/signup.js')
    </body>

</html>
