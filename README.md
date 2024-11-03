# Breadcrumbs Bundle for Symfony

The Symfony Bundle, which simplifies the process of generating and displaying breadcrumbs.
Compared to previous versions, this one is based on simple methods of creating and adding breadcrumbs.

Package ``symfony/translation`` is no longer required. If you would like to translate breadcrumbs, do it in the
template.

Version 5.0 doesn't have compatibility with previous versions.

## Installation

Composer can install this bundle:

```
$ composer require m-adamski/symfony-breadcrumbs-bundle
```

## How to use it?

```php
use Adamski\Symfony\BreadcrumbsBundle\Helper\BreadcrumbsHelper;
use Adamski\Symfony\BreadcrumbsBundle\Model\Breadcrumb;

$this->breadcrumbHelper
    ->add((new Breadcrumb("Dashboard"))->setRoute("dashboard"))
    ->add((new Breadcrumb("Users"))->setRoute("user"));
```

The custom Twig function is responsible for displaying breadcrumbs:

```(html)
<section class="breadcrumbs-container">
    {{ breadcrumbs() }}
</section>
```

## License

MIT
