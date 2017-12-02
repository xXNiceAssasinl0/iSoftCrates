<?php

namespace iSoftMC\iSoftCrates;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\item\Item;
use pocketmine\inventory\Inventory;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\event\Event;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\event\player\PlayerInteractEvent;

class EventListener implements Listener{

    private $main;

    public function __construct(Main $main) {
        $this->main = $main;
    }

    public function getMain(){
        return $this->main;
    }
}
