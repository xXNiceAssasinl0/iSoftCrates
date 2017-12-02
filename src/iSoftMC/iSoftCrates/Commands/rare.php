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

class rare extends Command{

    public $main;

    public function __construct($name, Main $main){
        $this->main = $main;
        parent::__construct("rare");
        $this->setDescription("Open rare crate!");
    }

    public function getMain(){
        return $this->main;
    }

    public function execute(CommandSender $sender, string $label, array $args) : bool{
		if($sender instanceof Player){
		$inv = $sender->getInventory();
		if($inv->contains(Item::get(131,2,1))){
			$level = $sender->getLevel();
			$x = $sender->getX();
			$y = $sender->getY();
			$z = $sender->getZ();
			$pos = new Vector3($x, $y + 2, $z);
			$pos1 = new Vector3($x, $y, $z);
			$name = $sender->getName();
			$level->addSound(new EndermanTeleportSound($pos1));
			$level->addParticle(new LavaParticle($pos1));
			$inv->removeItem(Item::get(131,2,1));
			$this->getMain()->getServer()->broadcastMessage("§eName: §f$name, §bJust opened §cRare §bCrate!");
			$result = rand(1,6);
			     switch($result){
		case 1:
			$inv->addItem(Item::get(265,0,20));
			$sender->sendMessage("§9Rewards> §bYou won 20 IronIngot!");
		     break;
		case 2:
			$inv->addItem(Item::get(264,0,5));
			$sender->sendMessage("§9Rewards> §bYou won 5 diamonds!");
		     break;
		case 3:
		        $inv->addItem(Item::get(322,0,1));
		        $sender->sendMessage("§9Rewards> §bYou won a Golden Apple!");
			 break;
		case 4:
				$i = Item::get(267,0,1);
				$e = Enchantment::getEnchantment(9);
				$e->setLevel(2);
				$i->addEnchantment($e);
				$inv->addItem($i);
				$sender->sendMessage("§9Rewards> §bYou won a Enchanted Iron Sword!"); 
	         break;
	    case 5:
		   	    $inv->addItem(Item::get(466,0,1));
			    $sender->sendMessage("§9Rewards> §bYou won a Enchanted Golden Apple!");
		     break;
	    case 5:
		        $inv->addItem(Item::get(17,0,64));
		        $sender->sendMessage("§9Rewards> §bYou won 64 oak wood!");
	         break;
			     }
		}else{
			$sender->sendMessage("§7[§ciSoftCrates§7]§f You need a §cRare§f key.");
		}

	}else{
		$sender->sendMessage("§cRun this command on Game!");
	}
	return true;
	}
}
