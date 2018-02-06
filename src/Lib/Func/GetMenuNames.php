<?php
namespace Mf\Menu\Lib\Func;


class GetMenuNames
{


public function __invoke($obj,$infa,$struct_arr,$pole_type,$pole_dop,$tab_name,$idname,$const,$id,$action)
{
	
	$l=$obj->config["menu"];
	if (empty($l)) {throw new \Exception("Нет настроек типов меню в конфигурации приложения.");}

	foreach ($l as $sysname=>$description)
		{
			$obj->dop_sql['name'][]=$description;
			$obj->dop_sql['id'][]=$sysname;
		}
		//это значение по умолчанию
	if  (!$obj->pole_dop[1]) 
		{
			$obj->pole_dop[1]=$obj->dop_sql['id'][0];
			$obj->pole_dop1=$obj->pole_dop[1];
			}
	return $infa;
}
}