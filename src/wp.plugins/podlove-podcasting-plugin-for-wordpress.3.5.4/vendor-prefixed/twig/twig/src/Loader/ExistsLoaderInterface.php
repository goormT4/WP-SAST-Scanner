<?php

/*
 * This file is part of Twig.
 *
 * (c) Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PodlovePublisher_Vendor\Twig\Loader;

/**
 * Empty interface for Twig 1.x compatibility.
 *
 * @deprecated since Twig 2.7, to be removed in 3.0
 */
interface ExistsLoaderInterface extends \PodlovePublisher_Vendor\Twig\Loader\LoaderInterface
{
}
@\class_alias('PodlovePublisher_Vendor\\Twig\\Loader\\ExistsLoaderInterface', 'PodlovePublisher_Vendor\\Twig_ExistsLoaderInterface');
