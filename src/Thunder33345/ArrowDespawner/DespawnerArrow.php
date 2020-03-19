<?php
declare(strict_types=1);
/** Created By Thunder33345 **/

namespace Thunder33345\ArrowDespawner;

use pocketmine\entity\Entity;
use pocketmine\entity\projectile\Arrow;

class DespawnerArrow extends Arrow
{
	public const NETWORK_ID = self::ARROW;
	private static $lifetime = 1200;

	public static function setLifetime(int $tick)
	{
		DespawnerArrow::$lifetime = $tick;
	}

	public function entityBaseTick(int $tickDiff = 1):bool
	{
		if($this->closed){
			return false;
		}

		$hasUpdate = Entity::entityBaseTick($tickDiff);

		if($this->blockHit !== null){
			$this->collideTicks += $tickDiff;
			if($this->collideTicks > DespawnerArrow::$lifetime){
				$this->flagForDespawn();
				$hasUpdate = true;
			}
		} else {
			$this->collideTicks = 0;
		}

		return $hasUpdate;
	}
}