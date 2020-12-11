<?php /* Template Name: My Api Post Page */
get_header();

$response = wp_remote_get('https://shop.asrar.se/wp-json/wp/v2/posts');
$posts = json_decode(wp_remote_retrieve_body($response));

echo '<div class="latest-posts">';
foreach ($posts as $post) {
    echo '<li><h2>' . $post->title->rendered . '</h2>' . $post->excerpt->rendered . '<a href="' . $post->link . '">Read More</a></li>';
}
echo '</div>';
?>



<!-- with JavaScript Ajax -->
<!-- <button id="myBtn">Hello</button>

<div id="mydiv">SomeText</div>

<script>
var btn = document.getElementById("myBtn");
btn.addEventListener("click", function(param) {

    var ourRequest = new XMLHttpRequest();

    // ourRequest.open('GET', 'https://shop.asrar.se/wp-json/wp/v2/posts');
    ourRequest.open('GET',
        'https://shop.asrar.se/wp-json/wc/v3/orders?consumer_key=ck_xxxxxxxxxxxxx&consumer_secret=cs_xxxxxxxxxxxxxxxxxxxx'
    );


    ourRequest.onload = function() {
        if (ourRequest.status >= 200 && ourRequest.status < 400) {
            var data = JSON.parse(ourRequest.responseText);



        } else {
            console.log("We connected to the server, but it returned an error.");
        }

        for (let index = 0; index < data.length; index++) {
            const element = data[index];


            console.log(element.id);

        }

    };

    ourRequest.onerror = function() {
        console.log("Connection error");
    };

    ourRequest.send();

});
</script> -->