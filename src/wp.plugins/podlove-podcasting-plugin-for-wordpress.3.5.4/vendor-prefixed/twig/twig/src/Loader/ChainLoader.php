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

use PodlovePublisher_Vendor\Twig\Error\LoaderError;
/**
 * Loads templates from other loaders.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
final class ChainLoader implements \PodlovePublisher_Vendor\Twig\Loader\LoaderInterface, \PodlovePublisher_Vendor\Twig\Loader\ExistsLoaderInterface, \PodlovePublisher_Vendor\Twig\Loader\SourceContextLoaderInterface
{
    private $hasSourceCache = [];
    private $loaders = [];
    /**
     * @param LoaderInterface[] $loaders
     */
    public function __construct(array $loaders = [])
    {
        foreach ($loaders as $loader) {
            $this->addLoader($loader);
        }
    }
    public function addLoader(\PodlovePublisher_Vendor\Twig\Loader\LoaderInterface $loader)
    {
        $this->loaders[] = $loader;
        $this->hasSourceCache = [];
    }
    /**
     * @return LoaderInterface[]
     */
    public function getLoaders()
    {
        return $this->loaders;
    }
    public function getSourceContext($name)
    {
        $exceptions = [];
        foreach ($this->loaders as $loader) {
            if (!$loader->exists($name)) {
                continue;
            }
            try {
                return $loader->getSourceContext($name);
            } catch (\PodlovePublisher_Vendor\Twig\Error\LoaderError $e) {
                $exceptions[] = $e->getMessage();
            }
        }
        throw new \PodlovePublisher_Vendor\Twig\Error\LoaderError(\sprintf('Template "%s" is not defined%s.', $name, $exceptions ? ' (' . \implode(', ', $exceptions) . ')' : ''));
    }
    public function exists($name)
    {
        if (isset($this->hasSourceCache[$name])) {
            return $this->hasSourceCache[$name];
        }
        foreach ($this->loaders as $loader) {
            if ($loader->exists($name)) {
                return $this->hasSourceCache[$name] = \true;
            }
        }
        return $this->hasSourceCache[$name] = \false;
    }
    public function getCacheKey($name)
    {
        $exceptions = [];
        foreach ($this->loaders as $loader) {
            if (!$loader->exists($name)) {
                continue;
            }
            try {
                return $loader->getCacheKey($name);
            } catch (\PodlovePublisher_Vendor\Twig\Error\LoaderError $e) {
                $exceptions[] = \get_class($loader) . ': ' . $e->getMessage();
            }
        }
        throw new \PodlovePublisher_Vendor\Twig\Error\LoaderError(\sprintf('Template "%s" is not defined%s.', $name, $exceptions ? ' (' . \implode(', ', $exceptions) . ')' : ''));
    }
    public function isFresh($name, $time)
    {
        $exceptions = [];
        foreach ($this->loaders as $loader) {
            if (!$loader->exists($name)) {
                continue;
            }
            try {
                return $loader->isFresh($name, $time);
            } catch (\PodlovePublisher_Vendor\Twig\Error\LoaderError $e) {
                $exceptions[] = \get_class($loader) . ': ' . $e->getMessage();
            }
        }
        throw new \PodlovePublisher_Vendor\Twig\Error\LoaderError(\sprintf('Template "%s" is not defined%s.', $name, $exceptions ? ' (' . \implode(', ', $exceptions) . ')' : ''));
    }
}
@\class_alias('PodlovePublisher_Vendor\\Twig\\Loader\\ChainLoader', 'PodlovePublisher_Vendor\\Twig_Loader_Chain');
