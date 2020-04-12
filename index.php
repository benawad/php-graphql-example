<?php

require_once 'vendor/autoload.php';

use Siler\Graphql;
use GraphQL\GraphQL as WGraphql;
use Siler\Http\Request;
use Siler\Http\Response;
use Overblog\DataLoader\DataLoader;
use Overblog\DataLoader\Promise\Adapter\Webonyx\GraphQL\SyncPromiseAdapter;
use Overblog\PromiseAdapter\Adapter\WebonyxGraphQLSyncPromiseAdapter;

Response\header('Access-Control-Allow-Origin', '*');
Response\header('Access-Control-Allow-Headers', 'content-type');

$MyDB = new mysqli("localhost", "root", "", "example");

if ($MyDB->connect_errno) {
    error_log("Failed to connect to MySQL: (" . $MyDB->connect_errno . ") " . $MyDB->connect_error);
}

function sql($query) {
    global $MyDB;
    $result = mysqli_query($MyDB, $query);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);  

    return $rows;
}

$graphQLSyncPromiseAdapter = new SyncPromiseAdapter();
$promiseAdapter = new WebonyxGraphQLSyncPromiseAdapter($graphQLSyncPromiseAdapter);

$petLoader = new DataLoader(function ($keys) use ($promiseAdapter ) {
    $ids = join(',', $keys);
    $idMap = array_flip($keys);
    $rows = sql("SELECT owner, isDog, sound FROM pets WHERE owner in ({$ids});");
    foreach ($rows as $r) {
        $idMap[$r['owner']] = $r;
    }
    return $promiseAdapter->createAll(array_values($idMap));
 }, $promiseAdapter);

WGraphQL::setPromiseAdapter($graphQLSyncPromiseAdapter);

$context = [
    'petLoader' => $petLoader,
    'sql' => function ($query) {
        return sql($query);
    }
];

if (Request\method_is('post')) {
    $schema = include __DIR__.'/schema.php';

    Graphql\init($schema, null, $context);
}
