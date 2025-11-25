<?php

namespace PodlovePublisher_Vendor;

/**
 * This file is part of Twig.
 *
 * (c) 2014 Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
use PodlovePublisher_Vendor\Symfony\Component\Translation\TranslatorInterface;
use PodlovePublisher_Vendor\Symfony\Component\Translation\IdentityTranslator;
/**
 * @author Robin van der Vleuten <robinvdvleuten@gmail.com>
 */
class Twig_Extensions_Extension_Date extends \PodlovePublisher_Vendor\Twig_Extension
{
    public static $units = array('y' => 'year', 'm' => 'month', 'd' => 'day', 'h' => 'hour', 'i' => 'minute', 's' => 'second');
    /**
     * @var TranslatorInterface
     */
    private $translator;
    public function __construct(\PodlovePublisher_Vendor\Symfony\Component\Translation\TranslatorInterface $translator = null)
    {
        // Ignore the IdentityTranslator, otherwise the parameters won't be replaced properly
        if ($translator instanceof \PodlovePublisher_Vendor\Symfony\Component\Translation\IdentityTranslator) {
            $translator = null;
        }
        $this->translator = $translator;
    }
    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return array(new \PodlovePublisher_Vendor\Twig_SimpleFilter('time_diff', array($this, 'diff'), array('needs_environment' => \true)));
    }
    /**
     * Filter for converting dates to a time ago string like Facebook and Twitter has.
     *
     * @param Twig_Environment $env  a Twig_Environment instance
     * @param string|DateTime  $date a string or DateTime object to convert
     * @param string|DateTime  $now  A string or DateTime object to compare with. If none given, the current time will be used.
     *
     * @return string the converted time
     */
    public function diff(\PodlovePublisher_Vendor\Twig_Environment $env, $date, $now = null)
    {
        // Convert both dates to DateTime instances.
        $date = \PodlovePublisher_Vendor\twig_date_converter($env, $date);
        $now = \PodlovePublisher_Vendor\twig_date_converter($env, $now);
        // Get the difference between the two DateTime objects.
        $diff = $date->diff($now);
        // Check for each interval if it appears in the $diff object.
        foreach (self::$units as $attribute => $unit) {
            $count = $diff->{$attribute};
            if (0 !== $count) {
                return $this->getPluralizedInterval($count, $diff->invert, $unit);
            }
        }
        return '';
    }
    protected function getPluralizedInterval($count, $invert, $unit)
    {
        if ($this->translator) {
            $id = \sprintf('diff.%s.%s', $invert ? 'in' : 'ago', $unit);
            return $this->translator->transChoice($id, $count, array('%count%' => $count), 'date');
        }
        if (1 !== $count) {
            $unit .= 's';
        }
        return $invert ? "in {$count} {$unit}" : "{$count} {$unit} ago";
    }
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'date';
    }
}
/**
 * @author Robin van der Vleuten <robinvdvleuten@gmail.com>
 */
@\class_alias('PodlovePublisher_Vendor\\Twig_Extensions_Extension_Date', 'Twig_Extensions_Extension_Date', \false);
@\class_alias('PodlovePublisher_Vendor\\Twig_Extensions_Extension_Date', 'PodlovePublisher_Vendor\\Twig\\Extensions\\DateExtension', \false);
