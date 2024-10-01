<?php

namespace App\Yt\controller;
use App\Yt\database\Database;
class PlaylistController{

    private \PDO $connessione;

    public function __construct(){
        $db = new Database();
        $this->connessione = $db->getConnection();

    }

    public function getPlaylist(){
        $query = 'SELECT * FROM playlists';
        $result = $this->connessione->query($query);
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function addPlaylist($playlist){
        $query = 'INSERT INTO playlists (user_id, title, cover_image) VALUES (1, :title, :cover_image)';
        $statement = $this->connessione->prepare($query);
        $statement->bindValue(':title', $playlist->title, \PDO::PARAM_STR);
        $statement->bindValue(':cover_image', $playlist->cover_image, \PDO::PARAM_STR);
        $statement->execute();
    }
    }


