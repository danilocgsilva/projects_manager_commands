<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use DI\ContainerBuilder;
use Symfony\Component\Console\Application;
use Danilocgsilva\ProjectsManagerCommands\MigrateCommand;

require_once __DIR__ . '/vendor/autoload.php';

/** @var ContainerInterface $container */
$container = (new ContainerBuilder())->build();

/** @var Application $application */
$application = $container->get(Application::class);
$application->add($container->get(MigrateCommand::class));
$application->run();
