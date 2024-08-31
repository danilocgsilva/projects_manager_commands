<?php

declare(strict_types=1);

namespace Danilocgsilva\ProjectsManagerCommands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;
use Danilocgsilva\ProjectsManager\Migrations\MigrationManager;
use PDO;

class MigrateCommand extends Command
{
    protected function configure(): void
    {
        parent::configure();

        $this->setName('migrate');
        $this->setDescription('Migrate database');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $migrateManager = new MigrationManager(
            new PDO(
                sprintf(
                    "mysql:host=%s;dbname=%s",
                    getenv('PROJECT_MANAGER_DB_HOST'),
                    getenv('PROJECT_MANAGER_DB_DATABASE')
                ),
                getenv('PROJECT_MANAGER_DB_USER'),
                getenv('PROJECT_MANAGER_DB_PASS')
            )
        );
        $output->writeln($migrateManager->getNextMigrationClass());
        return Command::SUCCESS;
    }
}
