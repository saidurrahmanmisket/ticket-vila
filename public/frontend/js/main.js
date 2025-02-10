$(document).ready(function () {
  // initializing AOS
  AOS.init({
    once: true,
    disable: "mobile",
  });

  // initializing counter up
  $(".single--facts").each(function () {
    var $this = $(this);
    $this.on("inview", function (event, visible) {
      if (visible) {
        $this.find(".main span").each(function () {
          var $counter = $(this);
          $({ Counter: 0 }).animate(
            { Counter: $counter.text() },
            {
              duration: 2000,
              easing: "swing",
              step: function () {
                $counter.text(Math.ceil(this.Counter));
              },
            }
          );
        });
        $this.unbind("inview");
      }
    });
  });

  // navbar shadow on scroll
  const navTransform = () => {
    let header = document.querySelector("header");
    let navbar = document.querySelector(".header--content--wrapper");

    if (navbar) {
      const getPosition = () => {
        let scrollPos = window.scrollY;

        if (scrollPos > 80) {
          header.classList.add("shadow--nav");
          header.classList.add("active");
        } else {
          header.classList.remove("shadow--nav");
          header.classList.remove("active");
        }
      };

      document.addEventListener("scroll", getPosition);
      document.addEventListener("load", getPosition);
    }
  };

  navTransform();

  // home chance slider
  const homeChanceSlider = () => {
    let wrapper = document.querySelector(".home--chance--area--content");

    if (wrapper) {
      $(".home--chance--area--content .owl-carousel").owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        responsive: {
          0: {
            items: 1,
          },
          576: {
            items: 2,
          },
          768: {
            items: 3,
          },
          1000: {
            items: 4,
            margin: 30,
          },
        },
      });
    }
  };

  homeChanceSlider();

  // the process animation
  const processAnimation = () => {
    let wrapper = document.querySelector(".the--process--area--content");

    if (wrapper) {
      const processes = wrapper.querySelectorAll(".single--process");
      processes.forEach((process, index) => {
        let imgContainer = process.querySelector(".img--container");
        let textArea = process.querySelector(".text--area");

        imgContainer.setAttribute("data-aos-duration", "600");
        textArea.setAttribute("data-aos-duration", "800");

        if ((index + 1) % 2 === 0) {
          imgContainer.setAttribute("data-aos", "fade-left");
          textArea.setAttribute("data-aos", "fade-right");
        } else {
          textArea.setAttribute("data-aos", "fade-left");
          imgContainer.setAttribute("data-aos", "fade-right");
        }
      });
      // Reinitialize AOS to recognize the new attributes
      AOS.init();
    }
  };
  processAnimation();

  const ticketAnimation = () => {
    let wrapper = document.querySelector(".ticket--chance--area--wrapper");

    if (wrapper) {
      let imgBox = wrapper.querySelector(".img--box");
      let baseHolder = wrapper.querySelector(".base--holder");

      $(".ticket--chance--area--content .gold--link").on(
        "inview",
        function (event, visible) {
          if (visible) {
            imgBox.classList.add("active");
            baseHolder.classList.add("active");
          }
        }
      );
    }
  };

  ticketAnimation();

  const teamMemberAnimation = () => {
    let wrapper = document.querySelector(".meet--team--area--content");

    if (wrapper) {
      let members = wrapper.querySelectorAll(".single--member");
      let value = 400;

      members.forEach((item) => {
        item.setAttribute("data-aos", "fade-up");
        item.setAttribute("data-aos-duration", value);

        value += 100;
      });

      // initializing the AOS
      AOS.init();
    }
  };

  teamMemberAnimation();

  // password show hide
  const passShow = () => {
    let wrappers = document.querySelectorAll(
      ".auth--main--area--wrapper .single--input.pass"
    );

    if (wrappers) {
      wrappers.forEach((wrapper) => {
        let trigger = wrapper.querySelector(".show--pass");

        if (trigger) {
          let input = wrapper.querySelector("input");

          trigger.addEventListener("click", () => {
            console.log("first");

            console.log(input.type);
            if (input.type === "text") {
              input.type = "password";
            } else {
              input.type = "text";
            }

            wrapper.classList.toggle("active");
          });
        }
      });
    }
  };

  passShow();

  const otpInput = () => {
    let wrapper = document.querySelector(".auth--main--area--wrapper.verify");

    if (wrapper) {
      var otp_inputs = document.querySelectorAll(".otp__digit");
      var mykey = "0123456789".split("");
      otp_inputs.forEach((_) => {
        _.addEventListener("keyup", handle_next_input);
      });
      function handle_next_input(event) {
        let current = event.target;
        let index = parseInt(current.classList[1].split("__")[2]);
        current.value = event.key;

        if (event.keyCode == 8 && index > 1) {
          current.previousElementSibling.focus();
        }
        if (index < 6 && mykey.indexOf("" + event.key + "") != -1) {
          var next = current.nextElementSibling;
          next.focus();
        }
        var _finalKey = "";
        for (let { value } of otp_inputs) {
          _finalKey += value;
        }
      }
    }
  };

  otpInput();

  const contactFormFunction = () => {
    let wrapper = document.querySelector(".contact--form");

    if (wrapper) {
      let submitBtn = wrapper.querySelector(".submit");
      let allInputs = wrapper.querySelectorAll("input");

      // Function to check if all inputs are filled
      const checkInputs = () => {
        let allFilled = true;
        allInputs.forEach((input) => {
          if (!input.value) {
            allFilled = false;
          }
        });

        if (allFilled) {
          submitBtn.classList.remove("disabled");
        } else {
          submitBtn.classList.add("disabled");
        }
      };

      // Initial check in case the form is already filled
      checkInputs();

      // Listening to user inputs
      allInputs.forEach((singleInput) => {
        singleInput.addEventListener("input", checkInputs);
      });

      // Prevent form submission if disabled
      submitBtn.addEventListener("click", (event) => {
        if (submitBtn.classList.contains("disabled")) {
          event.preventDefault();
        }
      });
    }
  };

  contactFormFunction();

  const houseTourAutoPlay = () => {
    let wrappers = document.querySelectorAll(".house--tour--area--content");

    if (wrappers) {
      wrappers.forEach((wrapper) => {
        let targetPosition = wrapper.offsetTop - 120;

        function playVideo() {
          let scrollPos = window.scrollY;

          if (scrollPos >= targetPosition) {
            // playing the video inside of it
            let video = wrapper.querySelector("iframe");
            let source = video.getAttribute("src");
            video.setAttribute("src", `${source}&autoplay=1`);

            // removing the event listner after done
            document.removeEventListener("scroll", playVideo);
          }
        }

        document.addEventListener("scroll", playVideo);
      });
    }
  };
  // houseTourAutoPlay();

  const raffleRulesAnimation = () => {
    let wrapper = document.querySelector(".raffle--rules--content--wrapper ");

    if (wrapper) {
      let contents = wrapper.querySelectorAll(".single--raffle--rule");

      console.log(contents);

      contents.forEach((content, index) => {
        if (index % 2 === 0) {
          let leftSide = content.querySelector(".left");
          let rightSide = content.querySelector(".right");

          leftSide.setAttribute("data-aos", "fade-right");
          rightSide.setAttribute("data-aos", "fade-left");

          // adding duration
          leftSide.setAttribute("data-aos-duration", "500");
          rightSide.setAttribute("data-aos-duration", "600");
        } else {
          let leftSide = content.querySelector(".left");
          let rightSide = content.querySelector(".right");

          leftSide.setAttribute("data-aos", "fade-left");
          rightSide.setAttribute("data-aos", "fade-right");

          // adding duration
          leftSide.setAttribute("data-aos-duration", "500");
          rightSide.setAttribute("data-aos-duration", "600");
        }

        // re initializng aos
        AOS.init();
      });
    }
  };

  raffleRulesAnimation();

  const houseGridAnimation = () => {
    let wrappers = document.querySelectorAll(".house--image--grid--wrapper");

    if (wrappers) {
      wrappers.forEach((wrapper) => {
        let holders = wrapper.querySelectorAll(".img--holder");

        holders.forEach((item) => {
          item.setAttribute("data-aos", "fade-up");
          item.setAttribute("data-aos-duration", "500");
        });

        // reinitializing AOS
        AOS.init();
      });
    }
  };

  houseGridAnimation();

  // navbar hamburger icon
  const hamburger = () => {
    let wrapper = document.querySelector(".header--content--wrapper");

    if (wrapper) {
      let menuLinks = wrapper.querySelector(
        ".header--content--wrapper .menu--links"
      );

      let icon = wrapper.querySelector(".hamburger--icon");

      icon.addEventListener("click", () => {
        icon.classList.toggle("active");
        menuLinks.classList.toggle("active");
      });

      // closing the nav menu on outside click
      document.addEventListener("click", (event) => {
        if (!menuLinks.contains(event.target) && !icon.contains(event.target)) {
          icon.classList.remove("active");
          menuLinks.classList.remove("active");
        }
      });
    }
  };
  hamburger();

  // initializing nice select
  $(".home--checkout--content select").niceSelect();

  // landing website buying ticket functionality
  const shopBuyTicket = () => {
    let wrappers = document.querySelectorAll(
      ".ticket--purchase--amount--wrapper"
    );

    if (wrappers) {
      wrappers.forEach((wrapper) => {
        let plus = wrapper.querySelector(".plus");
        let minus = wrapper.querySelector(".minus");
        let input = wrapper.querySelector("input");

        // increasing function
        function increase() {
          let value = parseInt(input.value);

          if (value < 9) {
            value++;
            input.value = value;
          }
        }
        // decreasing function
        function decrease() {
          let value = parseInt(input.value);

          if (value > 1) {
            value--;
            input.value = value;
          }
        }

        plus.addEventListener("click", () => {
          increase();
        });

        minus.addEventListener("click", () => {
          decrease();
        });
      });
    }
  };

  shopBuyTicket();

  // navbar cart button function
  const navCart = () => {
    let wrapper = document.querySelector(".add--cart--wrapper");

    if (wrapper) {
      let icon = wrapper.querySelector(".icon");
      let content = wrapper.querySelector(".content");
      let close = wrapper.querySelector(".close");

      // opeing cart
      icon.addEventListener("click", () => {
        content.classList.add("active");
      });

      // closing cart
      close.addEventListener("click", () => {
        content.classList.remove("active");
      });

      document.addEventListener("click", (event) => {
        if (!icon.contains(event.target) && !content.contains(event.target)) {
          content.classList.remove("active");
        }
      });
    }
  };

  navCart();
});
