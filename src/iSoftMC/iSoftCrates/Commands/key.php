<?php

namespace iSoftMC\iSoftCrates\Commands;

use iSoftCrates\Main;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\item\Item;
use pocketmine\inventory\Inventory;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\level\Level;

class key extends Command{

    public function __construct(){
        parent::__construct("key");
        $this->setDescription("get crate key");
        $this->setAliases(["getkey"]);
    }

    public function execute(CommandSender $sender, string $label, array $args){
            if($sender->hasPermission("isoftcrate.key")){
        $inv = $sender->getInventory();
        $ordinaryname = Item::get(131,1,1);
        $rarename = Item::get(131,2,1);
        $mythicname = Item::get(131,3,1);
        $legendaryname = Item::get(131,4,1);
        if (count($args) < 1){
            $sender->sendMessage("§b===>§eKeys§b<===");
            $sender->sendMessage("§a/key Ordinary §e: §bGet Ordinary key.");
            $sender->sendMessage("§c/key Rare §e: §bGet Rare key.");
            $sender->sendMessage("§6/key Mythic §e: §bGet Mythic key.");
            $sender->sendMessage("§9/key Legendary §e: §bGet Legendary key.");
            $sender->sendMessage("§b===>§eKeys§b<===");
            return false;
        }
        switch ($args[0]){
            case "1":
            case "ordinary":
            case "Ordinary":
            $ordinaryname->setCustomName("§aOrdinary");
            $ordinaryname->setLore(["§7Open a §aOrdinary §7Crate"]);
            $inv->addItem($ordinaryname);
            $sender->sendMessage("§7(§4§l!§r§7) §eYou receive §aOrdinary §eKey.");
            break;
            case "2":
            case "rare":
            case "Rare":
            $rarename->setCustomName("§cRare");
            $rarename->setLore(["§7Open a §cRare §7Crate"]);
            $inv->addItem($rarename);
            $sender->sendMessage("§7(§4§l!§r§7) §eYou receive §cRare §eKey.");
            break;
            case "3":
            case "mythic":
            case "Mythic":
            $mythicname->setCustomName("§6Mythic");
            $mythicname->setLore(["§7Open a §6Mythic §7Crate"]);
            $inv->addItem($mythicname);
            $sender->sendMessage("§7(§4§l!§r§7) §eYou receive §6Mythic §eKey.");
            break;
            case "4":
            case "legendary":
            case "Legendary":
            $legendaryname->setCustomName("§9Legendary");
            $legendaryname->setLore(["§7Open a §9Legendary §7Crate"]);
            $inv->addItem($legendaryname);
            $sender->sendMessage("§7(§4§l!§r§7) §eYou receive §9Legendary §eKey.");
        }
    }else{
        $sender->sendMessage("§7(§4§l!§r§7) §bYou are not allow to do that.");
    }
}
}
