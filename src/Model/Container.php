<?php

namespace Adamski\Symfony\BreadcrumbsBundle\Model;

class Container {
    private array $breadcrumbs = [];

    /**
     * @param Breadcrumb $breadcrumb
     * @return $this
     */
    public function add(Breadcrumb $breadcrumb): self {
        if (null === $breadcrumb->getHref() && null === $breadcrumb->getRoute()) {
            throw new \InvalidArgumentException("At least one of the variables 'href' or 'route' must be set");
        }

        $this->breadcrumbs[] = $breadcrumb;
        return $this;
    }

    /**
     * @return Breadcrumb[]
     */
    public function getBreadcrumbs(): array {
        return $this->breadcrumbs;
    }

    /**
     * @return self
     */
    public function clearBreadcrumbs(): self {
        $this->breadcrumbs = [];
        return $this;
    }
}
