<?php
declare(strict_types=1);
/** Created By Thunder33345 **/

namespace Thunder33345\ArrowDespawner;

use pocketmine\entity\Entity;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class ArrowDespawner extends PluginBase implements Listener
{

	public function onEnable()
	{
		$this->saveDefaultConfig();
		$ticks = (int)$this->getConfig()->get('arrow-lifetime');
		DespawnerArrow::setLifetime($ticks);
		var_dump(Entity::registerEntity(DespawnerArrow::class,false,['Arrow', 'minecraft:arrow']));
	}
}