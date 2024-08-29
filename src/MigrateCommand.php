<?php

declare(strict_types=1);

namespace Danilocgsilva\ProjectsManagerCommands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;

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
        $output->writeln("Starting");
        return Command::SUCCESS;
    }
}
