<?php

namespace iSoftMC\iSoftCrates\Commands;

use pocketmine\Player;
use pocketmine\Server;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;

use pocketmine\item\Item;
use pocketmine\item\enchantment\Enchantment;

use pocketmine\level\Level;
use pocketmine\level\particle\LavaParticle;
use pocketmine\level\sound\EndermanTeleportSound;

use pocketmine\math\Vector3;

use pocketmine\inventory\Inventory;

use iSoftMC\iSoftCrates\Main;

class legendary extends Command{

    public $main;

    public function __construct($name, Main $main){
        $this->main = $main;
        parent::__construct("legendary");
        $this->setDescription("Open legendary crate!");
    }

    public function getMain(){
        return $this->main;
    }

    public function execute(CommandSender $sender, string $label, array $args) : bool{
		if($sender instanceof Player){
		$inv = $sender->getInventory();
		if($inv->contains(Item::get(131,4,1))){
			$level = $sender->getLevel();
			$x = $sender->getX();
			$y = $sender->getY();
			$z = $sender->getZ();
			$pos = new Vector3($x, $y + 2, $z);
			$pos1 = new Vector3($x, $y, $z);
			$name = $sender->getName();
			$level->addSound(new EndermanTeleportSound($pos1));
			$level->addParticle(new LavaParticle($pos1));
			$inv->removeItem(Item::get(131,4,1));
			$this->getMain()->getServer()->broadcastMessage("§eName: §f$name, §bJust opened §9Legendary §bCrate!");
			$result = rand(1,8);
			     switch($result){
		case 1:
			$inv->addItem(Item::get(266,0,20));
			$sender->sendMessage("§9Rewards> §bYou won 20 Gold!");
		     break;
		case 2:
			$inv->addItem(Item::get(264,0,10));
			$sender->sendMessage("§9Rewards> §bYou won 10 diamonds!");
		     break;
		case 3:
		        $inv->addItem(Item::get(322,0,2));
		        $sender->sendMessage("§9Rewards> §bYou won 2 Golden Apples!");
			 break;
		case 4:
				$i = Item::get(267,0,1);
				$e = Enchantment::getEnchantment(9);
				$e->setLevel(3);
				$i->addEnchantment($e);
				$inv->addItem($i);
				$sender->sendMessage("§9Rewards> §bYou won a Enchanted Iron Sword!"); 
	         break;
	    case 5:
		   	    $inv->addItem(Item::get(466,0,5));
			    $sender->sendMessage("§9Rewards> §bYou won 5 Enchanted Golden Apple!");
		     break;
	    case 6:
		        $inv->addItem(Item::get(17,5,64));
		        $sender->sendMessage("§9Rewards> §bYou won 64 spruce wood!");
			 break;
		case 7:
				$inv->addItem(Item::get(310,0,1));
				$inv->addItem(Item::get(311,0,1));
				$inv->addItem(Item::get(312,0,1));
				$inv->addItem(Item::get(313,0,1));
				$sender->sendMessage("§9Rewards> §bYou won full set of Diamond Armor!");
	         break;
	    case 8:
	            $inv->addItem(Item::get(388,0,20));
	            $sender->sendMessage("§9Rewards> §bYou won 20 crate key!");
	break;
			     }
		}else{
			$sender->sendMessage("§7[§ciSoftCrates§7]§f You need a §9Legendary§f key.");
		}

	}else{
		$sender->sendMessage("§cRun this command on Game!");
	}
	return true;
	}
}
