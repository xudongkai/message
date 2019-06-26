<?php 

$target = 7;
$array=[[1,2,8,9],[2,4,9,12],[4,7,10,13],[6,8,11,15]];

function str($target,$array)
{
	foreach ($array as $k => $v) {
		foreach ($v as $i => $j) {
			if ($j=$target) {
				return true;die;
			}
		}
	}
}
var_dump(str($target,$array));

 ?>