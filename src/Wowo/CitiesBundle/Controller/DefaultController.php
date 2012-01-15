<?php

namespace Wowo\CitiesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->get('doctrine')->getEntityManager();
        $topCities = $em->getRepository('WowoCitiesBundle:City')->findTop10Cities();
        $topStates = $em->getRepository('WowoCitiesBundle:State')->findTop10States();
        return array(
            'topCities' => $topCities,
            'topStates' => $topStates,
            'topCitiesSummary' => $this->calculateSummary($topCities, true),
            'topStatesSummary' => $this->calculateSummary($topStates, false),
        );
    }

    protected function calculateSummary($rows, $isObject)
    {
        $summary = array('population' => 0, 'landArea' => 0);
        foreach ($rows as $row) {
            $summary['population'] += $isObject ? $row->getPopulation() : $row['sumPopulation'];
            $summary['landArea']   += $isObject ? $row->getLandArea()   : $row['sumLandArea'];
        }
        return $summary;
    }
}
