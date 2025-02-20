<?php

namespace Adamski\Symfony\BreadcrumbsBundleTests\Model;

use Adamski\Symfony\BreadcrumbsBundle\Model\Breadcrumb;
use Adamski\Symfony\BreadcrumbsBundle\Model\Container;
use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase {
    private readonly Container $container;

    protected function setUp(): void {
        parent::setUp();

        $this->container = new Container();
    }

    public function testGetBreadcrumbs() {
        $breadcrumbs = $this->container->getBreadcrumbs();

        $this->assertIsArray($breadcrumbs);
        $this->assertCount(0, $breadcrumbs);
    }

    public function testAdd() {
        $this->container->add((new Breadcrumb("Example"))->setHref("https://example.com/"));
        $breadcrumbs = $this->container->getBreadcrumbs();

        $this->assertIsArray($breadcrumbs);
        $this->assertCount(1, $breadcrumbs);
        $this->assertInstanceOf(Breadcrumb::class, $breadcrumbs[0]);
    }

    public function testClearBreadcrumbs() {
        $breadcrumbs = $this->container->getBreadcrumbs();
        $this->assertCount(0, $breadcrumbs);

        $this->container->add((new Breadcrumb("Example"))->setHref("https://example.com/"));
        $breadcrumbs = $this->container->getBreadcrumbs();
        $this->assertCount(1, $breadcrumbs);

        $this->container->clearBreadcrumbs();
        $breadcrumbs = $this->container->getBreadcrumbs();
        $this->assertCount(0, $breadcrumbs);
    }
}
