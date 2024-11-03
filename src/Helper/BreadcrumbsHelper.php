<?php

namespace Adamski\Symfony\BreadcrumbsBundle\Helper;

use Adamski\Symfony\BreadcrumbsBundle\Model\Breadcrumb;
use InvalidArgumentException;
use Symfony\Component\Routing\RouterInterface;

class BreadcrumbsHelper {
    const DEFAULT_NAMESPACE = "_application.breadcrumbs";
    private array $breadcrumbs = [];

    /**
     * Add breadcrumb to the namespace collection.
     *
     * @param Breadcrumb $breadcrumb
     * @param string     $namespace
     * @return $this
     */
    public function add(Breadcrumb $breadcrumb, string $namespace = self::DEFAULT_NAMESPACE): self {
        if (null === $breadcrumb->getHref() && null === $breadcrumb->getRoute()) {
            throw new \InvalidArgumentException("At least one of the variables 'href' or 'route' must be set");
        }

        $this->breadcrumbs[$namespace][] = $breadcrumb;
        return $this;
    }

    /**
     * Get breadcrumbs from the namespace collection.
     *
     * @param string $namespace
     * @return array
     */
    public function get(string $namespace = self::DEFAULT_NAMESPACE): array {
        return $this->breadcrumbs[$namespace] ?? [];
    }

    /**
     * Clear breadcrumbs in the namespace collection.
     *
     * @param string $namespace
     * @return void
     */
    public function clear(string $namespace = self::DEFAULT_NAMESPACE): void {
        $this->breadcrumbs[$namespace] = [];
    }
}
