<?php
$validacija = [];
function validate($data){
    global $validacija;
      if (!preg_match('/[A-Z]./', $_POST['name'])) {
        $validacija[] = "Neteisingai ivestas vardas";
    }
    if (!preg_match('/[A-Z]./', $_POST['lastname'])) {
        $validacija[] = "Neteisingai ivesta pavarde";
    }
    if (!preg_match('/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/', $_POST['email'])) {
        $validacija[] = "Neteisingai ivestas el. pastas";
    }
    if (!preg_match('/^\w{1,200}$/', $_POST['message'])) {
        $validacija[] = "Neteisingai ivestas pranesimas";
    }

    return $validacija;
}

function printData(){
    $data = 'data/zinutes.txt';
    $content = file_get_contents($data);
    $fromData = implode(',',$_POST);
    $content .= $fromData.'/n';
    file_put_contents($data, $content);

    $messages = file_get_contents('data/zinutes.txt', true);
    $messages = explode('/n', $messages);
    foreach ($messages as $message){
        echo "<li>$message</li>";
    }
}
