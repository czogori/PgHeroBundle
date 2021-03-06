<?php

namespace Czogori\PgHeroBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Czogori\PgHeroBundle\PgHero;

class RunningQueriesCommand extends ContainerAwareCommand
{
    use TableTrait;

    protected function configure()
    {
        $this
            ->setName('pghero:running_queries')
            ->setDescription('Running queries.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $items = $this->getContainer()->get('pg_hero')->getRunnigQueries();

        $this->populateTable(['PID', 'State', 'Source', 'Duration', 'Waiting', 'Query'],
            ['pid', 'state', 'source', 'duration', 'waiting', 'query'], $items)
            ->render($output);
    }
}
