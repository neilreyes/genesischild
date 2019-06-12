const initAccordion = () => {
    var tabPanel = document.getElementsByClassName("accord-entry");
    var i;

    for (i = 0; i < tabPanel.length; i++) {
        tabPanel[i].addEventListener("click", function() {
            this.toggleAttribute("active");
        });
    }
};

window.addEventListener("DOMContentLoaded", initAccordion);
