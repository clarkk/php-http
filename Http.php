<?php

namespace Http;

class Headers {
	public function last_modified(){
		$gmt_mtime = gmdate('r', filemtime($_SERVER['SCRIPT_FILENAME']));
		header('Last-Modified: '.$gmt_mtime);
		header('Cache-Control: public');
		
		if(isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && $_SERVER['HTTP_IF_MODIFIED_SINCE'] == $gmt_mtime){
			header('HTTP/1.1 304 Not Modified');
			exit();
		}
	}
}