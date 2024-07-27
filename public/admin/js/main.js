(function ($) {
  "use strict";

  $(document).ready(function () {
    $("select").niceSelect();

    var SalesChart = document.getElementById("sales--chart");

    if (SalesChart) {
      var options = {
        series: [
          {
            name: "series1",
            data: [
              { x: new Date("2023-01-01").getTime(), y: 0 },
              { x: new Date("2023-02-01").getTime(), y: 30 },
              { x: new Date("2023-03-01").getTime(), y: 70 },
              { x: new Date("2023-04-01").getTime(), y: 50 },
              { x: new Date("2023-05-01").getTime(), y: 20 },
              { x: new Date("2023-06-01").getTime(), y: 70 },
              { x: new Date("2023-07-01").getTime(), y: 0 },
            ],
          },
        ],
        chart: {
          height: 350,
          type: "area",
        },
        dataLabels: {
          enabled: false,
        },
        stroke: {
          curve: "smooth", // Smooth line
          width: 2,
        },
        markers: {
          size: 0,
          hover: {
            size: 6,
          },
        },
        fill: {
          type: "gradient",
          gradient: {
            shadeIntensity: 1,
            opacityFrom: 0.6,
            opacityTo: 0.4,
            stops: [0, 90, 100],
          },
        },
        xaxis: {
          type: "datetime",
          labels: {
            format: "MMM", // Display month name on x-axis
          },
        },
        tooltip: {
          x: {
            format: "MMM", // Display month name in tooltip
          },
        },
      };

      var chart1 = new ApexCharts(SalesChart, options);
      chart1.render();
    }


      // handle locations
    function handleLocations() {
      var locations = document.querySelectorAll(".location");

      if (locations) {
        locations.forEach((location) => {
          var locationCard = location.querySelector(".location--box");
          var pointer = location.querySelector(".pointer");

          pointer.addEventListener("mouseenter", function () {
            locationCard.classList.add("show");
          });

          pointer.addEventListener("mouseleave", function () {
            locationCard.classList.remove("show");
          });
        });
      }
    }
    handleLocations();

    // handleMapSelect
    function handleMapSelect() {
      var title = document.querySelector(".country--details .top--title h3");

      $("#map-select").on("change", function () {
        var selectedText = $(this).find("option:selected").text();
        title.innerText = selectedText;
      });
    }
    handleMapSelect();

    // show popup
    function showPopup(PopElement, Overlay) {
      var Popup = document.getElementById(PopElement);
      var PopOverlay = document.querySelector(Overlay);

      Popup.classList.add("show");
      PopOverlay.classList.add("show");
    }

    function hidePopup(PopElement, Overlay) {
      var Popup = document.getElementById(PopElement);
      var PopOverlay = document.querySelector(Overlay);

      Popup.classList.remove("show");
      PopOverlay.classList.remove("show");
    }

    // show popup for ban user
    var trigger = document.getElementById("ban-user");

    if (trigger) {
      trigger.addEventListener("click", function (e) {
        e.preventDefault();
        showPopup("ban--popup", ".overlay");
      });
    }

    // show popup for refund
    var triggers = document.querySelectorAll('.ticket--actions .action--btn');

    if (triggers) {
      triggers.forEach((btn) => {
        btn.addEventListener("click", function (e) {
          e.preventDefault();
          showPopup("refund--popup", ".overlay");
        });
      });
    }

    // hide popup for ban user
    var closeBtn = document.querySelectorAll(".warning--popup  .popup-close");
    if (closeBtn) {
      closeBtn.forEach((btn) => {
        btn.addEventListener("click", function (e) {
          e.preventDefault();
          hidePopup("ban--popup", ".overlay");
          hidePopup("refund--popup", ".overlay");
        });
      });
    }
  });
})(jQuery);
