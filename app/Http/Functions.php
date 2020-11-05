<?php  

function getRoleUserArray($mode, $id)
{
	$roles = ['0' => 'Usuario normal', '1' => 'Administrador'];
	if(!is_null($mode)){
		return $roles;
	}else{
		return $roles[$id];		
	}

}
