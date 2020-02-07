<?php

namespace Adamski\Symfony\BreadcrumbsBundle\Twig;

use Adamski\Symfony\BreadcrumbsBundle\Helper\BreadcrumbsHelper;
use Exception;
use Symfony\Contracts\Translation\TranslatorInterface;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class BreadcrumbsExtension extends AbstractExtension {

    /**
     * @var BreadcrumbsHelper
     */
    protected $breadcrumbsHelper;

    /**
     * @var TranslatorInterface
     */
    protected $translator;

    /**
     * BreadcrumbsExtension constructor.
     *
     * @param BreadcrumbsHelper   $breadcrumbsHelper
     * @param TranslatorInterface $translator
     */
    public function __construct(BreadcrumbsHelper $breadcrumbsHelper, TranslatorInterface $translator) {
        $this->breadcrumbsHelper = $breadcrumbsHelper;
        $this->translator = $translator;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions() {
        return [
            new TwigFunction("breadcrumbs", [$this, "renderBreadcrumbs"], ["is_safe" => ["html"], "needs_environment" => true])
        ];
    }

    /**
     * Render Breadcrumbs template.
     *
     * @param Environment $environment
     * @param string      $namespace
     * @return bool|string
     */
    public function renderBreadcrumbs(Environment $environment, string $namespace = "") {

        $breadcrumbs = empty($namespace) ? $this->breadcrumbsHelper->getNamespaceBreadcrumbs() : $this->breadcrumbsHelper->getNamespaceBreadcrumbs($namespace);

        try {
            return $environment->render("@Breadcrumbs/breadcrumbs.html.twig", ["breadcrumbs" => $breadcrumbs]);
        } catch (Exception $exception) {
            return false;
        }
    }
}
