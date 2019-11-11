<?php
if(file_exists("controllers/".$controller."Controller.php")){
	require("controllers/".$controller."Controller.php");
	if(method_exists($controller."Controller",$action)){
		call_user_func(array($controller."Controller", $action));
	}else{
		echo("<script>location.href='index.php?controller=Front&action=error';</script>");
	}
}else{
	echo("<script>location.href='index.php?controller=Front&action=error';</script>");
}
 ?>