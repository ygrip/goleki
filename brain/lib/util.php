<?php
class ArrayUtil{
	public static function sortBySubKey(&$array, $subkey, $sortType = SORT_ASC){
		foreach ($array as $subarray) {
			# code...
			$keys[] = $subarray[$subkey];
		}
		array_multisort($keys,$sortType, $array);
	}
}