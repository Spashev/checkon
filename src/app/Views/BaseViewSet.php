<?php

declare(strict_types=1);

namespace App\Views;

use App\Abstracts\ViewSetAbstract;
use App\Contracts\ViewSetInterface;
use App\Exceptions\FolderNotFoundException;
use App\Exceptions\ViewFileNotFoundException;

class BaseViewSet extends ViewSetAbstract implements ViewSetInterface
{
    /**
     * @throws ViewFileNotFoundException
     * @throws FolderNotFoundException
     */
    public function render($view): bool|string
    {
        return $this->getResourcePath($view);
    }
}