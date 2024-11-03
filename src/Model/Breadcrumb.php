<?php

namespace Adamski\Symfony\BreadcrumbsBundle\Model;

class Breadcrumb {
    private ?string $href = null;
    private ?string $target = null;
    private ?string $rel = null;
    private ?string $route = null;
    private array $routeParams = [];

    public function __construct(
        private string $name
    ) {
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): Breadcrumb {
        $this->name = $name;
        return $this;
    }

    public function getHref(): ?string {
        return $this->href;
    }

    public function setHref(?string $href): Breadcrumb {
        $this->href = $href;
        return $this;
    }

    public function getTarget(): ?string {
        return $this->target;
    }

    public function setTarget(?string $target): Breadcrumb {
        $this->target = $target;
        return $this;
    }

    public function getRel(): ?string {
        return $this->rel;
    }

    public function setRel(?string $rel): Breadcrumb {
        $this->rel = $rel;
        return $this;
    }

    public function getRoute(): ?string {
        return $this->route;
    }

    public function setRoute(?string $route): Breadcrumb {
        $this->route = $route;
        return $this;
    }

    public function getRouteParams(): array {
        return $this->routeParams;
    }

    public function setRouteParams(array $routeParams): Breadcrumb {
        $this->routeParams = $routeParams;
        return $this;
    }
}
