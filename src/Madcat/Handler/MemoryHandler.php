<?php
/**
 * Created by PhpStorm.
 * User: madcat
 * Date: 10/17/14
 * Time: 11:45 PM
 */

namespace Madcat\Handler;


class MemoryHandler implements HandlerInterface {

    protected $store = array();

    public function write($timestamp, $message) {
        $this->store[] = sprintf('[%s] %s',$timestamp,$message);
    }

    public function getEntries(){
        return $this->store;
    }
}