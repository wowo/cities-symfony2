<?php

namespace Wowo\CitiesBundle\Twig\Extensions;

class Number extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            'number' => new \Twig_Filter_function('number_format'),
        );
    }

    public function getName()
    {
        return 'number_extension';
    }
}
