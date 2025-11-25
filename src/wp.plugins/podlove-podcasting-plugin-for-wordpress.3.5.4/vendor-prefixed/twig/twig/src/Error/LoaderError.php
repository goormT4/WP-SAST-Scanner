<?php

/*
 * This file is part of Twig.
 *
 * (c) Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PodlovePublisher_Vendor\Twig\Error;

/**
 * Exception thrown when an error occurs during template loading.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class LoaderError extends \PodlovePublisher_Vendor\Twig\Error\Error
{
}
@\class_alias('PodlovePublisher_Vendor\\Twig\\Error\\LoaderError', 'PodlovePublisher_Vendor\\Twig_Error_Loader');
