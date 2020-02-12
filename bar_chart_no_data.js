//var line_chart_id = document.currentScript.getAttribute('chart_id'); //Sent as a parameter from the page

//var ctx = $('#'+line_chart_id);
var ctx = $('#dashboard_bar_chart');
var bar_chart = new Chart(ctx, {
	type: 'bar',
	data: {}, //filled up from server
	options: {
	   scales: {
            yAxes: [
                {
                    ticks: {
                        beginAtZero: true,
                        callback: function(label, index, labels) {
                            return  ' $' + label.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");//replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                            //return label/1000+'k';
                        }
                    }
                }
            ]
        },
        legend: {
			display: false
		},
        tooltips: {
           mode: 'label',
           label: 'mylabel',
           callbacks: {
               label: function(tooltipItem, data) {
                   return ' $' + tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","); 
               } 
           }
        }
    }
});
