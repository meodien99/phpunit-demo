<?php
use Madcat\Handler\MemoryHandler;
class MemoryHandlerTest extends PHPUnit_Framework_TestCase {

    /**
     * @var $hander \Madcat\Handler\MemoryHandler
     */
    protected $handler;

    public function setUp(){
        $this->handler = new MemoryHandler();
    }

    public function testImplementHandlerInterface() {
        $this->assertInstanceOf('Madcat\Handler\HandlerInterface', $this->handler);
    }

    public function testWriteToInternal(){
        $this->handler->write("Fri, 17 Oct 2014 23:59:48 +0700","Hello world");
        $this->assertInternalType('array',$this->handler->getEntries());
        $this->assertCount(1,$this->handler->getEntries());
        $this->assertEquals(array('[Fri, 17 Oct 2014 23:59:48 +0700] Hello world'), $this->handler->getEntries());

        $this->handler->write("Sat, 18 Oct 2014 23:59:48 +0700","Hello world");
        $this->assertCount(2,$this->handler->getEntries());
        $this->assertEquals(array(
                '[Fri, 17 Oct 2014 23:59:48 +0700] Hello world',
                '[Sat, 18 Oct 2014 23:59:48 +0700] Hello world'
            ),
            $this->handler->getEntries()
        );
    }
} 