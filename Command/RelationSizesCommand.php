<?php

namespace Czogori\PgHeroBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Czogori\PgHeroBundle\PgHero;

class RelationSizesCommand extends ContainerAwareCommand
{
    use TableTrait;

    protected function configure()
    {
        $this
            ->setName('pghero:relation_sizes')
            ->setDescription('Relation sizes.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $items = $this->getContainer()->get('pg_hero')->getRelationSizes();

        $this->populateTable(['Relation', 'Size', 'Type'], ['name', 'size', 'type'], $items)
            ->render($output);
    }
}
