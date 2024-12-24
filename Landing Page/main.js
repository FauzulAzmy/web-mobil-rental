// Menu Toggle
const menuBtn = document.getElementById("menu-btn");
const navLinks = document.getElementById("nav-links");

if (menuBtn && navLinks) {
  const menuBtnIcon = menuBtn.querySelector("i");

  menuBtn.addEventListener("click", () => {
    navLinks.classList.toggle("open");
    const isOpen = navLinks.classList.contains("open");
    menuBtnIcon.setAttribute("class", isOpen ? "ri-close-line" : "ri-menu-line");
  });

  navLinks.addEventListener("click", () => {
    navLinks.classList.remove("open");
    menuBtnIcon.setAttribute("class", "ri-menu-line");
  });
}

// ScrollReveal Configuration
if (typeof ScrollReveal !== "undefined") {
  const scrollRevealOption = {
    distance: "50px",
    origin: "bottom",
    duration: 1000,
  };

  ScrollReveal().reveal(".range__card", {
    duration: 1000,
    interval: 500,
  });

  ScrollReveal().reveal(".section__header", {
    ...scrollRevealOption,
    origin: "right",
  });

  ScrollReveal().reveal(".header__image img", {
    ...scrollRevealOption,
    origin: "right",
  });

  ScrollReveal().reveal(".header__content h2", {
    ...scrollRevealOption,
    delay: 500,
  });

  ScrollReveal().reveal(".header__content h1", {
    ...scrollRevealOption,
    delay: 1000,
  });

  ScrollReveal().reveal(".header__content .section__description", {
    ...scrollRevealOption,
    delay: 1500,
  });

  ScrollReveal().reveal(".header__form form", {
    ...scrollRevealOption,
    delay: 2000,
  });

  ScrollReveal().reveal(".about__card", {
    ...scrollRevealOption,
    interval: 500,
  });

  ScrollReveal().reveal(".choose__image img", {
    ...scrollRevealOption,
    origin: "left",
  });

  ScrollReveal().reveal(".choose__content .section__header", {
    ...scrollRevealOption,
    delay: 500,
  });

  ScrollReveal().reveal(".choose__content .section__description", {
    ...scrollRevealOption,
    delay: 1000,
  });

  ScrollReveal().reveal(".choose__card", {
    duration: 1000,
    delay: 1500,
    interval: 500,
  });

  ScrollReveal().reveal(".subscribe__image img", {
    ...scrollRevealOption,
    origin: "right",
  });

  ScrollReveal().reveal(".subscribe__content .section__header", {
    ...scrollRevealOption,
    delay: 500,
  });

  ScrollReveal().reveal(".subscribe__content .section__description", {
    ...scrollRevealOption,
    delay: 1000,
  });

  ScrollReveal().reveal(".subscribe__content form", {
    ...scrollRevealOption,
    delay: 1500,
  });
}

// Deals Tabs Functionality
const tabs = document.querySelector(".deals__tabs");

if (tabs) {
  tabs.addEventListener("click", (e) => {
    const tabContents = document.querySelectorAll(
      ".deals__container .tab__content"
    );

    Array.from(tabs.children).forEach((item) => {
      if (item.dataset.id === e.target.dataset.id) {
        item.classList.add("active");
      } else {
        item.classList.remove("active");
      }
    });

    tabContents.forEach((item) => {
      if (item.id === e.target.dataset.id) {
        item.classList.add("active");
      } else {
        item.classList.remove("active");
      }
    });
  });
}

// Swiper Functionality
if (typeof Swiper !== "undefined") {
  const vehiclePrices = ["Toyota Fortuner Rp425K", "Pajero Sport Rp455K", "Honda Hrv Rp375K", "Wuling Almaz Rp395K", "Honda Brio Rp255K"];
  const priceEl = document.getElementById("select-price");
  const selectCards = document.querySelectorAll(".select__card");

  if (selectCards.length > 0) {
    selectCards[0].classList.add("show__info");
  }

  function updateSwiperImage(eventName, args) {
    if (
      eventName === "slideChangeTransitionStart" &&
      args &&
      args[0]?.realIndex !== undefined
    ) {
      const index = args[0].realIndex;
      if (priceEl) {
        priceEl.innerText = vehiclePrices[index];
      }
      selectCards.forEach((item) => {
        item.classList.remove("show__info");
      });
      selectCards[index].classList.add("show__info");
    }
  }

  const vehicleSwiper = new Swiper(".swiper", {
    loop: true,
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    coverflowEffect: {
      rotate: 0,
      depth: 500,
      modifier: 1,
      scale: 0.75,
      slideShadows: false,
      stretch: -100,
    },
    onAny(event, ...args) {
      updateSwiperImage(event, args);
    },
  });
}

const loginPopup = document.getElementById('popup-overlay');
document.querySelector('.btn1').addEventListener('click', function(event) {
    event.preventDefault(); // Mencegah form submit
    showPopup('loginPopup');
});









