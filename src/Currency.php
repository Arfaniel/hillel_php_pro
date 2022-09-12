<?php

namespace Sandbox;

class Currency
{
    private $isoCode;

    public function __construct($code)
    {
        $this->setIsoCode($code);
    }

    private function setIsoCode($code)
    {
        if (preg_match('/[A-Z]{3}/', $code)) {
            $this->isoCode = $code;
        } else {
            throw new InvalidArgumentException('Invalid currency code');
        }
    }

    public function getIsoCode()
    {
        return $this->isoCode;
    }

    public function equals(Currency $someCurrency)
    {
        if ($someCurrency->getIsoCode() == $this->isoCode) {
            return true;
        } else {
            return false;
        }
    }
}