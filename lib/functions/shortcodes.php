<?php
// Add Shortcode
function ray_get_year()
{
    $year = date('Y');
    echo $year;
}
add_shortcode('ray_year', 'ray_get_year');
