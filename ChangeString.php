<?php
Class ChangeString{
	function build($string){
		$start_string = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','ñ','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','Ñ','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		$replace_string = array('b','c','d','e','f','g','h','i','j','k','l','m','n','ñ','o','p','q','r','s','t','u','v','w','x','y','z','a','B','C','D','E','F','G','H','I','J','K','L','M','N','Ñ','O','P','Q','R','S','T','U','V','W','X','Y','Z','A');
		$new_string = '';
		$tmp_string = '';
		$totlen = strlen($string);
		for($i=0;$i<$totlen;$i++){
			$tmp_string = substr($string, $i,1);
			$indice = -1;
			for($j=0;$j<count($start_string);$j++){
				if($tmp_string == $start_string[$j]){
					$indice = $j;
				}
			}
			if($indice>-1){
				$new_string .= $replace_string[$indice];
			}else{
				$new_string .= $tmp_string;
			}
		}

		echo $new_string;
		
	}
}
// El equipo no cuenta con WAMPSERVER, EDITOR DE CODIGO Y GIT
// Yo tenia cuenta en bitbucket, y acabo de crear en github, pero no hay GIT para subir el archivo
?>