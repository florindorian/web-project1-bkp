<?php

namespace MobdevUfopa\Erpl\Response;

class Response
{
    public function __construct(private array $headers, private array $body)
    {
        
    }

    public function getBody(): void
    {
        // Redireciona o usuário caso seja informado o cabeçalho "Location".
        if (array_key_exists('Location', $this->headers)) {
            header('Location: ' . $this->headers['Location']);
            return;
        }

        // TODO: Redirecionar para a view "error404" caso o pageFile não seja encontrado em "/views/"
        if (array_key_exists('pageFile', $this->body)) {
            if ($this->body['pageFile'] !== '') {
                $pageData = $this->body['pageData'];
                require_once __DIR__ . '/../../views/' . $this->body['pageFile'] . '.php'; // Carrega a view solicitada
                return;
            }
        }

        require_once __DIR__ . '/../../views/' . 'error404.php';
    }
}