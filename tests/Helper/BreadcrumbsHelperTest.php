<?php

namespace Adamski\Symfony\BreadcrumbsBundleTests\Helper;

use Adamski\Symfony\BreadcrumbsBundle\Helper\BreadcrumbsHelper;
use Adamski\Symfony\BreadcrumbsBundle\Model\Breadcrumb;
use PHPUnit\Framework\TestCase;

class BreadcrumbsHelperTest extends TestCase {
    private readonly BreadcrumbsHelper $breadcrumbsHelper;

    protected function setUp(): void {
        parent::setUp();

        $this->breadcrumbsHelper = new BreadcrumbsHelper();
    }

    public function testCollection() {
        $dashboardBreadcrumb = (new Breadcrumb("Dashboard"))->setRoute("dashboard");
        $profileBreadcrumb = (new Breadcrumb("Profile"))->setRoute("profile");

        $this->breadcrumbsHelper
            ->add($dashboardBreadcrumb)
            ->add($profileBreadcrumb);

        $breadcrumbs = [$dashboardBreadcrumb, $profileBreadcrumb];
        $this->assertEquals($breadcrumbs, $this->breadcrumbsHelper->get());
    }

    public function testClear() {
        $dashboardBreadcrumb = (new Breadcrumb("Dashboard"))->setRoute("dashboard");
        $profileBreadcrumb = (new Breadcrumb("Profile"))->setRoute("profile");

        $this->breadcrumbsHelper
            ->add($dashboardBreadcrumb)
            ->add($profileBreadcrumb);

        $breadcrumbs = [$dashboardBreadcrumb, $profileBreadcrumb];
        $this->assertEquals($breadcrumbs, $this->breadcrumbsHelper->get());

        $this->breadcrumbsHelper->clear();
        $this->assertEquals([], $this->breadcrumbsHelper->get());
    }
}
