<h3>You need to registry to buy products</h3><br>
<form class="form-horizontal" method="post" action="">
    <div class="form-group">
        <label for="login" class="col-sm-2 control-label">Login</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="login" placeholder="Login" name = "login">
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="password3" placeholder="Password" name="password">
        </div>
    </div>

    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="email" placeholder="Email" name="email">
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default" style="clear: both; float: left">Registry</button>
        </div>
    </div>
</form>

<?php
if(isset($_COOKIE['message'])){
    
    echo $_COOKIE['message'];
}


?>

