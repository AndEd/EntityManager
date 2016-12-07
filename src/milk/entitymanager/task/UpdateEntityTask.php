<?php

namespace milk\entitymanager\task;

use milk\entitymanager\entity\Animal;
use milk\entitymanager\EntityManager;
use pocketmine\scheduler\PluginTask;

class UpdateEntityTask extends PluginTask{

    public function onRun($currentTicks){
        foreach(EntityManager::getEntities() as $entity){
            if($entity->isCreated()) $entity->updateTick();
            if($entity instanceof Animal && $entity->isOnFire()){
                $entity->setDataFlag(self::DATA_FLAGS, self::DATA_FLAG_ONFIRE, false);
            }
        }
    }

}
