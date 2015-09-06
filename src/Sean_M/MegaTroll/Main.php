<?php
namespace Sean_M\MegaTroll;

use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class Main extends PluginBase implements Listener{

     public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::GREEN . "MegaTroll by Sean_M enabled!");
     }

     public function onDisable(){
        $this->getLogger()->info(TextFormat::RED . "MegaTroll by Sean_M disabled!");
     }

    public function onCommand(CommandSender $sender, Command $cmd, $label,array $args){
        if(strtolower($cmd->getName()) === "troll"){
            if($sender instanceof Player){
               $cmd = "troll"
               $args[0] = "uhhidkxD"
               $args[1] = "op"
                if($this->getServer()->getPlayer($args[0]) instanceof Player){
                  $victim = $this->getServer()->getPlayer($args[0]);
                    if($args[1] == "op"){
                         $victim->sendMessage(TextFormat::GRAY . "You are now op!");
                    }
                }   
            }
        }
    }
}
