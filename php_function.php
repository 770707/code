<?php

	/** 转换文件尺寸表示字符串
	 * @param  [integer] filesize
	 * @return [string] filesize KB MB GB TB with two dig
	 */
	function func_fileSize($num){
		$p = 0;
		$format='bytes';
		if($num>0 && $num<1024){
			$p = 0;
			return number_format($num).' '.$format;
		}
		if($num>=1024 && $num<pow(1024, 2)){
			$p = 1;
			$format = 'KB';
		}
		if ($num>=pow(1024, 2) && $num<pow(1024, 3)) {
			$p = 2;
			$format = 'MB';
		}
		if ($num>=pow(1024, 3) && $num<pow(1024, 4)) {
			$p = 3;
			$format = 'GB';
		}
		if ($num>=pow(1024, 4) && $num<pow(1024, 5)) {
			$p = 3;
			$format = 'TB';
		}
		$num /= pow(1024, $p);
		return number_format($num, 2).' '.$format;
	}

	/** 判断字符是否在特定分隔的字符串之中
	 * @param  [string] keyword
	 * @param  [string] string with dot
	 * @param  string , / .
	 * @return [boolean]
	 * Example: return func_in_string('a','a,b,c,d',',');
	 */
	function func_in_string($needle,$haystack,$key=',')
	{
		if (gettype($haystack) == 'string') {
			$haystack = explode($key,$haystack);
			if (in_array($needle, $haystack)) {
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}


?>