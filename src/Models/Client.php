<?php

namespace Cuisine\Models;

class Client
{
    private string $xx;

    public function setXx($xx): void
    {
        $this->xx = $xx;
    }

    public function getXx(): string
    {
        return $this->xx;
    }
}
?>