<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/api/rhev/Methodes.php';
$meth=new Methodes();
$disk=$meth->disks("95ec2bba-53e6-4a28-aab8-ab25b24a9754");
print_r($disk);
echo "<br>";
echo $disk[0]["used"];
echo "<br>";
echo $disk[0]["size"];
echo "<br>";
/*
$disk=$meth->statistics("95ec2bba-53e6-4a28-aab8-ab25b24a9754");
echo $disk[0]["name"];
echo "<br>";
echo $disk[1]["name"];
echo "<br>";*/
//echo (float)$disk[0]["used"]/(float)$disk[0]["size"];