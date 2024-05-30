var salesBarChart = document.getElementById("line-chart").getContext("2d");

var config = {
    type: "bar",
    data: {
        labels: [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December",
        ],
        datasets: [
            {
                label: "Motorcycle Policy",
                data: [50, 60, 40, 70, 55, 65, 75, 80, 90, 85, 95, 100],
                backgroundColor: "rgba(255, 99, 132, 0.2)",
                borderColor: "rgba(255, 99, 132, 1)",
                borderWidth: 1,
            },
            {
                label: "Private Car Policy",
                data: [40, 50, 30, 60, 45, 55, 65, 70, 80, 75, 85, 90],
                backgroundColor: "rgba(54, 162, 235, 0.2)",
                borderColor: "rgba(54, 162, 235, 1)",
                borderWidth: 1,
            },
            {
                label: "Commercial Vehicle Policy",
                data: [30, 40, 20, 50, 35, 45, 55, 60, 70, 65, 75, 80],
                backgroundColor: "rgba(255, 206, 86, 0.2)",
                borderColor: "rgba(255, 206, 86, 1)",
                borderWidth: 1,
            },
            {
                label: "Land Transportation Operators Policy",
                data: [20, 30, 10, 40, 25, 35, 45, 50, 60, 55, 65, 70],
                backgroundColor: "rgba(75, 192, 192, 0.2)",
                borderColor: "rgba(75, 192, 192, 1)",
                borderWidth: 1,
            },
        ],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: "Sales",
                },
            },
            x: {
                title: {
                    display: true,
                    text: "Months",
                },
            },
        },
    },
};

var policesBarChart = new Chart(salesBarChart, config);
