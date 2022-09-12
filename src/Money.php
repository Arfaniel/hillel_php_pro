<?php

namespace Sandbox;

class Money
{
    private $amount;
    private $currency;

    public function __construct($amount, Currency $currency)
    {
        $this->amountSet($amount);
        $this->currencySet($currency->getIsoCode());
    }

    private function amountSet($amount)
    {
        if (is_int($amount) || is_float($amount)) {
            $this->amount = $amount;
        } else {
            throw new InvalidArgumentException('Incorrect amount');
        }
    }

    private function currencySet($currency)
    {
        $this->currency = $currency;
    }

    public function amountGet()
    {
        return $this->amount;
    }

    public function currencyGet()
    {
        return $this->currency;
    }

    public function equals(Money $someMoney)
    {
        if ($this->amount == $someMoney->amountGet() && $this->currency == $someMoney->currencyGet()) {
            return true;
        } else {
            return false;
        }
    }

    public function add(Money $someMoney)
    {
        if ($this->currency == $someMoney->currencyGet()) {
            return new Money($this->amount + $someMoney->amountGet(), new Currency($this->currency));
        } else {
            throw new InvalidArgumentException('Two different currencies cannot be added');
        }
    }
}