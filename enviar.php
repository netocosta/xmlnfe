<?php

$uploadfile = "xml/".md5(basename($_FILES['arquivo']['name']).time()).".xml";

if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)) {
    echo "Arquivo válido e enviado com sucesso.\n";
    echo "<a href='lista.php'>Ir para lista de arquivos.</a>";
} else {
    echo "Erro ao enviar arquivo!\n";
}