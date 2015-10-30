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
        if(strtolower($command->getName('troll'))) {
            if($sender instanceof Player){
                 if($sender->hasPermission("troll.commands")){
                if(!empty($args) and $this->getServer()->getPlayer($args[1]) instanceof Player){
                  $victim = $this->getServer()->getPlayer($args[1]);
                    if($args[0] == "op"){
                         $victim->sendMessage(TextFormat::GRAY . "You are now op!");
                    }else{
                         if($args[0] == 'say'){
                              $message = $args[1];
                              $this->getServer()->broadcastMessage($message);
                              return true;
                         }else{
                          if($args[0] == 'tell'){
                               $player = $args[1];
                               if($player->isOnline()){
                              $message = $args[2];
                              $player->sendMessage($message);
                              return true;    
                         }else{
                         $sender->sendMessage(TextFormat::RED."Player not online!");
                         }
                          }
                         }
                    }
                }else{
                         $sender->sendMessage($cmd->getUsage);
                         return true;
                    }
                }else{
                     $sender->sendMessage(TextFormat::RED."You don't have permssions!");
                     return true;
                }   
            }
        return true;
        }
    }
}
