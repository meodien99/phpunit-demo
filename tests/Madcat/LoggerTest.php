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

    public function testRegisterHandlerCorrectly(){
        $handler = $this->getHandlerMock();
        $this->logger->registerHandler('memory', $handler);
        $this->assertSame($handler, $this->logger->getHandlers('memory'));
    }

    public function testRegisterMoreThanOneHandlerCorrectly(){
        $handler = $this->getHandlerMock();
        $handler2 = $this->getHandlerMock();
        $handler3 = $this->getHandlerMock();

        $this->logger->registerHandler('memory', $handler);
        $this->logger->registerHandler('memory2', $handler2);
        $this->logger->registerHandler('memory3', $handler3);

        $this->assertSame($handler, $this->logger->getHandlers('memory'));
        $this->assertSame($handler2, $this->logger->getHandlers('memory2'));
        $this->assertSame($handler3, $this->logger->getHandlers('memory3'));
    }

    public function testPassingCallsToHandlers() {
        $mock = $this->getHandlerMock();

        $mock->expects($this->exactly(2))
                ->method('write')
                ->with (
                    $this->isType('string'),
                    $this->equalTo('Hello!')
                );
        $this->logger->registerHandler('memory', $mock);
        $this->logger->registerHandler('memory2', $mock);

        $this->logger->log('Hello!');
    }

    protected function getHandlerMock(){
        return  $mock = $this->getMock('\Madcat\Handler\HandlerInterface');
    }
}