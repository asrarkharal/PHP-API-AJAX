<?php /* Template Name: My Api Order Page */
get_header();


// https://yourdomain.se/wp-json/wc/v3/orders?consumer_key=XXXXXX&consumer_secret=XXXXX


// https://shop.asrar.se/wp-json/wc/v3/products
// ck_xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// cs_xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
?>



<?php
$response = wp_remote_get('https://shop.asrar.se/wp-json/wc/v3/orders?consumer_key=ck_xxxxxxxx&consumer_secret=cs_xxxxxxxxxxx');
$posts = json_decode(wp_remote_retrieve_body($response));
?>

<h2>Orders List</h2>


<table>
    <tr>
        <th>Order Id</th>
        <th>Status </th>
        <th>Total Amount</th>
        <th>Date</th>
    </tr>


    <?php

    foreach ($posts as $post) {

        echo '<tr>
        <td>' . $post->id . '</td>';

        if ($post->status == "completed") {
            echo '<td> <div id = "statusGreen">' . $post->status . '</div></td>';
        } else if ($post->status == "processing") {
            echo '<td><div  id = "statusRed">' . $post->status . '</div></td>';
        } else {
            echo '<td>' . $post->status . '</td>';
        }

        echo '<td>' . $post->total . '</td>';
        echo '<td>' . $post->date_created . '</td>
    </tr>';
    }

    ?>
</table>