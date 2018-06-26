<?php
require __DIR__.'/../../autoload.php';
 
if(isset($_POST['email'])):
    prepr($_POST);
    $sendgrid = new \Tools\Sendgrid\SendgridWrapper(env('SENDGRID_API_KEY'));
    $sendgrid->to = 'lewis@cube-design.co.uk';
    $sendgrid->from = 'lewis@lcainswebdeveloper.co.uk';
    //$sendgrid->from = [$_POST['email'], 'Lewis Cains'];
    $sendgrid->subject = 'TEST EMAIL';
    $sendgrid->content = '<h1>THIS IS MY EMAIL</h1>';
    $sendgrid->returnJson = true;
    $response = $sendgrid->send();
    //prepr($sendgrid);
    prepr($response);
endif;
?>

<form action="" method="post">
    <label for="email">Email</label>
    <input type="text" name="email">
    <button>Submit</button>
</form>