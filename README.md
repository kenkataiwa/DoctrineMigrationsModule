# Doctrine Migrations Module for Zend Framework 2

## Introduction

This module integrates the [Doctrine Migrations library](https://github.com/doctrine/data-migrations).
into Zend Framework 2 so that you can load data fixtures programmatically into the Doctrine ORM or ODM.


## Installation

Installation of this module uses composer. For composer documentation, please refer to
[getcomposer.org](http://getcomposer.org/).

```sh
$ composer require kenkataiwa/doctrine-fixture-module
```

Then open `config/application.config.php` and add `DoctrineModule`, `DoctrineORMModule` and 
`DoctrineMigrationsModule` to your `modules`

#### Configuring Migrations

To configure migrations with Doctrine module add the migrations in your configuration.

```php
<?php
return array(
    ...
    'doctrine' => array(
        'migrations' => array(
            'migrations_table' => 'migrations',
            'migrations_namespace' => 'Application',
            'migrations_directory' => './data/migrations',
        ),
    ),
    ...
);
);
```

## Usage

### Command Line

Access the Doctrine command line
