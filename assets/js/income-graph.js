var ctx = document.getElementById("line-graph").getContext("2d");

// Function to generate random fluctuations
function generateRandomFluctuations(baseValue, fluctuationPercentage) {
    var fluctuations = [];
    for (var i = 0; i < 12; i++) {
        var fluctuation =
            baseValue * (fluctuationPercentage / 100) * (Math.random() - 0.5);
        fluctuations.push(fluctuation);
    }
    return fluctuations;
}

// Example data for income per month throughout the year
var baseIncomeData = [
    1000, 800, 1200, 1000, 2000, 1800, 2500, 2200, 1500, 3000, 2800, 3500,
];
var incomeData = baseIncomeData.map(
    (value, index) => value + generateRandomFluctuations(value, 10)[index]
);

var config = {
    type: "line",
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
                label: "Income per Month",
                data: incomeData,
                borderColor: "rgba(75, 192, 192, 1)",
                backgroundColor: "rgba(75, 192, 192, 0.2)",
                tension: 0.5,
                borderWidth: 2,
                pointBackgroundColor: "rgba(75, 192, 192, 1)",
                pointRadius: 4,
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
                    text: "Income (Peros)",
                },
            },
            x: {
                title: {
                    display: false,
                    text: "Month",
                },
            },
        },
    },
};

var lineGraph = new Chart(ctx, config);
