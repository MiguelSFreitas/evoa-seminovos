<?php
  // Define um título padrão caso a página não defina a variável $page_title
  $site_title = isset($page_title) ? $page_title . " | EVOA Seminovos" : "EVOA Seminovos | Veículos Revisados e com Garantia";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title><?php echo $site_title; ?></title>

    <meta name="description" content="Encontre seu próximo carro seminovo na EVOA. Veículos revisados, com garantia, laudo cautelar aprovado e melhores condições de financiamento.">
    <meta name="keywords" content="seminovos, carros usados, concessionaria, compra de carros, venda de carros, financiamento veicular">
    <meta name="author" content="EVOA Seminovos">

    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
    
    <?php if (isset($page_css)): ?>
        <link rel="stylesheet" href="css/<?php echo $page_css; ?>.css">
    <?php endif; ?>
</head>
<body></body>