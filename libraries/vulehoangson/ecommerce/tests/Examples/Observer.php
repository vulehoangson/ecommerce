<?php
namespace Vulehoangson\Ecommerce\Tests\Examples;

class Observer
{
    public function update(string $message)
    {
        // Do something.
    }

    public function reportError($errorCode, $errorMessage, Subject $subject)
    {

    }
}
