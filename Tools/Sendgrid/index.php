<?php
require __DIR__.'/../../autoload.php';

if(isset($_POST)):
    prepr($_POST);
    $sendgrid = new Tools\Sendgrid\Sendgrid;
    $sendgrid->to = 'lewis@cube-design.co.uk';
    $sendgrid->from = 'testing@cube-design.co.uk';
    $sendgrid->subject = 'TEST EMAIL';
    $sendgrid->content = 'THIS IS MY EMAIL';
endif;
?>

<form action="" method="post">
    <label for="email">Email</label>
    <input type="text" name="email">
    <button>Submit</button>
</form>