<?php
namespace Madcat\Handler;

interface HandlerInterface {
    public function write($timestamp, $message);
} 