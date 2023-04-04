<?php
namespace Vulehoangson\Ecommerce\Tests\Units;

use PHPUnit\Framework\TestCase;
use Vulehoangson\Ecommerce\Tests\Examples\Observer;
use Vulehoangson\Ecommerce\Tests\Examples\Subject;

class SubjectTest extends TestCase
{
    public function testObserversAreUpdated(): void
    {
        $observer = $this->getMockBuilder(Observer::class)
            ->onlyMethods(['update'])
            ->getMock();

        $observer->expects($this->exactly(1))
            ->method('update')
            ->with($this->equalTo('test'));

        $subject = new Subject('My Subject');

        $subject->attach($observer)
            ->doSomething('test');
    }

    public function testObserversAreReportedError(): void
    {
        $observer = $this->getMockBuilder(Observer::class)
            ->onlyMethods(['reportError'])
            ->getMock();

        $subject = new Subject('My Subject');

        $observer->expects($this->once())
            ->method('reportError')
            ->with(
                $this->greaterThan(0),
                $this->equalTo('something went wrong'),
                $this->isInstanceOf(Subject::class)
            );

        $subject->attach($observer);

        $subject->doSomethingBad(1, 'something went wrong');
    }
}
