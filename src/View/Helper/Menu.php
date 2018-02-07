<?php
/*
помощник view для вывода меню
*/

namespace Mf\Menu\View\Helper;

use Zend\View\Helper\AbstractHelper;
use ADO\Service\RecordSet;
use Zend\Navigation\Service\ConstructedNavigationFactory;


/**
 * помощник - вывода СЕО
 */
class Menu extends AbstractHelper 
{
	protected $connection;
	protected $cache;
	protected $rs;
	protected $container;
	protected $_default=[
		"locale"=>"ru_RU",			//имя локали
		"ulClass"=>"navigation",	//класс для ul элемента (сдля стандартного ZEND меню)
		"indent"=>"",
		"minDepth"=>0,				//минимальный уровень вывода
		"maxDepth"=>null,			//максимальный уровень
		"liActiveClass"=>"active",	//имя класса для активного пункта
		"escapeLabels"=>true,		//экранировать метки да/нет
		"addClassToListItem"=>false,
		"OnlyActiveBranch"=>false,	//
		"tpl"=>null,				//сценарий генерации меню
		"cssbootstrap3"=>[			//CSS классы для разных элементов меню bootstrap3
			"container"=>"navbar navbar-default",
		]
	];

/*
*$options - массив опций (см. выше дефолтные объявления), 
* 
*/
public function __invoke($sysname,array $options=[])
{

	$options=array_replace_recursive($this->_default,$options);
	$result = false;
	$key="Menu_".preg_replace('/[^0-9a-zA-Z_\-]/iu', '',$sysname)."_{$options["locale"]}";

    $menu = $this->cache->getItem($key, $result);
    if (!$result){
			$this->rs=new RecordSet();
			$this->rs->MaxRecords=0; 
			$this->rs->CursorType = adOpenKeyset;
			$this->rs->open("select * from menu where sysname='{$sysname}' and locale='{$options["locale"]}' order by poz",$this->connection);
				
			$menu=$this->create_menu_tree(0);
			$this->cache->setItem($key, $menu);
			$this->cache->setTags($key,["menu"]);
	}
	
	$factory    = new ConstructedNavigationFactory($menu);
	$navigation = $factory->createService($this->container);
	
	$view=$this->getView();
	if(in_array($options["tpl"],["bootstrap3"]) ){
		//если указан шаблон, то применим его
		return $view->navigation()->menu($navigation)
				->setPartial($options["tpl"])->setulClass($options["ulClass"])
				->renderPartialWithParams($options);
	}
	//стандартный рендер меню
	$view->navigation()->menu()->setPartial(null);
	return $view->navigation()->menu($navigation)->setulClass($options["ulClass"])
			->setminDepth($options["minDepth"])->setmaxDepth($options["maxDepth"])
			->setindent($options["indent"])->setliActiveClass($options["liActiveClass"])
			->escapeLabels($options["escapeLabels"])->setaddClassToListItem($options["addClassToListItem"])
			->setOnlyActiveBranch($options["OnlyActiveBranch"])
			->render();
}



public function __construct ($connection,$cache,$container)
	{
		$this->connection=$connection;
		$this->cache=$cache;
		$this->container=$container;
	}




/*обход дерева с данного узла (на него указывает RS
возвращает массив пригодный для генерации\Navigation
*/
public function create_menu_tree($subid)
{
	$rs1 =clone $this->rs;
	if ($rs1->EOF) return [];
	$rs1->Filter="subid=".$subid;
	$pages=array();
	while (!$rs1->EOF) {
		$subpages=$this->create_menu_tree($rs1->Fields->Item['id']->Value);
		$pages[]=$this->create_menu_element($rs1,$subpages);
		$rs1->MoveNext();
	}
return $pages;	
}

/*
генерирует массив для одного элемента меню, пригодного для 
добавления в массив и передачи его в \Navigation
*/
protected function create_menu_element(Recordset $rs,$subpages=NULL)
{
	$mvc=array();
	$mvc["label"]=$rs->Fields->Item['label']->Value;
	if ($rs->Fields->Item['url']->Value){ 
		//если указан URL тогда он ставится, MVC игнорируется
		$mvc["uri"]=$rs->Fields->Item['url']->Value;
	} else {
		$_mvc=$rs->Fields->Item['mvc']->Value;
		if (!empty($_mvc)) {
			//если есть MVC тогда добавим текст элемента меню
			$mvc=array_merge($mvc,unserialize($_mvc));
		} else {
			//если не указан MVC тогда пустая ссылка
			$mvc["uri"]="#";
		}
	}
	if (!empty($subpages) && is_array($subpages)) {$mvc['pages']=$subpages;}
return $mvc;	
}




}
