<?php


// url da  api no qual busca
$apiUrl = "https://api.novo.infovarejo.com.br/v1/public/produto";

function fetchData($url) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $output = curl_exec($ch);

    curl_close($ch);

    return json_decode($output, true);
}

// função geradora dos relatorios ( deve ser melhorar tratada pode melhorar para usar o bootstrap ) 
function generateReport($data) {
    $report = "<h1>Relatório de Produtos</h1>";
    $report .= "<table border='1'>";
    $report .= "<tr><th>ID</th><th>Nome</th><th>Preço</th></tr>";

    foreach ($data as $produto) {
        $report .= "<tr>";
        $report .= "<td>{$produto['id']}</td>";
        $report .= "<td>{$produto['nome']}</td>";
        $report .= "<td>{$produto['preco']}</td>";
        $report .= "</tr>";
    }

    $report .= "</table>";

    return $report;
}


$data = fetchData($apiUrl);


$report = generateReport($data);


echo $report;
?>
