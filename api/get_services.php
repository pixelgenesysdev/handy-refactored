<?php
header('Content-Type: application/json; charset=utf-8');
// Dummy services list - replace with real DB queries later
$services = [
    ['id'=>1,'title'=>'Web Development','description'=>'Full-stack web development','image'=>SITE_URL.'/assets/images/servicesiconbox.png'],
    ['id'=>2,'title'=>'Graphic Design','description'=>'Logos, branding','image'=>SITE_URL.'/assets/images/actionbox1.png'],
    ['id'=>3,'title'=>'SEO Optimization','description'=>'Improve search rankings','image'=>SITE_URL.'/assets/images/actionbox2.png'],
];
echo json_encode(['services'=>$services], JSON_PRETTY_PRINT);
?>