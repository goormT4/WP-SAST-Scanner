<?php

namespace PodlovePublisher_Vendor;

/*
 * This file is part of Twig.
 *
 * (c) 2010 Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
class Twig_Extensions_Extension_I18n extends \PodlovePublisher_Vendor\Twig_Extension
{
    /**
     * {@inheritdoc}
     */
    public function getTokenParsers()
    {
        return array(new \PodlovePublisher_Vendor\Twig_Extensions_TokenParser_Trans());
    }
    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return array(new \PodlovePublisher_Vendor\Twig_SimpleFilter('trans', 'gettext'));
    }
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'i18n';
    }
}
/*
 * This file is part of Twig.
 *
 * (c) 2010 Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
@\class_alias('PodlovePublisher_Vendor\\Twig_Extensions_Extension_I18n', 'Twig_Extensions_Extension_I18n', \false);
@\class_alias('PodlovePublisher_Vendor\\Twig_Extensions_Extension_I18n', 'PodlovePublisher_Vendor\\Twig\\Extensions\\I18nExtension', \false);
