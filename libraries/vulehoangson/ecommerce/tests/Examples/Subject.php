<?php
namespace Vulehoangson\Ecommerce\Tests;

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
}
