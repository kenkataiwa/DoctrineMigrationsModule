<?php

namespace DoctrineMigrationsModule\Service;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use DoctrineMigrationsModule\Migrations\Configuration;

class ConfigurationFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        // Get config.
        $config = $container->get('configuration');
        $config = $config['doctrine']['migrations'];

        if (isset($config['connection']) && $container->has($config['connection'])) {
            $connection = $container->get($config['connection']);
        } else {
            $connection = $container->get('doctrine.connection.orm_default');
        }
        unset($config['connection']);

        if (isset($config['output_writer']) && $container->has($config['output_writer'])) {
            $outputWriter = $container->get($config['output_writer']);
        } else {
            $outputWriter = null;
        }
        unset($config['output_writer']);

        $configuration = new Configuration($connection, $outputWriter);

        foreach ($config as $key => $value) {
            $setter = 'set' . str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));
            if (!method_exists($configuration, $setter)) {
                continue;
            }
            $configuration->{$setter}($value);
        }

        return $configuration;
    }

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('configuration');

    }
}
