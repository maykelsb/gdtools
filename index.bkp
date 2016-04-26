<?php
$chars = [
    'AR' => ['nvl' => 1, 'vlr' => 0.5, 'grp' => 'M', 'qtd' => 9, 'nome' => 'Arqueiro'],
    'LA' => ['nvl' => 1, 'vlr' => 0.5, 'grp' => 'S', 'qtd' => 9, 'nome' => 'Ladino'],
    'GU' => ['nvl' => 2, 'vlr' => 1, 'grp' => 'M', 'qtd' => 9, 'nome' => 'Guerreiro'],
    'CL' => ['nvl' => 3, 'vlr' => 1.5, 'grp' => 'A', 'qtd' => 6, 'nome' => 'Clérigo'],
    'CA' => ['nvl' => 4, 'vlr' => 2, 'grp' => 'S', 'qtd' => 6, 'nome' => 'Caçador'],
    'MA' => ['nvl' => 4, 'vlr' => 2, 'grp' => 'A', 'qtd' => 6, 'nome' => 'Mago'],
    'BA' => ['nvl' => 5, 'vlr' => 2.5, 'grp' => '*', 'qtd' => 4, 'nome' => 'Bardo'],
    'FE' => ['nvl' => 5, 'vlr' => 2.5, 'grp' => 'A', 'qtd' => 4, 'nome' => 'Feiticeira'],
    'MO' => ['nvl' => 5, 'vlr' => 2.5, 'grp' => 'M', 'qtd' => 4, 'nome' => 'Monge'],
];

$totalChars = array_reduce($chars, function($total, $item){
    return $total += $item['qtd'];
});

$missions = [
    'B' => [
        ['LA', 'AR', 'CL'],
        ['LA', 'AR', 'MA'],
        ['LA', 'AR', 'GU'],
        ['LA', 'GU', 'CL'],
        ['LA', 'GU', 'MA'],
        ['LA', 'AR', 'CA'],
        ['AR', 'GU', 'CL'],
        ['AR', 'GU', 'MA'],
        ['LA', 'GU', 'CA'],
        ['AR', 'GU', 'CA'],
    ],
    'A' => [
        ['LA', 'LA', 'GU', 'MA'],
        ['LA', 'LA', 'AR', 'CL'],
        ['LA', 'AR', 'AR', 'CA'],
        ['AR', 'AR', 'GU', 'MA'],
        ['AR', 'GU', 'GU', 'CL'],
        ['LA', 'GU', 'GU', 'CA'],
        ['AR', 'LA', 'MA', 'CL'],
        ['LA', 'GU', 'MA', 'CA'],
        ['AR', 'LA', 'CL', 'CA'],
        ['AR', 'LA', 'GU', 'FE'],
    ],
    'S' => [
        ['LA', 'GU', 'MO', 'CA'],
        ['AR', 'LA', 'GU', 'FE'],
        ['LA', 'CL', 'MA', 'MO'],
        ['CL', 'MA', 'MO', 'CA'],
        ['AR', 'CL', 'GU', 'FE'],
        ['AR', 'GU', 'MO', 'CA'],
        ['AR', 'CL', 'MA', 'FE'],
        ['LA', 'GU', 'MO', 'MA', 'CL'],
        ['MA', 'CL', 'CA', 'FE', 'GU'],
        ['LA', 'LA', 'CL', 'MO', 'FE'],
        ['AR', 'MA', 'CA', 'GU', 'MO'],
        ['FE', 'MO', 'MA', 'CA', 'GU'],
        ['GU', 'MO', 'LA', 'CA', 'FE'],
    ]
];

echo "<label>Total personagens: </label>{$totalChars}";
echo '<hr />';
echo '<h3>Personagens</h3>';
echo '<table border="1"><thead><tr><th>Nome</th><th>Nível</th><th>Valor</th><th>Grupo</th><th>Qtd</th><th>Abrev</th></tr></thead><tbody>';
array_walk($chars, function($char, $abv){
    echo "<tr><td>{$char['nome']}</td><td>{$char['nvl']}</td><td>{$char['vlr']}</td><td>{$char['grp']}</td><td>{$char['qtd']}</td><td>{$abv}</td></tr>";
});
echo '</tbody></table>';

echo '<hr />';
echo '<h3>Missões</h3>';
echo '<table border="1"><thead><tr><th>Classe</th><th>Req</th><th>Probabilidade</th><th>Grupo</th><th>Valor</th></thead><tbody>';
array_walk($missions, function($missoes, $classe) use ($chars, $totalChars){
    array_walk($missoes, function($missao) use ($classe, $chars, $totalChars){
        $requerimentos = implode(', ', $missao);
        $valor = calculaValorMissao($missao, $chars);
        $grupo = calculaGrupoMissao($missao, $chars);
        echo "<tr><td>{$classe}</td><td>{$requerimentos}</td><td>?</td><td>{$grupo}</td><td>{$valor}</td></tr>";
    });
});
echo '</tbody></table>';

function calculaValorMissao($missao, $chars)
{
    $somaChars = array_reduce($missao, function($soma, $idChar) use ($chars){
        return $soma += $chars[$idChar]['vlr'];
    });
    return ceil($somaChars / 2);
}

function calculaGrupoMissao($missao, $chars)
{
    $qtd = ['M' => 0, 'S' => 0, 'A' => 0];
    $soma = ['M' => 0, 'S' => 0, 'A' => 0];

    array_walk($missao, function($charId) use(&$qtd, $soma, $chars){
        $qtd[$chars[$charId]['grp']]++;
        $qtd[$chars[$charId]['grp']] += $chars[$charId]['vlr'];
    });

    if ($qtd['M'] > $qtd['S'] && $qtd['M'] > $qtd['A']) {
        return 'M';
    }

    if ($qtd['S'] > $qtd['M'] && $qtd['S'] > $qtd['A']) {
        return 'S';
    }

    if ($qtd['A'] > $qtd['M'] && $qtd['A'] > $qtd['S']) {
        return 'A';
    }

    return '?';
}
