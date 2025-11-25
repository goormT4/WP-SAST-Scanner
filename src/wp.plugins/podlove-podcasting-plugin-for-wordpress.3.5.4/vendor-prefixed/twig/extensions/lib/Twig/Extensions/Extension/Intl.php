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
class Twig_Extensions_Extension_Intl extends \PodlovePublisher_Vendor\Twig_Extension
{
    public function __construct()
    {
        if (!\class_exists('IntlDateFormatter')) {
            throw new \RuntimeException('The native PHP intl extension (http://php.net/manual/en/book.intl.php) is needed to use intl-based filters.');
        }
    }
    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return array(new \PodlovePublisher_Vendor\Twig_SimpleFilter('localizeddate', 'twig_localized_date_filter', array('needs_environment' => \true)), new \PodlovePublisher_Vendor\Twig_SimpleFilter('localizednumber', 'twig_localized_number_filter'), new \PodlovePublisher_Vendor\Twig_SimpleFilter('localizedcurrency', 'twig_localized_currency_filter'));
    }
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'intl';
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
@\class_alias('PodlovePublisher_Vendor\\Twig_Extensions_Extension_Intl', 'Twig_Extensions_Extension_Intl', \false);
function twig_localized_date_filter(\PodlovePublisher_Vendor\Twig_Environment $env, $date, $dateFormat = 'medium', $timeFormat = 'medium', $locale = null, $timezone = null, $format = null, $calendar = 'gregorian')
{
    $date = \PodlovePublisher_Vendor\twig_date_converter($env, $date, $timezone);
    $formatValues = array('none' => \IntlDateFormatter::NONE, 'short' => \IntlDateFormatter::SHORT, 'medium' => \IntlDateFormatter::MEDIUM, 'long' => \IntlDateFormatter::LONG, 'full' => \IntlDateFormatter::FULL);
    if (\PHP_VERSION_ID < 50500 || !\class_exists('IntlTimeZone')) {
        $formatter = \IntlDateFormatter::create($locale, $formatValues[$dateFormat], $formatValues[$timeFormat], $date->getTimezone()->getName(), 'gregorian' === $calendar ? \IntlDateFormatter::GREGORIAN : \IntlDateFormatter::TRADITIONAL, $format);
        return $formatter->format($date->getTimestamp());
    }
    $formatter = \IntlDateFormatter::create($locale, $formatValues[$dateFormat], $formatValues[$timeFormat], \IntlTimeZone::createTimeZone($date->getTimezone()->getName()), 'gregorian' === $calendar ? \IntlDateFormatter::GREGORIAN : \IntlDateFormatter::TRADITIONAL, $format);
    return $formatter->format($date->getTimestamp());
}
function twig_localized_number_filter($number, $style = 'decimal', $type = 'default', $locale = null)
{
    static $typeValues = array('default' => \NumberFormatter::TYPE_DEFAULT, 'int32' => \NumberFormatter::TYPE_INT32, 'int64' => \NumberFormatter::TYPE_INT64, 'double' => \NumberFormatter::TYPE_DOUBLE, 'currency' => \NumberFormatter::TYPE_CURRENCY);
    $formatter = \PodlovePublisher_Vendor\twig_get_number_formatter($locale, $style);
    if (!isset($typeValues[$type])) {
        throw new \PodlovePublisher_Vendor\Twig_Error_Syntax(\sprintf('The type "%s" does not exist. Known types are: "%s"', $type, \implode('", "', \array_keys($typeValues))));
    }
    return $formatter->format($number, $typeValues[$type]);
}
function twig_localized_currency_filter($number, $currency = null, $locale = null)
{
    $formatter = \PodlovePublisher_Vendor\twig_get_number_formatter($locale, 'currency');
    return $formatter->formatCurrency($number, $currency);
}
/**
 * Gets a number formatter instance according to given locale and formatter.
 *
 * @param string $locale Locale in which the number would be formatted
 * @param int    $style  Style of the formatting
 *
 * @return NumberFormatter A NumberFormatter instance
 */
function twig_get_number_formatter($locale, $style)
{
    static $formatter, $currentStyle;
    $locale = null !== $locale ? $locale : \Locale::getDefault();
    if ($formatter && $formatter->getLocale() === $locale && $currentStyle === $style) {
        // Return same instance of NumberFormatter if parameters are the same
        // to those in previous call
        return $formatter;
    }
    static $styleValues = array('decimal' => \NumberFormatter::DECIMAL, 'currency' => \NumberFormatter::CURRENCY, 'percent' => \NumberFormatter::PERCENT, 'scientific' => \NumberFormatter::SCIENTIFIC, 'spellout' => \NumberFormatter::SPELLOUT, 'ordinal' => \NumberFormatter::ORDINAL, 'duration' => \NumberFormatter::DURATION);
    if (!isset($styleValues[$style])) {
        throw new \PodlovePublisher_Vendor\Twig_Error_Syntax(\sprintf('The style "%s" does not exist. Known styles are: "%s"', $style, \implode('", "', \array_keys($styleValues))));
    }
    $currentStyle = $style;
    $formatter = \NumberFormatter::create($locale, $styleValues[$style]);
    return $formatter;
}
@\class_alias('PodlovePublisher_Vendor\\Twig_Extensions_Extension_Intl', 'PodlovePublisher_Vendor\\Twig\\Extensions\\IntlExtension', \false);
