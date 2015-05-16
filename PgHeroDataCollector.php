<?php
namespace Czogori\PgHeroBundle;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;
use Symfony\Component\HttpFoundation\RequestStack;

class PgHeroDataCollector extends DataCollector
{
    public function __construct(RequestStack $request, $pgHero)
    {
        $this->data['pg_hero'] = $pgHero;
        $pid = $request->getCurrentRequest()->query->get('kill');
        if ($pid) {
          $pgHero->killQuery($pid);
        }
    }

    public function collect(Request $request, Response $response, \Exception $exception = null)
    {
    }

    public function getRelationSizes()
    {
        return $this->data['pg_hero']->getRelationSizes();
    }

    public function getIndexUsage()
    {
        return $this->data['pg_hero']->getIndexUsage();
    }

    public function getRunnigQueries()
    {
        return $this->data['pg_hero']->getRunnigQueries();
    }

    public function getLongRunnigQueries()
    {
        return $this->data['pg_hero']->getLongRunnigQueries();
    }

    public function isInstalled()
    {
        return $this->data['pg_hero']->isInstalled();
    }

    public function getName()
    {
        return 'pg_hero';
    }
}
