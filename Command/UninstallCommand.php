<?php

namespace Czogori\PgHeroBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Czogori\PgHeroBundle\PgHero;

class UninstallCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('pghero:uninstall')
            ->setDescription('Greet someone')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->getContainer()->get('pg_hero')->uninstall();
    }
}
