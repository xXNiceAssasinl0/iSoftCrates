<?php

namespace iSoftMC\iSoftCrates;

use pocketmine\Server;
use pocketmine\Player;

use pocketmine\plugin\PluginBase;

use iSoftMC\iSoftCrates\Commands\crates;
use iSoftMC\iSoftCrates\Commands\key;
use iSoftMC\iSoftCrates\Commands\legendary;
use iSoftMC\iSoftCrates\Commands\mythic;
use iSoftMC\iSoftCrates\Commands\ordinary;
use iSoftMC\iSoftCrates\Commands\rare;

class Main extends PluginBase{

    public function onEnable(){
        $this->getServer()->getCommandMap()->register("crates", new crates("crates", $this));
        $this->getServer()->getCommandMap()->register("key", new key("key", $this));
        $this->getServer()->getCommandMap()->register("legendary", new legendary("legendary", $this));
        $this->getServer()->getCommandMap()->register("mythic", new mythic("mythic", $this));
        $this->getServer()->getCommandMap()->register("ordinary", new ordinary("ordinary", $this));
        $this->getServer()->getCommandMap()->register("rare", new rare("rare", $this));
        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
        $this->getLogger()->info("§aEnabled successfully!");
    }

    public function onDisable(){
        $this->getLogger()->info("§chas been disabled.");
    }
}
