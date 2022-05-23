function bar_utime_vs_dtime(utime, dtime) {
    //sample bar chartjs with data from january to december
    var ctx = document.getElementById("bar_utime_vs_dtime").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            datasets: [{
                label: 'Up time',
                data: [12, 19, 3, 5, 2, 3, 20, 3, 5, 2, 3, 20],
                backgroundColor: 'rgba(0, 60, 159, 0.2)',
                borderColor: 'rgba(0, 60, 100)',
                borderWidth: 1
            },
            {
                label: 'Down time',
                data: [12, 19, 3, 5, 2, 3, 20, 3, 5, 2, 3, 20],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255,99,132,1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

function active_vs_away_vs_offline(active, away, offline){
    var ctx = document.getElementById("active_vs_away_vs_offline").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Active", "Away", "Offline"],
            datasets: [{
                label: '# of Votes',
                data: [active, away, offline],
                backgroundColor: [
                    'rgba(0, 60, 159, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(0, 60, 159, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1,
                hoverOffset: 9
            }]
        }
    });
}