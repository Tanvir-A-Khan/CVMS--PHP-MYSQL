<?php

include "./database/dbfuntionalities.php";
// include "./PHPMailer/send_email.php";

if (!isset($_SESSION)) {
    session_start();
}

// echo 'working';
$cid = $_SESSION['CID'];

getchartinfo($cid);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Vaccine Bar Chart</title>

    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

    <!-- ---------IMPORTING NAVBAR------------  -->

    <!-- <?php include "./shared/navbar.php"; ?> -->

    <div style="width: 80%; margin: 0 auto;">
        <canvas id="vaccineChart"></canvas>
    </div>

    <script>
        // PHP data for vaccine names and doses
        <?php
        $vaccines = getchartinfo(1);
        // $vaccines = [
        //     ['name' => 'Vaccine A', 'dose' => 1, 'date1' => '2023-01-01', 'date2' => '2023-03-01'],
        //     ['name' => 'Vaccine A', 'dose' => 2, 'date1' => '2023-03-01', 'date2' => '2023-08-01'],
        //     ['name' => 'Vaccine A', 'dose' => 3, 'date1' => '2023-03-01', 'date2' => '2023-08-01'],
        //     ['name' => 'Vaccine A', 'dose' => 4, 'date1' => '2023-04-01', 'date2' => '2023-010-01']
        //     // Add more data entries as needed
        // ];
        ?>

        // JavaScript data conversion
        var vaccineData = <?php echo json_encode($vaccines); ?>;

        // Prepare data for Chart.js
        var chartData = [];
        vaccineData.forEach(function (vaccine) {
            var diffInDays = Math.abs(new Date(vaccine.date2) - new Date(vaccine.date1)) / (1000 * 60 * 60 * 24);
            chartData.push({
                label: `${vaccine.name} - Dose ${vaccine.dose}`,
                data: [diffInDays],
                backgroundColor: getRandomColor()
            });
        });

        // Generate a random color for each bar
        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        // Chart.js setup
        var ctx = document.getElementById('vaccineChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Difference in Days'],
                datasets: chartData
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Difference in Days'
                        }
                    },
                    x: {
                        // stacked: true,
                        title: {
                            display: true,
                            text: 'Vaccine Name and Dose'
                        }
                    }
                }
            }
        });
        // Prepare data for Chart.js
        var chartData = [];
        var chartLabels = [];

        vaccineData.forEach(function (vaccine) {
            var diffInDays = Math.abs(new Date(vaccine.date2) - new Date(vaccine.date1)) / (1000 * 60 * 60 * 24);
            chartData.push(diffInDays);
            chartLabels.push(`${vaccine.name} - Dose ${vaccine.dose}`);
        });

        // Chart.js setup
        var ctx = document.getElementById('vaccineChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: chartLabels, // Use the labels array for X-axis labels
                datasets: [{
                    data: chartData,
                    backgroundColor: getRandomColor(),
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Difference in Days'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Vaccine Name and Dose'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false, // Hide legend as it's not needed
                    }
                }
            }
        });
    </script>
</body>

</html>