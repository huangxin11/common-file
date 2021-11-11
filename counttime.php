<?php 

$arr = [
	[9.27,18.35],
	[9.23,18.36]
	// [9.11,18.14],
	// [9.16,18.18],
	// [9.05,18.20],
	// [9.13,18.15],
	// [13.26,18.09],
	// [9.13,18.10],
	// [9.17,18.18],
	// [9.14,18.13],
	// [9.13,18.19],
	// [9.30,18.11]
];
$time_list = [];
foreach ($arr as $key => $value) {
	//$value[0] += 9;
	$a = explode('.',$value[0]);
	$b = explode('.',$value[1]);
	if (count($b) == 1) {
		$b[1] = 0;
	}
	if (count($a) == 1) {
		$a[1] = 0;
	}
	$house = $b[0] - $a[0];
	if (strlen($b[1]) == 1) {
		$b[1] .= 0;
	}
	if (strlen($a[1]) == 1) {
		$a[1] .= 0;
	}
	$minutes = $b[1] - $a[1];
		
	
	if ($minutes < 0) {
		$i = 1;
		while ($minutes < 0) {
			$minutes += (60 * $i);
			$house -= $i;
			$i++;
		}
	 }
	 $time = $house. '.' .$minutes;
	 array_push($time_list, $time);
}

	$result = '';
	foreach($time_list as $k=>$v)
	{
		$a = explode('.', $v);
		$result += ($a[0] * 3600) + ($a[1] * 60) - 9 * 3600;
	}


	
	echo intval($result/3600),'小时',intval(($result%3600)/60),'分钟';
