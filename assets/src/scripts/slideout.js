import Slideout from "slideout";

const initMobileNavi = () => {
    const slideout = new Slideout({
        panel: document.querySelector(".site-container"),
        menu: document.querySelector("#mobile-menu"),
        padding: 256,
        tolerance: 70,
        easing: "ease-in-out",
        side: "right",
        touch: false
    });

    const fixed = document.querySelector(".site-header");

    let toggleButton = document.querySelector(".toggle-button");
    let closeMobNavi = document.querySelector(".close-mob-navi");
    let mobileNaviButtons = document.querySelectorAll(
        "#nav-mobile-menu > ul li > a"
    );

    mobileNaviButtons.forEach(element => {
        element.addEventListener("click", event => {
            slideout.close();
        });
    });

    if (toggleButton) {
        toggleButton.addEventListener("click", function() {
            slideout.toggle();
        });
    }
    if (closeMobNavi) {
        closeMobNavi.addEventListener("click", function() {
            slideout.close();
        });
    }

    slideout.on("translate", function(translated) {
        fixed.style.transform = "translateX(" + translated + "px)";
    });

    slideout.on("beforeopen", function() {
        fixed.style.transition = "transform 300ms ease";
        fixed.style.transform = "translateX(256px)";
    });

    slideout.on("beforeclose", function() {
        fixed.style.transition = "transform 300ms ease";
        fixed.style.transform = "translateX(0px)";
    });

    slideout.on("open", function() {
        fixed.style.transition = "";
    });

    slideout.on("close", function() {
        fixed.style.transition = "";
    });
};

window.addEventListener("DOMContentLoaded", initMobileNavi);
