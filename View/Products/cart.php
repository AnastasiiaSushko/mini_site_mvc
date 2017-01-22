<br>
<br>
<h2> Displaying Cart</h2>

<?php


foreach ($data['products'] as $product){  ?>
    <p><b>Name: </b> <?=$product['title'] ?> </p>
    <p><b>Price: </b><?=$product['price']. '$' ?>  </p>
    <a href="product/display/<?=$product['id']?>"><img src="<?=$product['image']?>" alt="<?=$product['title']?>" style="height: 100px"></a>
    <a href="product/deleteFromCart/<?=$product['id'] ?>" class="btn btn-default" role="button">Delete from cart</a>
<?php }?>



