
<?php
$cardapio = [
    [
        'id' => 1,
        'nome' => 'Coxinha de frango',
        'preco' => 'R$ 7,50',
        'imagem' => 'imagens/coxinha.png'
    ],
    [
        'id' => 2,
        'nome' => 'Pão de queijo', 
        'preco' => 'R$ 5,00',
        'imagem' => 'imagens/pao-de-queijo.png'
    ],
    [
        'id' => 3,
        'nome' => 'Misto quente',
        'preco' => 'R$ 15,00',
        'imagem' => 'imagens/misto-quente.png'
    ],
    [
        'id' => 4,
        'nome' => 'Guaraná Lata',
        'preco' => 'R$ 5,00',
        'imagem' => 'imagens/guarana.png'
    ],
    [
        'id' => 5,
        'nome' => 'Bolo de chocolate',
        'preco' => 'R$ 7,00',
        'imagem' => 'imagens/bolo-chocolate.png'
    ],
];

echo json_encode($cardapio);
?>


