/* global Chart:false */

$(function () {
  "use strict";

  var ticksStyle = {
    fontColor: "#495057",
    fontStyle: "bold",
  };

  var mode = "index";
  var intersect = true;

  var $salesChart = $("#sales-chart");
  // eslint-disable-next-line no-unused-vars
  var salesChart = new Chart($salesChart, {
    type: "bar",
    data: {
      labels: ["JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"],
      datasets: [
        {
          backgroundColor: "#007bff",
          borderColor: "#007bff",
          data: [1000, 2000, 3000, 2500, 2700, 2500, 3000],
        },
        {
          backgroundColor: "#ced4da",
          borderColor: "#ced4da",
          data: [700, 1700, 2700, 2000, 1800, 1500, 2000],
        },
      ],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        mode: mode,
        intersect: intersect,
      },
      hover: {
        mode: mode,
        intersect: intersect,
      },
      legend: {
        display: false,
      },
      scales: {
        yAxes: [
          {
            // display: false,
            gridLines: {
              display: true,
              lineWidth: "4px",
              color: "rgba(0, 0, 0, .2)",
              zeroLineColor: "transparent",
            },
            ticks: $.extend(
              {
                beginAtZero: true,

                // Include a dollar sign in the ticks
                callback: function (value) {
                  if (value >= 1000) {
                    value /= 1000;
                    value += "k";
                  }

                  return "$" + value;
                },
              },
              ticksStyle
            ),
          },
        ],
        xAxes: [
          {
            display: true,
            gridLines: {
              display: false,
            },
            ticks: ticksStyle,
          },
        ],
      },
    },
  });

  var $visitorsChart = $("#visitors-chart");
  // eslint-disable-next-line no-unused-vars
  var visitorsChart = new Chart($visitorsChart, {
    data: {
      labels: [
        "2008",
        "2009",
        "2010",
        "2011",
        "2012",
        "2013",
        "2014",
        "2015",
        "2016",
        "2017",
      ],
      datasets: [
        {
          type: "line",
          data: [100, 120, 170, 167, 180, 177, 160, 127, 125, 127],
          backgroundColor: "transparent",
          borderColor: "#007bff",
          pointBorderColor: "#007bff",
          pointBackgroundColor: "#007bff",
          fill: false,
          // pointHoverBackgroundColor: '#007bff',
          // pointHoverBorderColor    : '#007bff'
        },
        {
          type: "line",
          data: [60, 80, 70, 67, 80, 77, 100, 147, 135, 147],
          backgroundColor: "transparent",
          borderColor: "red",
          pointBorderColor: "red",
          pointBackgroundColor: "red",
          fill: false,
          // pointHoverBackgroundColor: '#ced4da',
          // pointHoverBorderColor    : '#ced4da'
        },
        {
          type: "line",
          data: [86, 100, 160, 147, 195, 167, 200, 157, 155, 167],
          backgroundColor: "transparent",
          borderColor: "#ced4da",
          pointBorderColor: "#ced4da",
          pointBackgroundColor: "#ced4da",
          fill: false,
          // pointHoverBackgroundColor: '#ced4da',
          // pointHoverBorderColor    : '#ced4da'
        },
      ],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        mode: mode,
        intersect: intersect,
      },
      hover: {
        mode: mode,
        intersect: intersect,
      },
      legend: {
        display: false,
      },
      scales: {
        yAxes: [
          {
            // display: false,
            gridLines: {
              display: true,
              lineWidth: "4px",
              color: "rgba(0, 0, 0, .2)",
              zeroLineColor: "transparent",
            },
            ticks: $.extend(
              {
                beginAtZero: true,
                suggestedMax: 300,
              },
              ticksStyle
            ),
          },
        ],
        xAxes: [
          {
            display: true,
            gridLines: {
              display: false,
            },
            ticks: ticksStyle,
          },
        ],
      },
    },
  });
});
