<h3>Contact us!</h3><br>
<form action="" method="post">
    <input type="text" class="form-control" name="name" placeholder="Enter your name"><br>
    <input type="email" class="form-control" name="email" placeholder="Enter your email"><br>
    <textarea name="message" class="form-control" placeholder="Enter your message"></textarea><br>
    <button class="btn btn-default" type="submit">Send</button>
</form>

<?php if(!empty($message)){
    echo $message;
}