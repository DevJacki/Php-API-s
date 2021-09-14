<?php
$url = curl_init("https://jsonplaceholder.typicode.com/users/1");
curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
$resp = curl_exec($url);
$data = json_decode($resp);

// for ($i=0; $i < count($data); $i++) {
//     echo $data[$i]->company->name.PHP_EOL;
// }

// foreach ($data as $key => $value) {
//     var_dump($value);
// }

// $user=[
//     'name'=>'Athan',
//     'username'=>'DevAhsan',
//     'email'=>'ahnkhan766@gmail.com'
// ];

// $url = "https://jsonplaceholder.typicode.com/users";
// $resource=curl_init();
// curl_setopt_array($resource,[
// CURLOPT_URL=>$url,
// CURLOPT_RETURNTRANSFER=>true,
// CURLOPT_POST=>true,
// CURLOPT_POSTFIELDS=>json_encode($user),
// CURLOPT_HTTPHEADER=>['content-type:application/json'],
// ]);
// $resp=curl_exec($resource);
// curl_close($resource);
// echo $resp;

// foreach ($data as $key => $value) {
//     echo $key . "\n";
    foreach ($data as $sub_key => $sub_val) {
        // If sub_val is an array then again
        // iterate through each element of it
        // else simply print the value of sub_key
        // and sub_val
        if (is_object($sub_val)) {
            echo "<b>$sub_key</b>" . " : "."<br>";
            foreach ($sub_val as $k => $v) {
                if (is_object($v)) {
                    echo "<b>$k</b>" . " : "."<br>";
                    foreach ($v as $a => $b) {
                        echo "\t" . $a . " = " . $b . "<br>";
                    }
                } else {
                    echo "\t" . $k . " = " . $v . "<br>";
                }
            }
        } else {
            echo $sub_key . " = " . $sub_val . "<br>";
        }
    }
//}
