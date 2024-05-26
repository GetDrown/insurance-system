var ctx4 = document.getElementById("donut-chart").getContext("2d");

var config4 = {
    type: "doughnut",
    data: {
        labels: ["Policy 1", "Policy 2", "Policy 3", "Policy 4"],
        datasets: [
            {
                // label: "Policies Avail Distribution",
                data: [30, 25, 20, 10], // Example data, replace with your actual data
                backgroundColor: [
                    "rgba(255, 99, 132, 0.6)",
                    "rgba(54, 162, 235, 0.6)",
                    "rgba(255, 206, 86, 0.6)",
                    "rgba(75, 192, 192, 0.6)",
                ],
                borderColor: [
                    "rgba(255, 99, 132, 1)",
                    "rgba(54, 162, 235, 1)",
                    "rgba(255, 206, 86, 1)",
                    "rgba(75, 192, 192, 1)",
                ],
                borderWidth: 1,
            },
        ],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: "right",
            },
            tooltip: {
                callbacks: {
                    label: function (context) {
                        var label = context.label || "";
                        var value = context.raw || 0;
                        return label + ": " + value + "%";
                    },
                },
            },
        },
    },
};

var donutChart = new Chart(ctx4, config4);
