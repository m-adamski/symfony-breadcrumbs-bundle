<?php

namespace Adamski\Symfony\BreadcrumbsBundle\Twig;

use Adamski\Symfony\BreadcrumbsBundle\Helper\BreadcrumbsHelper;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class BreadcrumbsExtension extends AbstractExtension {
    public function __construct(
        private readonly BreadcrumbsHelper $breadcrumbsHelper
    ) {
    }

    public function getFunctions(): array {
        return [
            new TwigFunction("breadcrumbs", $this->renderBreadcrumbs(...), ["is_safe" => ["html"], "needs_environment" => true]),
        ];
    }

    public function renderBreadcrumbs(Environment $environment, string $namespace = BreadcrumbsHelper::DEFAULT_NAMESPACE): string {
        return $environment->render("@Breadcrumbs/breadcrumbs.html.twig", [
            "breadcrumbs" => $this->breadcrumbsHelper->get($namespace),
        ]);
    }
}
