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

class mythic extends Command{
	
		public $main;
	
		public function __construct($name, Main $main){
			$this->main = $main;
			parent::__construct("mythic");
			$this->setDescription("Open mythic crate!");
		}
	
		public function getMain(){
			return $this->main;
		}
	
		public function execute(CommandSender $sender, string $label, array $args) : bool{
		if($sender instanceof Player){
		$inv = $sender->getInventory();
		if($inv->contains(Item::get(131,3,1))){
			$level = $sender->getLevel();
			$x = $sender->getX();
			$y = $sender->getY();
			$z = $sender->getZ();
			$pos = new Vector3($x, $y + 2, $z);
			$pos1 = new Vector3($x, $y, $z);
			$name = $sender->getName();
			$level->addSound(new EndermanTeleportSound($pos1));
			$level->addParticle(new LavaParticle($pos1));
			$inv->removeItem(Item::get(131,3,1));
			$this->getMain()->getServer()->broadcastMessage("§eName: §f$name, §bJust opened §6Mythic §bCrate!");
			$result = rand(1,9);
			     switch($result){
		case 1:
            $inv->addItem(Item::get(266,0,20));
            $inv->addItem(Item::get(265,0,20));
            $inv->addItem(Item::get(264,0,20));
            $inv->addItem(Item::get(351,0,20));
            $inv->addItem(Item::get(263,0,20));
			$sender->sendMessage("§9Rewards> §bYou won 20 of all ores!");
		     break;
		case 2:
			$inv->addItem(Item::get(264,0,30));
			$sender->sendMessage("§9Rewards> §bYou won 30 diamonds!");
		     break;
		case 3:
		        $inv->addItem(Item::get(322,0,20));
		        $sender->sendMessage("§9Rewards> §bYou won 20 Golden Apples!");
			 break;
		case 4:
				$i = Item::get(276,0,1);
				$e = Enchantment::getEnchantment(9);
                $e->setLevel(3);
                $e1 = Enchantment::getEnchantment(12);
                $e1->setLevel(2);
                $e2 = Enchantment::getEnchantment(13);
                $e2->setLevel(2);
                $i->addEnchantment($e);
                $i->addEnchantment($e1);
                $i->addEnchantment($e2);
                $i->setCustomName("§6§lMythic§bSword");
				$inv->addItem($i);
				$sender->sendMessage("§9Rewards> §bYou won a Enchanted §6§lMythic§bSword!"); 
	         break;
	    case 5:
		   	    $inv->addItem(Item::get(466,0,15));
			    $sender->sendMessage("§9Rewards> §bYou won 15 Enchanted Golden Apple!");
		     break;
	    case 6:
		        $inv->addItem(Item::get(17,5,64));
		        $sender->sendMessage("§9Rewards> §bYou won 64 spruce wood!");
			 break;
		case 7:
				$i = Item::get(276,0,1);
				$e = Enchantment::getEnchantment(9);
				$e->setLevel(5);
				$i->addEnchantment($e);
				$inv->addItem($i);
				$sender->sendMessage("§9Rewards> §bYou won a Enchanted Diamond Sword!");
		     break;
        case 8:
                $chest = Item::get(311,0,1);
                $e = Enchantment::getEnchantment(1);
                $e->setLevel(4);
                $chest->addEnchantment($e);
                $inv->addItem(Item::get(310,0,1));
                $inv->addItem($chest);
                $inv->addItem(Item::get(312,0,1));
                $inv->addItem(Item::get(313,0,1));
				$sender->sendMessage("§9Rewards> §bYou won full set of Diamond Armor with enchanted chestplate!");
	         break;
	    case 9:
	            $inv->addItem(Item::get(388,0,30));
	            $sender->sendMessage("§9Rewards> §bYou won 30 crate key!");
	break;
			     }
		}else{
			$sender->sendMessage("§7[§ciSoftCrates§7]§f You need a §6Mythic §fkey.");
		}

	}else{
		$sender->sendMessage("§cRun this command on Game!");
	}
	return true;
	}
}
