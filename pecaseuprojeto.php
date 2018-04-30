<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $nome=$_POST['nome'];
        $email=$_POST['email'];
        $telefone=$_POST['telefone'];
       $mensagem=$_POST['mensagem'];
         $comoconheceu=$_POST['comoconheceu'];
        


        require 'vendor/autoload.php';

        $from = new SendGrid\Email(null, "itajunior@itajunior.com.br");
        $subject = "PecaSeuProjeto Site ItaJr";
        $to = new SendGrid\Email(null, "itajunior@itajunior.com.br");
        $content = new SendGrid\Content("text/html","Nome:$nome<br>Email:$email<br>Telefone:$telefone<br>Mensagem: $mensagem,<br>Como Conheceu: $comoconheceu,");
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        
        //Necessário inserir a chave
        $apiKey = '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';
        $sg = new \SendGrid($apiKey);

        $response = $sg->client->mail()->send()->post($mail);
        echo "Mensagem Enviada com Sucesso";
      
        ?>
    </body>
</html>
