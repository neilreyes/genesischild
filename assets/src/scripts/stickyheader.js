import _ from "lodash";

const checkHeader = _.throttle(() => {
    let scrollPosition = Math.round(window.scrollY);

    if (scrollPosition > 174) {
        document.querySelector(".site-header").classList.add("sticky");
    } else {
        document.querySelector(".site-header").classList.remove("sticky");
    }
}, 300);

window.addEventListener("scroll", checkHeader);
