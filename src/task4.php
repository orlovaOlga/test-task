<form action="task4.php" method="post">
    Введите название команды:
    <br>
    <p><input name="team" type="text" size="25" /></p>
    <p><button>Узнать все места команды</button>
</form>

<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPHtmlParser\Dom;

if(empty($_POST)){
    return;
}
$dataFromPost =  mb_convert_case($_POST['team'],MB_CASE_TITLE);

if($dataFromPost) {
    $team = $dataFromPost;
    printTeamResults($team);
} else {
    echo 'Что бы узнать места команды в чемпионате введите название команды';
}

function printTeamResults($team){
    $host = 'http://terrikon.com';
    $pageWithSeasons = "{$host}/football/italy/championship/archive";

    $seasonList = getSeasonsFromPage($pageWithSeasons);

    foreach ($seasonList as $seasonData) {

        $pageWithTop = $host . $seasonData['href'];
        $rating = substr(findTeamPlace($pageWithTop, $team), 0, -1);
        if($rating){
            echo "<p>В сезоне {$seasonData["date"]} команда {$team} заняла {$rating} место </p>";
        } else {
            echo "<p>команда {$team} не учавствовала в чемпионате</p>";
            die;
        }

    }
}

function getSeasonsFromPage($pageWithSeasons): array
{
    $dom = new Dom();
    $dom->loadFromUrl($pageWithSeasons);

    /** @var Dom\Node\AbstractNode[] $seasons */
    $seasons = $dom->find('div.news')->find('a');

    $data = [];
    foreach ($seasons as $season) {
        $data[] = [
            'date' => $season->text,
            'href' => $season->getAttribute('href')
        ];
    }

    return $data;
}

function findTeamPlace($pageWithTop, $team){
    $dom = new Dom();
    /** @var Dom\Node\AbstractNode[] $linkList */
    $linkList = $dom->loadFromUrl($pageWithTop)
        ->find('table.colored.big')->find('a');
    foreach ($linkList as $link) {
        if ($link->text === $team) {
            return $link->getParent()->getParent()->find('td')[0]->text;
        }
    }
}

?>


