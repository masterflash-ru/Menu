<?php
namespace Menu\Lib\Func;


class GetMvc
{

public static $cache;

public function __invoke ($obj,$infa,$struct_arr,$pole_type,$pole_dop,$tab_name,$idname,$const,$id,$action,$i__,$j__)
{


if (!isset(self::$cache[$obj->pole_dop[0]]) )
{	//кеш
		self::$cache[$obj->pole_dop[0]]=$obj->EventManager->trigger("GetControllersInfoAdmin",NULL,["locale"=>$obj->pole_dop[0],"name"=>"","container"=>$obj->container]);
}
	$obj->sp['sql'][$j__]['sp_group_array']=[];
	$obj->sp['sql'][$j__]['name']=[];
	$obj->sp['sql'][$j__]['id']=[];
	
	//цикл по контроллерам
	//конвертируем в старый формат
	foreach (self::$cache[$obj->pole_dop[0]] as $name=>$desc)
		{
			//внутри контроллера
			if (is_array($desc))
				{
					foreach ($desc as $meta)
						{
							$obj->sp['sql'][$j__]['sp_group_array'][]=$meta["description"];
							$obj->sp['sql'][$j__]['name'][]=$meta["urls"]['name'];		
							$obj->sp['sql'][$j__]['id'][]=$meta["urls"]['mvc'];
						}
				}
		}
	

return $infa;
}

}
?>