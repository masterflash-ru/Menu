<?php
namespace Menu\Lib\Func;
$GLOBALS['for_menu_admin_interface_class']=false;


class GetMvc
{


public function __invoke ($obj,$infa,$struct_arr,$pole_type,$pole_dop,$tab_name,$idname,$const,$id,$action,$i__,$j__)
{


if (!$GLOBALS['for_menu_admin_interface_class']) 
{
	$obj->sp['sql'][$j__]['sp_group_array']=[];
	$obj->sp['sql'][$j__]['name']=[];
	$obj->sp['sql'][$j__]['id']=[];
	
	
	$controllers_description=$obj->EventManager->trigger("GetControllersInfoAdmin",NULL,["name"=>"","container"=>$obj->container]);
	//цикл по контроллерам
	//конвертируем в старый формат
	foreach ($controllers_description as $name=>$desc)
		{
			//внутри контроллера
			if (is_array($desc))
				{
					foreach ($desc as $meta)
						{
							$obj->sp['sql'][$j__]['sp_group_array'][]=$meta["description"];
							$obj->sp['sql'][$j__]['name'][]=$meta["urls"]['name'];		
							$obj->sp['sql'][$j__]['id'][]=$meta["urls"]['mvc'];
							//
						}
				}
		}
	
}

$GLOBALS['for_menu_admin_interface_class']=true;
return $infa;
}

}
?>