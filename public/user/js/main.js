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

    // pie chart
    var pieChart = document.getElementById("pie--chart");

    if (pieChart) {
      var options = {
        series: [30, 70],
        chart: {
          type: "donut",
          width: 240,
          height: 240,
        },
        colors: ["#FFAC45", "#04BAFF"],
        responsive: [
          {
            breakpoint: 480,
            options: {
              chart: {
                width: 200,
              },
              legend: {
                position: "bottom",
              },
            },
          },
        ],
      };

      var chart2 = new ApexCharts(pieChart, options);
      chart2.render();
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
    var triggers = document.querySelectorAll(".user--area .ticket--actions .action--btn");

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
    // uploadProfileImage 
    function uploadProfileImage() {
      var upload = document.getElementById("upload");
      if (upload) {
        upload.addEventListener("change", function (event) {
          const file = event.target.files[0];
          if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
              document.getElementById("image-preview").src = e.target.result;
            };
            reader.readAsDataURL(file);
          }
        });
      }
    }
    uploadProfileImage();

    // mode toggler 
    function toggle_light_mode() {
      var togglers = document.querySelectorAll(".light-mode-button");
      if (togglers) {
        togglers.forEach((toggler) => {
          toggler.addEventListener("click", function () {
            this.classList.toggle("active");
          });
        });
      }
    }
    toggle_light_mode();


    // user ticket slider 
    $('.ticket-slider').owlCarousel({
      loop:false,
      margin:10,
      nav:true,
      items:1,
      navText: [
        `<svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
        <path d="M6.461 12.762L2.379 8.68l4.082-4.082" stroke="#FAF9F6" stroke-width="1.345" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M13.813 8.681H2.495" stroke="#FAF9F6" stroke-width="1.345" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>`,
        `<svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
        <path d="M10.5391 4.59863L14.6211 8.68063L10.5391 12.7626" stroke="#FAF9F6" stroke-width="1.34497" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M3.1875 8.68164H14.5055" stroke="#FAF9F6" stroke-width="1.34497" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>`
      ]
  })

  // quantity 
  const minusButton = document.querySelector('.minus');
  const plusButton = document.querySelector('.plus');
  const quantityInput = document.getElementById('quantityInput');

  minusButton.addEventListener('click', decreaseQuantity);
  plusButton.addEventListener('click', increaseQuantity);

  updateButtons();

  function updateButtons() {
    const currentValue = parseInt(quantityInput.value);
    const minValue = parseInt(quantityInput.min);
    const maxValue = parseInt(quantityInput.max);
    
    minusButton.classList.toggle('disabled', currentValue <= minValue);
    plusButton.classList.toggle('disabled', currentValue >= maxValue);
  }

  function increaseQuantity() {
    const currentValue = parseInt(quantityInput.value);
    const maxValue = parseInt(quantityInput.max);

    if (currentValue < maxValue) {
      quantityInput.value = currentValue + 1;
      updateButtons();
    }
  }

  function decreaseQuantity() {
    const currentValue = parseInt(quantityInput.value);
    const minValue = parseInt(quantityInput.min);

    if (currentValue > minValue) {
      quantityInput.value = currentValue - 1;
      updateButtons();
    }
  }






    
  });
})(jQuery);
