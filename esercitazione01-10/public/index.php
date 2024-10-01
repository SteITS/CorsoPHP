<?php

include_once '../vendor/autoload.php';

use App\Yt\controller\PlaylistController;
use App\Yt\model\Playlist;

$ctrl = new PlaylistController();

/*
$playlist = new playlist(0,'titolo','img.png');
$ctrl->addPlaylist($playlist);
*/

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        header('Content-Type:application/json');
        echo json_encode($ctrl->getPlaylist());
        break;
    case 'POST':
        $dati = json_decode(file_get_contents('php://input'),true);
        $playlist = new Playlist($dati['user_id'],$dati['title'],$dati['cover_image']);
        $ctrl->addPlaylist($playlist);
        var_dump($dati);
        break;
    default:
        break;
}

/*
header('Content-Type:application/json');
echo json_encode($ctrl->getPlaylist());

echo '<pre>';
var_dump($ctrl->getPlaylist());
echo '</pre>';*/