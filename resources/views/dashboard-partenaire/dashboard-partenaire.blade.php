<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
        <!-- ======= Styles ====== -->
        <link rel="stylesheet" href="{{ asset('css/dashboard/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dashboard/style_demande.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dashboard/main.css') }}">
    </head>
    <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        .parent {
            margin-top: 5rem;
            display: grid;
            grid-template-columns: repeat(2, 1fr);

            grid-column-gap: 0px;
            grid-row-gap: 0px;
        }

        .main {
            padding: 2rem;
        }

        .div1 {
            grid-area: 1 / 1 / 2 / 2;
        }

        .div2 {
            grid-area: 1 / 2 / 2 / 3;
        }
    </style>

    <body>
        <!-- =============== Navigation ================ -->

        <div class="container">
            @include('components.sidebar_dash')
            <div class="main">
                @include('components.navbar_dash')

                <div class="parent">
                    <div class="div1">
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                            // Load the Google Charts library
                            google.charts.load('current', {
                                'packages': ['corechart']
                            });

                            // Set a callback function to draw the chart after the library is loaded
                            google.charts.setOnLoadCallback(drawChart);

                            // Define the function to draw the chart
                            function drawChart() {
                                // Create the data table for the pie chart
                                var data = google.visualization.arrayToDataTable([
                                    ['State', 'Count'],
                                    ['les Demandes Acceptee', {{ $acceptedCount }}],
                                    ['les Demandes Refusee', {{ $refusedCount }}],
                                    ['les Demandes Terminee', {{ $terminerCount }}]
                                ]);

                                // Define the chart options
                                var options = {
                                    title: 'Demandes', // Title of the chart
                                    // No hole in the center, so no pieHole property
                                };

                                // Create a PieChart object and draw the chart in the specified div
                                var chart = new google.visualization.PieChart(document.getElementById('demandChart'));
                                chart.draw(data, options); // Draw the chart with the data and options
                            }
                        </script>

                        <!-- Create a div to contain the pie chart with a specific size -->
                        <div id="demandChart" style="width: 550px; height: 500px;"></div>


                    </div>
                    <div class="div2">
                        <!-- Create a div to contain the pie chart with a specific size -->


                        <!-- Debug output to inspect the data -->

                        <canvas id="commentsChart" style="width: 250px; height: 200px;"></canvas>
                        <!-- Ensure this ID matches in the script -->
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                // Set up the canvas context
                                const ctx = document.getElementById("commentsChart").getContext("2d");

                                // Create the bar chart with three datasets: Likes, Dislikes, Total Comments
                                const chart = new Chart(ctx, {
                                    type: 'bar', // 'bar' chart type
                                    data: {
                                        labels: @json(json_decode($dates)), // Labels for the X-axis (dates)
                                        datasets: [{
                                                label: 'Likes', // Label for this dataset
                                                data: @json(json_decode($likeCounts)), // Data for this dataset
                                                backgroundColor: 'rgba(75, 192, 192, 0.5)', // Color for the bars
                                            },
                                            {
                                                label: 'Dislikes', // Label for this dataset
                                                data: @json(json_decode($dislikeCounts)), // Data for this dataset
                                                backgroundColor: 'rgba(255, 99, 132, 0.5)', // Color for the bars
                                            },
                                            {
                                                label: 'Total Comments', // Label for this dataset
                                                data: @json(json_decode($totalComments)), // Data for this dataset
                                                backgroundColor: 'rgba(54, 162, 235, 0.5)', // Color for the bars
                                            },
                                        ],
                                    },
                                    options: {
                                        scales: {
                                            x: {
                                                type: 'category', // Use category for bar charts with custom labels
                                            },
                                            y: {
                                                beginAtZero: true, // Start the Y-axis at zero
                                            },
                                        },
                                    },
                                });
                            });
                        </script>



                        <div>



                        </div>



                    </div>
                </div>






            </div>


            <!-- =========== Scripts =========  -->
            <script src="/js/js-dash/main.js"></script>

            <!-- ====== ionicons ======= -->
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>

</html>
