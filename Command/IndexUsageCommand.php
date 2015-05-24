<?php

namespace Czogori\PgHeroBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Czogori\PgHeroBundle\PgHero;

class IndexUsageCommand extends ContainerAwareCommand
{
    use TableTrait;

    protected function configure()
    {
        $this
            ->setName('pghero:index_usage')
            ->setDescription('Index usage.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $items = $this->getContainer()->get('pg_hero')->getIndexUsage();

        $this->populateTable(
            ['Table', '% of Time Index Used', 'Rows'], ['table', 'percent_of_times_index_used', 'rows_in_table'], $items)
            ->render($output);
    }
}
