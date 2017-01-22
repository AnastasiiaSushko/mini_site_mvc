<h2> OUR PRODUCTS </h2>

<p><a href="/1/product/sort/" class="btn btn-default" role="button">Sort products</a> </p>

<div class="row">

    <?php

    foreach ($data['products'] as $product) { ?>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="<?= $product['image'] ?>" alt="<?php echo $product['title'] ?>" style="height: 300px">
                <div class="caption">
                    <h3><?php echo $product['title'] . ' - ' . $product['price'] . ' $' ?></h3>
                    <p><?= $product['description'] ?></p>
                    <p><a href="/1/product/display/<?= $product['id'] ?>" class="btn btn-default" role="button">Open</a>

                </div>
            </div>
        </div>
    <?php } ?>
</div>
