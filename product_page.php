<?php /* Template Name: My Api Product Page */
get_header();

// https://yourdomain.se/wp-json/wc/v3/orders?consumer_key=XXXXXX&consumer_secret=XXXXX
// https://shop.asrar.se/wp-json/wc/v3/products
// ck_xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// cs_8xxxxxxxxxxxxxxxxxxxxxxxxxxxx
?>

<?php
$response = wp_remote_get('https://shop.asrar.se/wp-json/wc/v3/products?consumer_key=ck_xxxxxxxxx&consumer_secret=cs_xxxxxxxxxxxxxxxxxx');
$posts = json_decode(wp_remote_retrieve_body($response));
?>

<h2>Poduct List</h2>
<table>
    <tr>
        <th>Product Image</th>
        <th>Product Name </th>
        <th>Category</th>
        <th>Price</th>
    </tr>
    <?php
    foreach ($posts as $post) {

        echo '<tr>
        <td><div id = "tableimgBox"><img src="' . $post->images[0]->src . '"></div></td>
        <td>' . $post->name . '</td>
        <td>' . $post->categories[0]->name . '</td>
        <td>' . $post->price . '</td>
    </tr>';
    }

    ?>
</table>