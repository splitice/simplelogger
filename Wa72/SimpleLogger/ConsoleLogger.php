<?php
namespace Wa72\SimpleLogger;
use Psr\Log\AbstractLogger;
use Symfony\Component\Console\Output\OutputInterface;

class ConsoleLogger extends AbstractLogger {
    /**
     * Logs with an arbitrary level.
     *
     * @param mixed $level
     * @param string $message
     * @param array $context
     * @return null
     */
    public function log($level, $message, array $context = array())
    {
        if($level == 'debug'){
            return;
        }
        foreach($context as $k=>$v){
            if(strpos($message, '{'.$k.'}') !== false){
                $message = str_replace('{'.$k.'}',(string)$v, $message);
            }
        }
        $message = '<'. $level . '>' . $message . '</'. $level . '>'. "\r\n";
        echo $message;
    }
}
