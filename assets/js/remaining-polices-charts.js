var remainingPolicesBarChart = document
    .getElementById("line-chart")
    .getContext("2d");

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
                data: [12, 15, 8, 14, 9, 13, 11, 7, 10, 6, 5, 3],
                backgroundColor: "rgba(255, 99, 132, 0.2)",
                borderColor: "rgba(255, 99, 132, 1)",
                borderWidth: 1,
            },
            {
                label: "Private Car Policy",
                data: [9, 12, 6, 10, 5, 8, 7, 5, 8, 4, 3, 2],
                backgroundColor: "rgba(54, 162, 235, 0.2)",
                borderColor: "rgba(54, 162, 235, 1)",
                borderWidth: 1,
            },
            {
                label: "Commercial Vehicle Policy",
                data: [6, 9, 5, 8, 4, 7, 6, 3, 5, 3, 2, 1],
                backgroundColor: "rgba(255, 206, 86, 0.2)",
                borderColor: "rgba(255, 206, 86, 1)",
                borderWidth: 1,
            },
            {
                label: "Land Transportation Operators Policy",
                data: [14, 18, 10, 16, 11, 15, 13, 9, 12, 8, 7, 5],
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
                    text: "Remaining Policies",
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

var policesBarChart = new Chart(remainingPolicesBarChart, config);
