<?php

namespace Adamski\Symfony\BreadcrumbsBundle\Model;

class Catalog {
    private array $containers = [];

    public function __construct() {
        $this->createDefaultContainer();
    }

    /**
     * @return Container[]
     */
    public function getContainers(): array {
        return $this->containers;
    }

    /**
     * @param string $name
     * @return Container
     */
    public function getContainer(string $name): Container {
        if (!array_key_exists($name, $this->containers)) {
            throw new \InvalidArgumentException("Container \"$name\" not found");
        }

        return $this->containers[$name];
    }

    /**
     * @return Container
     */
    public function getDefaultContainer(): Container {
        return $this->containers["default"];
    }

    /**
     * @param string $name
     * @return Container
     */
    public function createContainer(string $name): Container {
        if (array_key_exists($name, $this->containers)) {
            throw new \InvalidArgumentException("The container '$name' already exists.");
        }

        $this->containers[$name] = new Container();
        return $this->containers[$name];
    }

    /**
     * @return void
     */
    public function clearContainers(): void {
        $this->containers = [];
        $this->createDefaultContainer();
    }

    /**
     * @return void
     */
    private function createDefaultContainer(): void {
        $this->containers["default"] = new Container();
    }
}
