<?php

namespace src;

class Task12
{
    private int $firstValue;
    private int $secondValue;

    public function __construct($firstValue, $secondValue)
    {
        $this->firstValue = $firstValue;
        $this->secondValue = $secondValue;
        $this->result = 0;
    }

    public function add(): static
    {
        $this->result = $this->firstValue + $this->secondValue;

        return $this;
    }

    public function multiply(): static
    {
        $this->result = $this->firstValue * $this->secondValue;

        return $this;
    }

    public function divide(): static
    {
        $this->result = $this->firstValue / $this->secondValue;

        return $this;
    }

    public function subtract(): static
    {
        $this->result = $this->firstValue - $this->secondValue;

        return $this;
    }

    public function addBy(int $num): static
    {
        $this->result = $this->result + $num;

        return $this;
    }

    public function multiplyBy(int $num): static
    {
        $this->result = $this->result * $num;

        return $this;
    }

    public function divideBy(int $num): static
    {
        $this->result = $this->result / $num;

        return $this;
    }

    public function subtractBy(int $num): static
    {
        $this->result = $this->result - $num;

        return $this;
    }

    /**
     * @return int
     */
    public function getResult(): int
    {
        return $this->result;
    }
}

$myCalc = new Task12(12, 6);

echo $myCalc->add()->getResult() . '<br>';
echo $myCalc->multiply()->getResult() . '<br>';
echo $myCalc->add()->divideBy(9)->getResult() . '<br>';
