<?php

namespace Tests\Helpers;

class Counter implements CounterInterface
{
    private ?int $counter = null;

    public function setCount(int $counter): void
    {
        $this->counter = $counter;
    }

    public function getCount(): ?int
    {
        return $this->counter;
    }
}