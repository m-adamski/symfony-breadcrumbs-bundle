<?php

namespace Adamski\Symfony\BreadcrumbsBundle\Model;

class Breadcrumb {

    protected string $text;
    protected string $url;
    protected string $translationDomain;
    protected array  $translationParameters;
    protected bool   $translate;

    /**
     * Breadcrumb constructor.
     *
     * @param string $text
     * @param string $url
     * @param string $translationDomain
     * @param array  $translationParameters
     * @param bool   $translate
     */
    public function __construct(string $text, string $url, string $translationDomain, array $translationParameters, bool $translate = true) {
        $this->text = $text;
        $this->url = $url;
        $this->translationDomain = $translationDomain;
        $this->translationParameters = $translationParameters;
        $this->translate = $translate;
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
