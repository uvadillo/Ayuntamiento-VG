// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var creadas = $("#countCreadas")[0].outerText;
var aceptadas = $("#countAceptadas")[0].outerText;
var denegadas = $("#countDenegadas")[0].outerText;
var pendientes = $("#countPendientes")[0].outerText;


var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Aceptado", "Denegado", "En espera","Creada"],
    datasets: [{
      data: [aceptadas, denegadas, pendientes , creadas],
      backgroundColor: ['#55e705', '#c81c1c', '#ffb800','#696969'],
      hoverBackgroundColor: ['#297304', '#751212', '#8d6700','#393939'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
