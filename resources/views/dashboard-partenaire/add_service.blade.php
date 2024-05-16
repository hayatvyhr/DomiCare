<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @vite('resources/css/app.css')


        <title>Ajouter un Service</title>
        <style>
            /* General page styles */
            body {
                margin: 0;
                padding: 0;
                font-family: Arial, sans-serif;
                background-color: #f0f0f0;
            }

            /* Container styles */
            /* .container {
                max-width: 400px;
                margin: 50px auto;
                padding: 20px;
                background-color: white;
                border: 1px solid #ddd;
                border-radius: 10px;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            } */

            /* Title styles */
            .title {
                text-align: center;
                font-size: 24px;
                color: #222;
                margin-bottom: 20px;
            }

            /* Centering form elements */
            /* .form-wrapper {
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 20px;
            } */

            /* Input styles */
            .input--style {
                padding: 10px;
                border: 1px solid #6895D2;
                border-radius: 5px;
                font-size: 16px;
                width: 100%;
                /* Takes full width */
                /* max-width: 500px; */
                /* Limits width */
                margin-bottom: 10px;
            }

            /* Button styles */
            .btn--style {
                padding: 12px;
                background-color: #6895D2;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 16px;
                /* max-width: 300px; */
            }

            /* Button hover effect */
            .btn--style:hover {
                background-color: #5674a8;
            }
        </style>
        <script>
            function updateInterventions() {
                const domainTypeMapping = {
                    "domaine1": ["Plantation Fleurs", "Désherbage"],
                    "domaine2": ["Installation Robinetterie", "Réparation Fuite"],
                    "domaine3": ["Lavage Vaisselle", "Lavage Linge", "Nettoyage Sanitaire"]
                };

                const domaineSelect = document.getElementById("domaine");
                const selectedDomaine = domaineSelect.value;
                const typeInterventionDiv = document.getElementById("type_intervention");

                if (!selectedDomaine || !domainTypeMapping[selectedDomaine]) {
                    typeInterventionDiv.style.display = "none";
                    return;
                }

                typeInterventionDiv.style.display = "block";

                const interventionSelect = document.createElement("select");
                interventionSelect.className = "input--style";
                interventionSelect.name = "type_intervention";

                interventionSelect.innerHTML = "<option value='' disabled selected>Choisir un type d'intervention</option>";

                domainTypeMapping[selectedDomaine].forEach((intervention) => {
                    const option = document.createElement("option");
                    option.value = intervention;
                    option.textContent = intervention;
                    interventionSelect.appendChild(option);
                });

                typeInterventionDiv.innerHTML = "";
                typeInterventionDiv.appendChild(interventionSelect);
            }
        </script>
    </head>

    <body>
        <div class="container w-[800px] h-[550px] bg-white p-24 mt-8 rounded-xl flex flex-col justify-center">
            <h2 class="title">Ajouter un Service</h2>
            <div class="form-wrapper">
                <form class="w-full flex flex-col gap-1" action="{{ route('dashboard.partenaire.service.store') }}"
                    method="post">
                    @csrf

                    <div>
                        <textarea class="input--style resize-none h-32" type="text" placeholder="Description" name="description" required></textarea>
                    </div>
                    <div>
                        <select class="input--style" name="ville" required>
                            <option value="" disabled selected>Choisir la ville</option>
                            <option value="Tetouan">Tetouan</option>
                            <option value="Tanger">Tanger</option>
                            <option value="Rabat">Rabat</option>
                            <option value="Casablanca">Casablanca</option>
                            <option value="Agadir">Agadir</option>
                        </select>
                    </div>
                    <div>
                        <input class="input--style" type="number" placeholder="Prix d'intervention"
                            name="prix_intervention" step="any" required>
                    </div>
                    <div>
                        <select class="input--style" id="domaine" name="domaine" onchange="updateInterventions()"
                            required>
                            <option value="" disabled selected>Choisir un domaine</option>
                            <option value="domaine1">Jardinage</option>
                            <option value="domaine2">Plomberie</option>
                            <option value="domaine3">Ménage</option>
                        </select>
                    </div>
                    <div id="type_intervention" style="display: none;">
                        <select class="input--style" name="type_intervention">
                            <option value='' disabled selected>Choisir un type d'intervention</option>
                        </select>
                    </div>
                    <div class="self-center mt-6 ">
                        <button class="btn--style w-32" type="submit">Submit</button>
                    </div>
                </form>

    </body>

</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
