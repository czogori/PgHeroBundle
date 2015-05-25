<?php

namespace Czogori\PgHeroBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Czogori\PgHeroBundle\PgHero;

class KillCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('pghero:kill')
            ->addArgument('pid', InputArgument::REQUIRED, 'A pid of query')
            ->setDescription('Kill running query.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $pid = $input->getArgument('pid');
        $this->getContainer()->get('pg_hero')->killQuery($pid);
    }
}
