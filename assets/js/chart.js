function bar_utime_vs_dtime(utime, dtime) {
    var ctx = document.getElementById("bar_utime_vs_dtime").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            datasets: [{
                label: 'Active time',
                data: [utime[0], utime[1], utime[2], utime[3], utime[4], utime[5], utime[6], utime[7], utime[8], utime[9], utime[10], utime[11]],
                backgroundColor: 'rgba(0, 60, 159, 0.2)',
                borderColor: 'rgba(0, 60, 100)',
                borderWidth: 1
            },
            {
                label: 'Idle time',
                data: [dtime[0], dtime[1], dtime[2], dtime[3], dtime[4], dtime[5], dtime[6], dtime[7], dtime[8], dtime[9], dtime[10], dtime[11]],
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

//area chart with similar data to bar_utime_vs_dtime
function area_utime_vs_dtime(utime, dtime){
    var ctx = document.getElementById("area_utime_vs_dtime").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
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

function active_vs_away(active, away){
    var ctx = document.getElementById("active_vs_away_vs_offline").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Active", "Idle"],
            datasets: [{
                label: 'Hours',
                data: [active, away],
                backgroundColor: [
                    'rgba(0, 60, 159, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(0, 60, 159, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1,
                hoverOffset: 9
            }]
        }
    });
}

/********************************************************************
 *                      SCHOOL UPTIME GRAPH                         *
 ********************************************************************/
function area_sc_active(uptime){
	var ctx = document.getElementById("sc_active").getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
			datasets: [{
				label: 'Uptime',
				data: uptime,
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

function sc_active_vs_away(active, away){
    var ctx = document.getElementById("sc_active_vs_away").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Active", "Idle"],
            datasets: [{
                label: 'Hours',
                data: [active, away],
                backgroundColor: [
                    'rgba(0, 60, 159, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(0, 60, 159, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1,
                hoverOffset: 9
            }]
        }
    });
}


function sc_app_stat(labels, data){
    var ctx = document.getElementById("sc_app_stat").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'App usage',
                data: data,
                backgroundColor: 'rgba(0, 60, 100, 0.2)',
                borderColor: 'rgba(0, 60, 100, 1)',
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

function app_stat_only(labels, data){
    var ctx = document.getElementById("app_stat_only").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'App usage (hrs)',
                data: data,
                backgroundColor: 'rgba(0, 60, 100, 0.2)',
                borderColor: 'rgba(0, 60, 100, 1)',
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

function sc_file_stat(labels, data){
    var ctx = document.getElementById("sc_file_stat").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'File Activity (hrs)',
                data: data,
                backgroundColor: 'rgba(0, 60, 100, 0.2)',
                borderColor: 'rgba(0, 60, 100, 1)',
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

function portal_month_sess(data){
    var ctx = document.getElementById("portal_activity").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            datasets: [{
                label: 'Recorded Sessions',
                data: data,
                backgroundColor: 'rgba(0, 60, 100, 0.2)',
                borderColor: 'rgba(0, 60, 100, 1)',
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

function portal_date_sess(label, data, selector){
    var ctx = document.getElementById(selector).getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: label,
            datasets: [{
                label: 'Recorded sessions',
                data: data,
                backgroundColor: 'rgba(0, 60, 100, 0.2)',
                borderColor: 'rgba(0, 60, 100, 1)',
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

function portal_month_ltime(data){
    var ctx = document.getElementById("portal_live_time").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            datasets: [{
                label: 'Monthly Live Time',
                data: data,
                backgroundColor: 'rgba(0, 60, 100, 0.2)',
                borderColor: 'rgba(0, 60, 100, 1)',
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

function portal_date_ltime(label, data, selector){
    var ctx = document.getElementById(selector).getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: label,
            datasets: [{
                label: 'Daily Live Time',
                data: data,
                backgroundColor: 'rgba(0, 60, 100, 0.2)',
                borderColor: 'rgba(0, 60, 100, 1)',
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

function top_applets(label, data, selector){
    var ctx = document.getElementById(selector).getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: label,
            datasets: [{
                label: 'Activities Captured',
                data: data,
                backgroundColor: 'rgba(0, 60, 100, 0.2)',
                borderColor: 'rgba(0, 60, 100, 1)',
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'y',
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

function top_videos(label, data, selector){
    var ctx = document.getElementById(selector).getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: label,
            datasets: [{
                label: 'Activities Captured',
                data: data,
                backgroundColor: 'rgba(0, 60, 100, 0.2)',
                borderColor: 'rgba(0, 60, 100, 1)',
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'y',
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

function top_docs(label, data, selector){
    var ctx = document.getElementById(selector).getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: label,
            datasets: [{
                label: 'Activities Captured',
                data: data,
                backgroundColor: 'rgba(0, 60, 100, 0.2)',
                borderColor: 'rgba(0, 60, 100, 1)',
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'y',
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}