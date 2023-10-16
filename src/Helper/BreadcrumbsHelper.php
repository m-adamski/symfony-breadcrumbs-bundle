<?php

namespace Adamski\Symfony\BreadcrumbsBundle\Helper;

use Adamski\Symfony\BreadcrumbsBundle\Model\Breadcrumb;
use InvalidArgumentException;
use Symfony\Component\Routing\RouterInterface;

class BreadcrumbsHelper {

    const DEFAULT_NAMESPACE = "default";

    protected array $breadcrumbs = [
        self::DEFAULT_NAMESPACE => []
    ];

    /**
     * @param RouterInterface $router
     */
    public function __construct(protected readonly RouterInterface $router) {
    }

    /**
     * Add Breadcrumb item at the end of default namespace collection.
     *
     * @param string $text
     * @param string $url
     * @param string $translationDomain
     * @param array  $translationParameters
     * @param bool   $translate
     * @return BreadcrumbsHelper
     */
    public function addItem(string $text, string $url = "", string $translationDomain = "breadcrumbs", array $translationParameters = [], bool $translate = true): static {
        return $this->addNamespaceItem(self::DEFAULT_NAMESPACE, $text, $url, $translationDomain, $translationParameters, $translate);
    }

    /**
     * Add Breadcrumb item at the end of default namespace collection.
     *
     * @param string $text
     * @param string $route
     * @param array  $routeParameters
     * @param string $translationDomain
     * @param array  $translationParameters
     * @param bool   $translate
     * @return $this
     */
    public function addRouteItem(string $text, string $route, array $routeParameters = [], string $translationDomain = "breadcrumbs", array $translationParameters = [], bool $translate = true): static {
        return $this->addNamespaceItem(self::DEFAULT_NAMESPACE, $text, $this->router->generate($route, $routeParameters), $translationDomain, $translationParameters, $translate);
    }

    /**
     * Add Breadcrumb item at the end of specified namespace collection.
     *
     * @param string $namespace
     * @param string $text
     * @param string $url
     * @param string $translationDomain
     * @param array  $translationParameters
     * @param bool   $translate
     * @return $this
     */
    public function addNamespaceItem(string $namespace, string $text, string $url = "", string $translationDomain = "breadcrumbs", array $translationParameters = [], bool $translate = true): static {
        $b = new Breadcrumb($text, $url, $translationDomain, $translationParameters, $translate);
        $this->breadcrumbs[$namespace][] = $b;

        return $this;
    }

    /**
     * Add Breadcrumb item at the beginning of default namespace collection.
     *
     * @param string $text
     * @param string $url
     * @param string $translationDomain
     * @param array  $translationParameters
     * @param bool   $translate
     * @return $this
     */
    public function prependItem(string $text, string $url = "", string $translationDomain = "breadcrumbs", array $translationParameters = [], bool $translate = true): static {
        return $this->prependNamespaceItem(self::DEFAULT_NAMESPACE, $text, $url, $translationDomain, $translationParameters, $translate);
    }

    /**
     * Add Breadcrumb item at the beginning of default namespace collection.
     *
     * @param string $text
     * @param string $route
     * @param array  $routeParameters
     * @param string $translationDomain
     * @param array  $translationParameters
     * @param bool   $translate
     * @return $this
     */
    public function prependRouteItem(string $text, string $route, array $routeParameters = [], string $translationDomain = "breadcrumbs", array $translationParameters = [], bool $translate = true): static {
        return $this->prependNamespaceItem(self::DEFAULT_NAMESPACE, $text, $this->router->generate($route, $routeParameters), $translationDomain, $translationParameters, $translate);
    }

    /**
     * Add Breadcrumb item at the beginning of specified namespace collection.
     *
     * @param string $namespace
     * @param string $text
     * @param string $url
     * @param string $translationDomain
     * @param array  $translationParameters
     * @param bool   $translate
     * @return $this
     */
    public function prependNamespaceItem(string $namespace, string $text, string $url = "", string $translationDomain = "breadcrumbs", array $translationParameters = [], bool $translate = true): static {
        $b = new Breadcrumb($text, $url, $translationDomain, $translationParameters, $translate);
        array_unshift($this->breadcrumbs[$namespace], $b);

        return $this;
    }

    /**
     * Clear specified or all namespaces collections.
     *
     * @param string $namespace
     * @return $this
     */
    public function clear(string $namespace = ""): static {
        if (!empty($namespace)) {
            $this->breadcrumbs[$namespace] = [];
        } else {
            $this->breadcrumbs = [
                self::DEFAULT_NAMESPACE => []
            ];
        }

        return $this;
    }

    /**
     * Return Breadcrumbs from specified namespace.
     *
     * @param string $namespace
     * @return array
     */
    public function getNamespaceBreadcrumbs(string $namespace = self::DEFAULT_NAMESPACE): array {

        // Check whether requested namespace breadcrumbs is existing
        if (!array_key_exists($namespace, $this->breadcrumbs)) {
            throw new InvalidArgumentException(sprintf(
                'The breadcrumb namespace "%s" does not exist', $namespace
            ));
        }

        return $this->breadcrumbs[$namespace];
    }
}
