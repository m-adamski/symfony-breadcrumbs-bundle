<?php

namespace Adamski\Symfony\BreadcrumbsBundleTests\Model;

use Adamski\Symfony\BreadcrumbsBundle\Model\Catalog;
use Adamski\Symfony\BreadcrumbsBundle\Model\Container;
use PHPUnit\Framework\TestCase;

class CatalogTest extends TestCase {
    private readonly Catalog $catalog;

    protected function setUp(): void {
        parent::setUp();

        $this->catalog = new Catalog();
    }

    public function testGetContainers() {
        $this->assertCount(1, $this->catalog->getContainers());
    }

    public function testGetDefaultContainer() {
        $defaultContainer = $this->catalog->getDefaultContainer();
        $this->assertInstanceOf(Container::class, $defaultContainer);
    }

    public function testGetContainer() {
        $this->catalog->createContainer("example");
        $container = $this->catalog->getContainer("example");
        $this->assertInstanceOf(Container::class, $container);
    }

    public function testGetContainerException() {
        $this->expectException(\InvalidArgumentException::class);
        $container = $this->catalog->getContainer("example");
    }

    public function testClearContainers() {
        $this->catalog->createContainer("example");
        $this->assertCount(2, $this->catalog->getContainers());

        $this->catalog->clearContainers();
        $this->assertCount(1, $this->catalog->getContainers());
    }

    public function testCreateContainer() {
        $this->catalog->createContainer("example");
        $this->assertCount(2, $this->catalog->getContainers());
    }

    public function testCreateContainerException() {
        $this->expectException(\InvalidArgumentException::class);
        $this->catalog->createContainer("example");
        $this->catalog->createContainer("example");
    }
}
