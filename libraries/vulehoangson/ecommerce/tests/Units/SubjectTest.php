<?php
namespace Vulehoangson\Ecommerce\Tests\Units;

use PHPUnit\Framework\TestCase;
use Vulehoangson\Ecommerce\Tests\Observer;
use Vulehoangson\Ecommerce\Tests\Subject;

class SubjectTest extends TestCase
{
    public function testObserversAreUpdated(): void
    {
        $observer = $this->getMockBuilder(Observer::class)
            ->onlyMethods(['update'])
            ->getMock();

        $observer->expects($this->once())
            ->method('update')
            ->with($this->equalTo('test'));

        $subject = new Subject('My Subject');
        $subject->attach($observer)
            ->doSomething('test');
    }
}
