<?php

namespace iSoftMC\iSoftCrates\Commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class crates extends Command{

    public function __construct(){
        parent::__construct("crates");
        $this->setDescription("Main crate command!");
    }
    
    public function execute(CommandSender $sender, string $label, array $args){
        $sender->sendMessage("§b===>§eCrates§b<===");
        $sender->sendMessage("§a/ordinary : open legendary crate.");
        $sender->sendMessage("§a/rare : open rare crate.");
        $sender->sendMessage("§a/mythic : open mythic crate.");
        $sender->sendMessage("§a/legendary : open legendary crate.");
        $sender->sendMessage("§a/key : get crate key.");
        $sender->sendMessage("§a/crates : show all commands of crates.");
        $sender->sendMessage("§b===>§eCrates§b<===");
    }
}
