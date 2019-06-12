import $ from "jquery";
import jQuery from "jquery";

window.$ = $;
window.jQuery = jQuery;

import "lightGallery";
import "lg-video";

jQuery("#lightgallery").lightGallery({
    selector: ".lightbox",
    youtubePlayerParams: {
        modestbranding: 1,
        showinfo: 0,
        rel: 0,
        controls: 0
    }
});
