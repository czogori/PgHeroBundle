<?php

namespace Czogori\PgHeroBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Czogori\PgHeroBundle\PgHero;

class LongRunnigQueriesCommand extends ContainerAwareCommand
{
    use TableTrait;

    protected function configure()
    {
        $this
            ->setName('pghero:long_running_queries')
            ->setDescription('Long running queries.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $items = $this->getContainer()->get('pg_hero')->getLongRunnigQueries();

        $this->populateTable(['PID',	'State',	'Source',	'Duration',	'Waiting',	'Query'],
            ['pid', 'state','source','duration', 'waiting', 'query'], $items)
            ->render($output);
    }
}
