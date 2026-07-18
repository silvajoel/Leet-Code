<?php

class Solution {
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        // Array associativo que irá armazenar:
        // [valor do número => índice onde ele foi encontrado]
        //
        // Exemplo:
        // nums = [11, 15, 2]
        // map = [
        //     11 => 0,
        //     15 => 1,
        //     2  => 2
        // ]
        //
        // Guardamos o índice porque a questão pede para retornar
        // a posição dos números no vetor, e não os próprios valores.
        $map = [];

        foreach ($nums as $index => $num) {

            // Calcula qual número falta para atingir o target.
            //
            // Exemplo:
            // target = 9
            // num = 2
            // complemento = 7
            $complement = $target - $num;

            // Verifica se o complemento já foi encontrado anteriormente.
            // Caso exista, significa que já temos os dois números que
            // somam o valor do target.
            if (array_key_exists($complement, $map)) {

                // Retorna os índices dos dois números.
                // O índice do complemento foi salvo anteriormente no mapa,
                // enquanto o índice do número atual é o próprio $index.
                return [$map[$complement], $index];
            }

            // Se o complemento ainda não foi encontrado,
            // salva o número atual e sua posição no mapa.
            //
            // Exemplo:
            // nums = [11, 15, 2, 7]
            //
            // Após ler o 11:
            // map = [11 => 0]
            //
            // Após ler o 15:
            // map = [11 => 0, 15 => 1]
            //
            // Após ler o 2:
            // map = [11 => 0, 15 => 1, 2 => 2]
            //
            // Quando chegar no 7, o complemento será 2.
            // Como 2 já existe no mapa, basta retornar [2, 3].
            $map[$num] = $index;
        }

        // O enunciado do LeetCode garante que sempre existe uma solução,
        // portanto este return normalmente nunca será executado.
        //
        // Mesmo assim, ele é necessário para que a função sempre retorne
        // um array, respeitando o tipo de retorno esperado e evitando erro
        // caso nenhum par seja encontrado.
        return [];
    }
}

$target = 9;
$nums = [2,7,11,15];
$solution = new Solution();
$result = $solution->twoSum($nums, $target);

print_r($result);