<?php

namespace Adamski\Symfony\BreadcrumbsBundle\Twig;

use Adamski\Symfony\BreadcrumbsBundle\Model\Catalog as BreadcrumbsCatalog;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class BreadcrumbsExtension extends AbstractExtension {
    public function __construct(
        private readonly BreadcrumbsCatalog $breadcrumbsCatalog,
    ) {}

    public function getFunctions(): array {
        return [
            new TwigFunction("breadcrumbs", $this->renderBreadcrumbs(...), ["is_safe" => ["html"], "needs_environment" => true]),
        ];
    }

    public function renderBreadcrumbs(Environment $environment, ?string $name = null): string {
        return $environment->render("@Breadcrumbs/breadcrumbs.html.twig", [
            "breadcrumbs" => $this->breadcrumbsCatalog->getContainer($name ?? "default")->getBreadcrumbs(),
        ]);
    }
}
