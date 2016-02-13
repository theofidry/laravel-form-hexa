<?php

namespace App\Infrastructure;

use Illuminate\Foundation\Application as IlluminateApplication;

/**
 * @author Théo FIDRY <theo.fidry@gmail.com>
 */
final class Application extends IlluminateApplication
{
    /**
     * {@inheritdoc}
     */
    public function __construct($basePath)
    {
        parent::__construct($basePath);

        $this->useStoragePath($this->basePath.DIRECTORY_SEPARATOR.'var');
    }

    /**
     * {@inheritdoc}
     */
    public function configPath()
    {
        return $this->basePath.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'config';
    }

    /**
     * {@inheritdoc}
     */
    public function getCachedRoutesPath()
    {
        return $this->basePath().'/app/cache/routes.php';
    }

    /**
     * {@inheritdoc}
     */
    public function getCachedCompilePath()
    {
        return $this->basePath().'/app/cache/compiled.php';
    }

    /**
     * {@inheritdoc}
     */
    public function getCachedServicesPath()
    {
        return $this->basePath().'/app/cache/services.php';
    }

    public function langPath()
    {
        return $this->basePath.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'resources'.DIRECTORY_SEPARATOR.'lang';
    }

    /**
     * {@inheritdoc}
     */
    public function path()
    {
        return $this->basePath.DIRECTORY_SEPARATOR.'src';
    }
}
