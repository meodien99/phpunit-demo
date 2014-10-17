<?php
class LoggerTest extends PHPUnit_Framework_TestCase{

    /**
     * @var $logger \Madcat\Logger
     */
    protected $logger;

    public function setUp(){
        $this->logger = new \Madcat\Logger();
    }

    public function testInstance(){
        $this->assertInstanceOf('\Madcat\Logger', $this->logger);
    }
} 