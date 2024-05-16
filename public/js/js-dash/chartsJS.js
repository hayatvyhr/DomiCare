// Récupérer les valeurs des likes et des dislikes depuis les champs cachés
const likeCount = parseInt(document.getElementById('likeCount').value);
const dislikeCount = parseInt(document.getElementById('dislikeCount').value);

// Créer le graphique
const ctx1 = document.getElementById("chart-1").getContext("2d");
const myChart1 = new Chart(ctx1, {
  type: "polarArea",
  data: {
    labels: ["Like", "Dislike"],
    datasets: [
      {
        label: "# of Votes",
        data: [likeCount, dislikeCount],
        backgroundColor: [
          "rgba(54, 162, 235, 1)",
          "rgba(255, 99, 132, 1)",
        ],
      },
    ],
  },
  options: {
    responsive: true,
  },
});


// Récupérer les données depuis les balises HTML
const labels = JSON.parse(document.getElementById('labels').value);
const data = JSON.parse(document.getElementById('data').value);

// Créer le graphique
const ctx2 = document.getElementById("chart-2").getContext("2d");
const myChart2 = new Chart(ctx2, {
  type: "bar",
  data: {
    labels: labels,
    datasets: [
      {
        label: "Nombre d'interventions",
        data: data,
        backgroundColor: [
          "rgba(54, 162, 235, 1)",
          "rgba(255, 99, 132, 1)",
          "rgba(255, 206, 86, 1)",
        ],
      },
    ],
  },
  options: {
    responsive: true,
  },
});

