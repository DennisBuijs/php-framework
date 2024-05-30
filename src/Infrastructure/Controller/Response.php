<?php

namespace Infrastructure\Controller;

interface Response
{
    public function render(): string;
}
