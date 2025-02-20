# Breadcrumbs Bundle for Symfony

The Symfony Bundle, which simplifies the process of generating and displaying breadcrumbs.
Compared to previous versions, this one is based on simple methods of creating and adding breadcrumbs.

## Installation

Composer can install this bundle:

```
$ composer require m-adamski/symfony-breadcrumbs-bundle
```

## How to use it?

```php
namespace App\Controller;

use App\Model\Breadcrumbs\Breadcrumb;
use App\Model\Breadcrumbs\Catalog as BreadcrumbsCatalog;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DashboardController extends AbstractController {
    public function __construct(
        private readonly BreadcrumbsCatalog $breadcrumbsCatalog,
    ) {}

    #[Route("/dashboard", name: "dashboard", methods: ["GET"])]
    public function index(): Response {
        $this->breadcrumbsCatalog->getDefaultContainer()
            ->add((new Breadcrumb("Dashboard"))->setRoute("dashboard"));

        return $this->render("modules/Dashboard/index.html.twig");
    }
}
```

The custom Twig function is responsible for displaying breadcrumbs:

```html
<section class="breadcrumbs-container">
    {{ breadcrumbs() }}
</section>
```

## License

MIT
