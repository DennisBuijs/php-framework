<?php

namespace Infrastructure\Controller\Web;

use Infrastructure\Controller\Response;

class TemplateResponse implements Response
{
    private bool $renderAsPartial = false;

    public function __construct(private readonly string $template, private readonly array $viewModel)
    {
    }

    public function asPartial(): self
    {
        $this->renderAsPartial = true;
        return $this;
    }

    public function render(): string
    {
        header("Content-Type: text/html");
        $viewModel = $this->viewModel;

        if (!$this->renderAsPartial) {
            require_once "Template/header.php";
        }

        require_once "Template/" . $this->template . ".php";

        if (!$this->renderAsPartial) {
            require_once "Template/footer.php";
        }

        return "";
    }
}
