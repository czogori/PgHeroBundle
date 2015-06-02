<?php

namespace Czogori\PgHeroBundle\Command;

trait TableTrait
{
    protected function populateTable($header, $columns, $items)
    {
        $rows = [];
        foreach ($items as $item) {
            $row = [];
            foreach ($columns as $column) {
                $row[] = $item[$column];
            }
            $rows[] = $row;
        }

        return $this->getHelperSet()
            ->get('table')
            ->setHeaders($header)
            ->setRows($rows);
    }
}
