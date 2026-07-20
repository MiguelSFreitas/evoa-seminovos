<?php
// includes/functions.php

/**
 * Formata um valor numérico para o padrão de moeda brasileiro (R$)
 */
function formatMoney($value) {
    return 'R$ ' . number_format($value, 2, ',', '.');
}

/**
 * Formata a quilometragem no padrão brasileiro (ex: 24.000 km)
 */
function formatKm($km) {
    return number_format($km, 0, ',', '.') . ' km';
}

/**
 * Sanitiza textos recebidos via formulário para evitar ataques XSS
 */
function sanitizeInput($data) {
    return htmlspecialchars(trim(strip_tags($data)));
}

/**
 * Retorna uma classe CSS 'active' se o link for a página atual do menu
 */
function setActiveMenu($pageName) {
    $currentPage = basename($_SERVER['PHP_SELF']);
    return ($currentPage === $pageName) ? 'active' : '';
}