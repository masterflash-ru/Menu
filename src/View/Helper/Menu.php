<?php
/*
помощник view для вывода СЕО для разных списков

*/

namespace Seolist\View\Helper;

use Zend\View\Helper\AbstractHelper;
use ADO\Service\RecordSet;


/**
 * помощник - вывода СЕО
 */
class Seolist extends AbstractHelper 
{
	protected $connection;
	protected $cache;


public function __invoke($sysname,$locale="ru_RU")
{
	 $result = false;
	 $key="Seolist_".preg_replace('/[^0-9a-zA-Z_\-]/iu', '',$sysname)."_{$locale}";
	
	$rez['title']="";
	$rez['keywords']="";
	$rez['description']="";
     $rez = $this->cache->getItem($key, $result);
     if (!$result)
        {
			$rs=new RecordSet();
			$rs->CursorType = adOpenKeyset;
			$rs->open("select * from seolist where sysname='$sysname' and locale='$locale'",$this->connection);
			if (!$rs->EOF)
				{
					$rez['title']=$rs->Fields->Item["title"]->Value;
					$rez['keywords']=$rs->Fields->Item["keywords"]->Value;
					$rez['description']=$rs->Fields->Item["description"]->Value;
					$this->cache->setItem($key, $rez);
					$this->cache->setTags($key,["Seolist"]);
				}
		}
	$view=$this->getView();
	$view->headTitle($rez['title']);
	$view->headMeta()->appendName('keywords', $rez['keywords']);
	$view->headMeta()->appendName('description', $rez['description']);
	return "";
}



public function __construct ($connection,$cache)
	{
		$this->connection=$connection;
		$this->cache=$cache;
		
	}




}
