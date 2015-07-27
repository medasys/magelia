<?php

$date1 = date('Y-m-d H:i:s');

$date2 = date('Y-m-d H:i:s', strtotime($date1.'+14 days'));

echo $date1.'<br/>';
echo $date2;