<?php
namespace Vulehoangson\Ecommerce\Tests\Examples;

class Subject
{
    private array $observers = [];

    public function __construct(private string $name)
    {

    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function attach(Observer $observer): self
    {
        $this->observers[] = $observer;

        return $this;
    }

    protected function notify(string $message)
    {
        foreach ($this->observers as $observer) {
            $observer->update($message);
        }
    }

    public function doSomething(string $message): void
    {
        $this->notify($message);
    }

    public function doSomethingBad(int $errorCode, string $errorMessage)
    {
        foreach ($this->observers as $observer) {
            /**
             * @var Observer $observer
             */
            $observer->reportError($errorCode, $errorMessage, $this);
        }
    }
}
