<?php

namespace Adamski\Symfony\BreadcrumbsBundle\Model;

class Breadcrumb {

    /**
     * @param string $text
     * @param string $url
     * @param string $translationDomain
     * @param array  $translationParameters
     * @param bool   $translate
     */
    public function __construct(
        protected readonly string $text,
        protected readonly string $url,
        protected readonly string $translationDomain,
        protected readonly array  $translationParameters,
        protected readonly bool   $translate
    ) {
    }

    /**
     * @return string
     */
    public function getText(): string {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getUrl(): string {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getTranslationDomain(): string {
        return $this->translationDomain;
    }

    /**
     * @return array
     */
    public function getTranslationParameters(): array {
        return $this->translationParameters;
    }

    /**
     * @return bool
     */
    public function isTranslate(): bool {
        return $this->translate;
    }
}
