<?php

do {
    $jogadorUm = readline ('Player 1 (X) - Digite seu nome:');
    $jogadorDois = readline ('Player 2 (O) - Digite seu nome:');

    $jogador = 'X';

    $tabuleiro = [
        '.',  '.', '.', 
        '.', '.', '.', 
        '.', '.', '.',
    ];

    $vencedor = null;
    while ($vencedor === null){
        echo <<< EOL
            Posições | Tabuleiro
                     |
            0|1|2    | $tabuleiro[0]|$tabuleiro[1]|$tabuleiro[2]
            3|4|5    | $tabuleiro[3]|$tabuleiro[4]|$tabuleiro[5]
            6|7|8    | $tabuleiro[6]|$tabuleiro[7]|$tabuleiro[8]

            EOL
        ;

        $posicao = (int) readline("Player {$jogador}, digite a sua posição:");

        if(!in_array($posicao, [0, 1, 2, 3, 4, 5, 6, 7, 8])){
            echo "\nPosição inexistente, digite novamente.\n";
            continue;
        }

        if($tabuleiro[$posicao] !== '.'){
            echo"\nPosição ocupada, digite novamente.\n";
            continue;
        }

        $tabuleiro[$posicao] = $jogador;

        if(
            // se 0 1 e 2 for igual a X ou 3 4 e 5 for igual a X o vencedor será X
            ($tabuleiro[0] === 'X' && $tabuleiro[1] === 'X' && $tabuleiro[2] === 'X') ||
            ($tabuleiro[3] === 'X' && $tabuleiro[4] === 'X' && $tabuleiro[5] === 'X') ||
            ($tabuleiro[6] === 'X' && $tabuleiro[7] === 'X' && $tabuleiro[8] === 'X') ||
            ($tabuleiro[0] === 'X' && $tabuleiro[3] === 'X' && $tabuleiro[6] === 'X') ||
            ($tabuleiro[1] === 'X' && $tabuleiro[4] === 'X' && $tabuleiro[7] === 'X') ||
            ($tabuleiro[2] === 'X' && $tabuleiro[5] === 'X' && $tabuleiro[8] === 'X') ||
            ($tabuleiro[0] === 'X' && $tabuleiro[4] === 'X' && $tabuleiro[8] === 'X') ||
            ($tabuleiro[2] === 'X' && $tabuleiro[4] === 'X' && $tabuleiro[6] === 'X')
        ) {
            $vencedor = 'X';
        }

        if(
            // se 0 1 e 2 for igual a O ou 3 4 e 5 for igual a O o vencedor será O
            ($tabuleiro[0] === 'O' && $tabuleiro[1] === 'O' && $tabuleiro[2] === 'O') ||
            ($tabuleiro[3] === 'O' && $tabuleiro[4] === 'O' && $tabuleiro[5] === 'O') ||
            ($tabuleiro[6] === 'O' && $tabuleiro[7] === 'O' && $tabuleiro[8] === 'O') ||
            ($tabuleiro[0] === 'O' && $tabuleiro[3] === 'O' && $tabuleiro[6] === 'O') ||
            ($tabuleiro[1] === 'O' && $tabuleiro[4] === 'O' && $tabuleiro[7] === 'O') ||
            ($tabuleiro[2] === 'O' && $tabuleiro[5] === 'O' && $tabuleiro[8] === 'O') ||
            ($tabuleiro[0] === 'O' && $tabuleiro[4] === 'O' && $tabuleiro[8] === 'O') ||
            ($tabuleiro[2] === 'O' && $tabuleiro[4] === 'O' && $tabuleiro[6] === 'O')
        ) {
            $vencedor = 'O';
        }

        if (!in_array('.', $tabuleiro)){
            break;
        }

        if($jogador === 'X'){
            $jogador = 'O';
        } else {
            $jogador = 'X';
        }
    }

    echo <<< EOL
        Posições | Tabuleiro
                 |
        0|1|2    | $tabuleiro[0]|$tabuleiro[1]|$tabuleiro[2]
        3|4|5    | $tabuleiro[3]|$tabuleiro[4]|$tabuleiro[5]
        6|7|8    | $tabuleiro[6]|$tabuleiro[7]|$tabuleiro[8]

        EOL
    ;

    if($vencedor === 'X'){
        echo "VENCEDOR: {$jogadorUm}.\n";
    } elseif ($vencedor === 'O'){
        echo "VENCEDOR: {$jogadorDois}.\n";
    } else{
        echo "EMPATE.\n";
    }

    $jogarNovamente = filter_var(
        readline("\nDeseja jogar novamente? (true/false): "),
        FILTER_VALIDATE_BOOLEAN
    );

    echo "\n";
} while($jogarNovamente == true);