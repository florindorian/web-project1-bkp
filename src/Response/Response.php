<?php

namespace MobdevUfopa\Erpl\Response;

class Response
{
    public function __construct(private array $headers, private array $body)
    {
        
    }

    public function getBody(): void
    {
        if (array_key_exists('Location', $this->headers)) {
            header('Location: ' . $this->headers['Location']);
            return;
        }

        if (array_key_exists('pageFile', $this->body)) {
            if ($this->body['pageFile'] !== '') {
                $pageData = $this->body['pageData'];
                require_once __DIR__ . '/../../views/' . $this->body['pageFile'] . '.php';
                return;
            }
        }

        require_once __DIR__ . '/../../views/' . 'error404.php';
    }
}