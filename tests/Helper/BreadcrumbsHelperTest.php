<?php

namespace Adamski\Symfony\BreadcrumbsBundleTests\Helper;

use Adamski\Symfony\BreadcrumbsBundle\Helper\BreadcrumbsHelper;
use Adamski\Symfony\BreadcrumbsBundle\Model\Breadcrumb;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Routing\Router;

class BreadcrumbsHelperTest extends TestCase {

    /**
     * Test of addItem method.
     */
    public function testAddItem() {
        $routerStub = $this->createMock(Router::class);

        $breadcrumbsHelper = new BreadcrumbsHelper($routerStub);
        $breadcrumbsHelper->addItem("Link One", "http://example.com/one");
        $breadcrumbsHelper->addItem("Link Two", "http://example.com/two");

        // Define expected result array
        $resultArray[] = new Breadcrumb("Link One", "http://example.com/one", "breadcrumbs", [], true);
        $resultArray[] = new Breadcrumb("Link Two", "http://example.com/two", "breadcrumbs", [], true);

        $this->assertEquals($resultArray, $breadcrumbsHelper->getNamespaceBreadcrumbs());
    }

    /**
     * Test of addRouteItem method.
     */
    public function testAddRouteItem() {
        $routerStub = $this->createMock(Router::class);
        $routerStub->method("generate")
            ->willReturn("http://example.com/generate");

        $breadcrumbsHelper = new BreadcrumbsHelper($routerStub);
        $breadcrumbsHelper->addRouteItem("Link One", "link.one", []);
        $breadcrumbsHelper->addRouteItem("Link Two", "link.two", []);

        // Define expected result array
        $resultArray[] = new Breadcrumb("Link One", "http://example.com/generate", "breadcrumbs", [], true);
        $resultArray[] = new Breadcrumb("Link Two", "http://example.com/generate", "breadcrumbs", [], true);

        $this->assertEquals($resultArray, $breadcrumbsHelper->getNamespaceBreadcrumbs());
    }

    /**
     * Test of addNamespaceItem method.
     */
    public function testAddNamespaceItem() {
        $routerStub = $this->createMock(Router::class);

        $breadcrumbsHelper = new BreadcrumbsHelper($routerStub);
        $breadcrumbsHelper->addNamespaceItem("test", "Link One", "http://example.com/one");
        $breadcrumbsHelper->addNamespaceItem("test", "Link Two", "http://example.com/two");

        // Define expected result array
        $resultArray[] = new Breadcrumb("Link One", "http://example.com/one", "breadcrumbs", [], true);
        $resultArray[] = new Breadcrumb("Link Two", "http://example.com/two", "breadcrumbs", [], true);

        $this->assertEquals($resultArray, $breadcrumbsHelper->getNamespaceBreadcrumbs("test"));
        $this->assertEquals([], $breadcrumbsHelper->getNamespaceBreadcrumbs());
    }

    /**
     * Test of prependItem method.
     */
    public function testPrependItem() {
        $routerStub = $this->createMock(Router::class);

        $breadcrumbsHelper = new BreadcrumbsHelper($routerStub);
        $breadcrumbsHelper->addItem("Link One", "http://example.com/one");
        $breadcrumbsHelper->prependItem("Link Two", "http://example.com/two");

        // Define expected result array
        $resultArray[] = new Breadcrumb("Link Two", "http://example.com/two", "breadcrumbs", [], true);
        $resultArray[] = new Breadcrumb("Link One", "http://example.com/one", "breadcrumbs", [], true);

        $this->assertEquals($resultArray, $breadcrumbsHelper->getNamespaceBreadcrumbs());
    }

    /**
     * Test of prependRouteItem method.
     */
    public function testPrependRouteItem() {
        $routerStub = $this->createMock(Router::class);
        $routerStub->method("generate")
            ->willReturn("http://example.com/generate");

        $breadcrumbsHelper = new BreadcrumbsHelper($routerStub);
        $breadcrumbsHelper->addRouteItem("Link One", "link.one", []);
        $breadcrumbsHelper->prependRouteItem("Link Two", "link.two", []);

        // Define expected result array
        $resultArray[] = new Breadcrumb("Link Two", "http://example.com/generate", "breadcrumbs", [], true);
        $resultArray[] = new Breadcrumb("Link One", "http://example.com/generate", "breadcrumbs", [], true);

        $this->assertEquals($resultArray, $breadcrumbsHelper->getNamespaceBreadcrumbs());
    }

    /**
     * Test of prependNamespaceItem method.
     */
    public function testPrependNamespaceItem() {
        $routerStub = $this->createMock(Router::class);

        $breadcrumbsHelper = new BreadcrumbsHelper($routerStub);
        $breadcrumbsHelper->addNamespaceItem("test", "Link One", "http://example.com/one");
        $breadcrumbsHelper->prependNamespaceItem("test", "Link Two", "http://example.com/two");

        // Define expected result array
        $resultArray[] = new Breadcrumb("Link Two", "http://example.com/two", "breadcrumbs", [], true);
        $resultArray[] = new Breadcrumb("Link One", "http://example.com/one", "breadcrumbs", [], true);

        $this->assertEquals($resultArray, $breadcrumbsHelper->getNamespaceBreadcrumbs("test"));
        $this->assertEquals([], $breadcrumbsHelper->getNamespaceBreadcrumbs());
    }

    /**
     * Test of clear method.
     */
    public function testClear() {
        $routerStub = $this->createMock(Router::class);

        $breadcrumbsHelper = new BreadcrumbsHelper($routerStub);
        $breadcrumbsHelper->addItem("Link One", "http://example.com/one");
        $breadcrumbsHelper->addItem("Link Two", "http://example.com/two");

        // Define expected result array
        $resultArray[] = new Breadcrumb("Link One", "http://example.com/one", "breadcrumbs", [], true);
        $resultArray[] = new Breadcrumb("Link Two", "http://example.com/two", "breadcrumbs", [], true);

        $this->assertEquals($resultArray, $breadcrumbsHelper->getNamespaceBreadcrumbs());

        // Clear
        $breadcrumbsHelper->clear();

        $this->assertEquals([], $breadcrumbsHelper->getNamespaceBreadcrumbs());
    }
}
