# Doctrine Migrations Module for Zend Framework
[![Build Status](https://travis-ci.org/kenkataiwa/DoctrineMigrationsModule.png)](https://travis-ci.org/kenkataiwa/DoctrineMigrationsModule)
[![Code Coverage](https://scrutinizer-ci.com/g/kenkataiwa/DoctrineMigrationsModule/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/kenkataiwa/DoctrineMigrationsModule/)
[![Latest Stable Version](https://poser.pugx.org/kenkataiwa/doctrine-migrations-module/v/stable.png)](https://packagist.org/packages/kenkataiwa/doctrine-migrations-module)
[![Latest Unstable Version](https://poser.pugx.org/kenkataiwa/doctrine-migrations-module/v/unstable.png)](https://packagist.org/packages/kenkataiwa/doctrine-migrations-module)

## Introduction

This module integrates the [Doctrine Migrations library](https://github.com/doctrine/migrations).
into Zend Framework so that you can load data fixtures programmatically into the Doctrine ORM or ODM.


## Installation

Installation of this module uses composer. For composer documentation, please refer to
[getcomposer.org](http://getcomposer.org/).

```sh
$ composer require kenkataiwa/doctrine-migrations-module
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
```

## Usage

### Command Line

Access the Doctrine command line
