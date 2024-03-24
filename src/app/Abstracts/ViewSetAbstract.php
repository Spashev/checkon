<?php

declare(strict_types=1);

namespace App\Abstracts;

use App\Exceptions\FolderNotFoundException;
use App\Exceptions\ViewFileNotFoundException;

abstract class ViewSetAbstract
{
    public const TEMPLATE_FOLDER = 'templates';

    private function getBasePath(): string
    {
        return __DIR__ . '/../';
    }
    
    private function getTemplatePath(): string
    {
        return $this->getBasePath() . self::TEMPLATE_FOLDER;
    }
    
    protected function getResourcePath($view): string
    {
        $templates = $this->getTemplatePath();
        if (!is_dir($templates)){
            throw new FolderNotFoundException('/app/templates/', 500);
        }

        if (!file_exists($templates . '/' . $view)) {
            throw new ViewFileNotFoundException($view, 500);
        }

        return file_get_contents($templates . '/' . $view);
    }
}