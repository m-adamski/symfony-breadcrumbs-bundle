# Breadcrumbs Bundle for Symfony

The Breadcrumbs tool simplifies the generation and display process of breadcrumbs.

This bundle is compatible with Symfony 4.1 and Symfony 5.0. Symfony 3.4 compatibility abandoned.

## Installation

This bundle can be installed by Composer:

```
$ composer require m-adamski/symfony-breadcrumbs-bundle
```

## How to use it?

In the controller action, generate the breadcrumbs structure:

```(php)
$this->breadcrumbsHelper->addRouteItem("Management", "administrator.index", [], "navigation");
$this->breadcrumbsHelper->addRouteItem("Data management", "administrator.data", ["id" => $id], "navigation");
```

To display breadcrumbs in Twig template file use breadcrumbs() function:

```(html)
<section class="breadcrumbs-container">
    {{ breadcrumbs() }}
</section>
```

## Creating a breadcrumbs structure

To manage the breadcrumbs structure additional functions have been implemented.

| Method                  | Description                                                                     |
| ----------------------- | ------------------------------------------------------------------------------- |
| addItem                 | Add breadcrumb item at the end of default namespace collection                  |
| addRouteItem            | Add the route breadcrumb item, at the end of default namespace collection       |
| addNamespaceItem        | Add breadcrumb item at the end of specified namespace collection                |
| prependItem             | Add breadcrumb item at the beginning of default namespace collection            |
| prependRouteItem        | Add the route breadcrumb item, at the beginning of default namespace collection |
| prependNamespaceItem    | Add breadcrumb item at the beginning of specified namespace collection          |
| clear                   | Clear specified or all namespaces collections                                   |
| getNamespaceBreadcrumbs | Return breadcrumbs from specified namespace                                     |

## License

MIT
