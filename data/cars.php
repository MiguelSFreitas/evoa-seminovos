<?php
// data/cars.php

$vehicles = [
    1 => [
        'id' => 1,
        'name' => 'Volvo XC60 Ultimate',
        'brand' => 'Volvo',
        'model' => 'XC60',
        'year' => 2023,
        'color' => 'Preto',
        'doors' => 4,
        'engine' => '2.0 Turbo',
        'traction' => 'AWD',
        'power' => '462 cv',
        'km' => 24000,
        'fuel' => 'Híbrido',
        'transmission' => 'Automático',
        'price' => 289900,
        'featured' => true,
        'image' => 'assets/img/volvo-xc60.jpg',
        'gallery' => [
            'assets/img/volvo-1.jpg',
            'assets/img/volvo-2.jpg',
            'assets/img/volvo-3.jpg',
            'assets/img/volvo-4.jpg'
        ],
        'highlights' => ['Revisado', 'Garantia de Fábrica', 'Baixa KM', 'IPVA Pago', 'Manual', 'Chave Reserva']
    ],
    2 => [
        'id' => 2,
        'name' => 'BMW X1 sDrive20i',
        'brand' => 'BMW',
        'model' => 'X1',
        'year' => 2024,
        'color' => 'Branco',
        'doors' => 4,
        'engine' => '2.0 Turbo',
        'traction' => 'FWD',
        'power' => '204 cv',
        'km' => 12000,
        'fuel' => 'Gasolina',
        'transmission' => 'Automático',
        'price' => 274900,
        'featured' => true,
        'image' => 'assets/img/bmw-x1.jpg',
        'gallery' => [
            'assets/img/bmw-1.jpg',
            'assets/img/bmw-2.jpg',
            'assets/img/bmw-3.jpg'
        ],
        'highlights' => ['Garantia de Fábrica', 'Único Dono', 'Sem Retoque', 'Laudo Cautelar Aprovado']
    ],
    3 => [
        'id' => 3,
        'name' => 'Jetour T2',
        'brand' => 'Jetour',
        'model' => 'T2',
        'year' => 2024,
        'color' => 'Cinza',
        'doors' => 4,
        'engine' => '2.0 Turbo',
        'traction' => '4WD',
        'power' => '254 cv',
        'km' => 5000,
        'fuel' => 'Gasolina',
        'transmission' => 'Automático',
        'price' => 210000,
        'featured' => true,
        'image' => 'assets/img/jetour-t2.jpg',
        'gallery' => [
            'assets/img/jetour-1.jpg',
            'assets/img/jetour-2.jpg'
        ],
        'highlights' => ['Estado de Zero', 'Garantia de Fábrica', 'Teto Panorâmico', 'Painel Digital']
    ],
    4 => [
        'id' => 4,
        'name' => 'BYD Dolphin GS',
        'brand' => 'BYD',
        'model' => 'Dolphin',
        'year' => 2023,
        'color' => 'Rosa/Cinza',
        'doors' => 4,
        'engine' => 'Elétrico',
        'traction' => 'FWD',
        'power' => '95 cv',
        'km' => 12000,
        'fuel' => 'Elétrico',
        'transmission' => 'Automático',
        'price' => 125000,
        'featured' => true,
        'image' => 'assets/img/byd-dolphin.jpg',
        'gallery' => [
            'assets/img/byd-1.jpg',
            'assets/img/byd-2.jpg'
        ],
        'highlights' => ['100% Elétrico', 'Super Econômico', 'Garantia de Bateria', 'Câmera 360°']
    ],
    5 => [
        'id' => 5,
        'name' => 'GWM Haval H6 GT',
        'brand' => 'GWM',
        'model' => 'Haval H6',
        'year' => 2023,
        'color' => 'Cinza Titânio',
        'doors' => 4,
        'engine' => '1.5 Turbo + Elétrico',
        'traction' => 'AWD',
        'power' => '393 cv',
        'km' => 18000,
        'fuel' => 'Híbrido',
        'transmission' => 'Automático',
        'price' => 290000,
        'featured' => false,
        'image' => 'assets/img/gwm-haval.jpg',
        'gallery' => [
            'assets/img/haval-1.jpg',
            'assets/img/haval-2.jpg'
        ],
        'highlights' => ['Híbrido Plug-in', 'Design Cupê', 'Piloto Automático Adaptativo', 'Som Premium']
    ],
    6 => [
        'id' => 6,
        'name' => 'Toyota Corolla Altis Premium',
        'brand' => 'Toyota',
        'model' => 'Corolla',
        'year' => 2022,
        'color' => 'Prata',
        'doors' => 4,
        'engine' => '2.0 Flex',
        'traction' => 'FWD',
        'power' => '177 cv',
        'km' => 30000,
        'fuel' => 'Flex',
        'transmission' => 'Automático',
        'price' => 145000,
        'featured' => false,
        'image' => 'assets/img/corolla.jpg',
        'gallery' => [
            'assets/img/corolla-1.jpg'
        ],
        'highlights' => ['Revisado na Concessionária', 'Teto Solar', 'Bancos em Couro', 'Toyota Safety Sense']
    ],
    7 => [
        'id' => 7,
        'name' => 'Audi Q5 Black Edition',
        'brand' => 'Audi',
        'model' => 'Q5',
        'year' => 2021,
        'color' => 'Azul Navarra',
        'doors' => 4,
        'engine' => '2.0 TFSI',
        'traction' => 'Quattro (AWD)',
        'power' => '249 cv',
        'km' => 41000,
        'fuel' => 'Gasolina',
        'transmission' => 'Automático',
        'price' => 265000,
        'featured' => false,
        'image' => 'assets/img/audi-q5.jpg',
        'gallery' => [
            'assets/img/audi-1.jpg'
        ],
        'highlights' => ['Tração Quattro', 'Virtual Cockpit', 'Faróis Matrix LED', 'Som Bang & Olufsen']
    ],
    8 => [
        'id' => 8,
        'name' => 'Jeep Compass S Series',
        'brand' => 'Jeep',
        'model' => 'Compass',
        'year' => 2022,
        'color' => 'Cinza Sting',
        'doors' => 4,
        'engine' => '1.3 Turbo Flex',
        'traction' => 'FWD',
        'power' => '185 cv',
        'km' => 35000,
        'fuel' => 'Flex',
        'transmission' => 'Automático',
        'price' => 159900,
        'featured' => false,
        'image' => 'assets/img/jeep-compass.jpg',
        'gallery' => [
            'assets/img/jeep-1.jpg'
        ],
        'highlights' => ['Teto Solar Panorâmico', 'Som Beats', 'Park Assist', 'Assistente de Faixa']
    ]
];