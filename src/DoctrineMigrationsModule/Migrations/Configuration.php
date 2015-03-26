<?php

namespace DoctrineMigrationsModule\Migrations;

use Doctrine\DBAL\Migrations\Configuration\Configuration AS Migrations_Configuration;

class Configuration extends Migrations_Configuration
{
    private $_isRegistered = false;

    public function setMigrationsDirectory($migrationsDirectory)
    {
        if (!file_exists($migrationsDirectory)) {
            mkdir($migrationsDirectory, 0777, true);
        }

        $migrationsDirectory = realpath($migrationsDirectory);
        parent::setMigrationsDirectory($migrationsDirectory);
        $this->_registerMigrations();
    }

    public function setMigrationsNamespace($migrationsNamespace)
    {
        parent::setMigrationsNamespace($migrationsNamespace);
        $this->_registerMigrations();
    }

    private function _registerMigrations()
    {
        if ($this->_isRegistered) {
            return true;
        }

        $directory = $this->getMigrationsDirectory();
        $namespace = $this->getMigrationsNamespace();
        if (!$directory || !$namespace) {
            return false;
        }


        $this->registerMigrationsFromDirectory($directory);
        $this->_isRegistered = true;
        return true;
    }
}
