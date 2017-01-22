<h2> Displaying one product</h2>

<p><b>Name: </b> <?=$data['product']['title'] ?> </p>
<p><b>Price: </b><?=$data['product']['price']. '$' ?>  </p>

<img src="<?=$data['product']['image'] ?>"  style="height: 300px"><br>
<a href="product/addToCart/<?=$data['product']['id'] ?>" class="btn btn-default" role="button">Add to cart</a>