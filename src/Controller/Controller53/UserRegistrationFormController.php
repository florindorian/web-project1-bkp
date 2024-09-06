<?php

namespace MobdevUfopa\Erpl\Controller\Controller53;

use MobdevUfopa\Erpl\Controller\Controller;
use MobdevUfopa\Erpl\Response\Response;

class UserRegistrationFormController implements Controller
{
    public function getResultMessage(): void
    {
        /*
         * Nos controllers que são chamados após a realização de uma operação do sistema (como um CRUD com o banco),
         * este método deve ser criado e chamado.
         */

        if (isset($_SESSION['resultMessage'])) {
            $message = $_SESSION['resultMessage'];
            echo "<script type='text/javascript'>
                    window.setTimeout(function() {
                        alert('$message');
                    }, 100);  // 100 milissegundos de atraso
                  </script>";

            unset($_SESSION['resultMessage']);
        }
    }

    public function processRequest(): Response
    {
        $this->getResultMessage();

        return new Response(
            headers: [],
            body: [
                'pageFile' => '53-user-access/user-registration',
                'pageData' => []
            ]
        );
    }
}
