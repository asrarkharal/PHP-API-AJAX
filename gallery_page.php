<?php /* Template Name: My Api Gallery Page */
get_header();

// --------------Media----------
echo '<hr>';
$response1 = wp_remote_get('https://shop.asrar.se/wp-json/wp/v2/media');
$media = json_decode(wp_remote_retrieve_body($response1));

echo '<div class="latest-pics">';
foreach ($media as $mdd) {
    echo '<div class= "imgBox">';
    echo '<img class = "immi" src ="' . $mdd->guid->rendered . '">';
    echo '</div>';
}
echo '</div>';