<?php

namespace PhpDus\Bundle\AdminBundle\DataFixtures\ORM;

use Hautelook\AliceBundle\Alice\DataFixtureLoader;

class Loader extends DataFixtureLoader
{
    protected function getFixtures()
    {
        return [__DIR__ . '/loader.yml'];
    }
}