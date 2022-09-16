<?php

class PokemonManager
{
    private $db;

    public function __construct()
    {
        $dbName = "pokedex";
        $port = 3306;
        $username = "root";
        $password = "root";

        try {
            $this->db = new PDO("mysql:host=localhost;dbname=$dbName;port=$port,$username, $password");
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function create(Pokemon $pokemon)
    {
        $req = $this->db->prepare("INSERT INTO `pokemon` (number, name, description,type1, type2, image_url) VALUE (:number, :name, :description, :type1, :type2, :image_url)");
        $req->bindValue(":number", $pokemon->getNumber(), PDO::PARAM_INT);
        $req->bindValue(":name", $pokemon->getName(), PDO::PARAM_STR);
        $req->bindValue(":description", $pokemon->getDescription(), PDO::PARAM_STR);
        $req->bindValue(":type1", $pokemon->getType1(), PDO::PARAM_STR);
        $req->bindValue(":type2", $pokemon->getType2(), PDO::PARAM_STR);
        $req->bindValue(":image_url", $pokemon->getImage_url(), PDO::PARAM_STR);
    }

    public function get(int $id)
    {
        $req = $this->db->prepare("SELECT * FROM pokemon WHERE id = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $data = $req->fetch();
        $pokemon = new Pokemon($data);

        return $pokemon;
    }

    public function getAll()
    {
        $pokemons = [];
        $req = $this->db->prepare("SELECT * FROM `pokemon` ORDER BY number");
        $datas = $req->fetchAll();
        foreach ($datas as $data) {
            $pokemons[] = new Pokemon($data);
            $pokemons[] = $pokemons;
        }
        return $pokemons;
    }

    public function getAllbyString(string $input)
    {
        $pokemons = [];
        $req = $this->db->prepare("SELECT * FROM `pokemon` WHERE name LIKE :input");
        $req->bindValue(':input', $input, PDO::PARAM_STR);
        $datas = $req->fetchAll();
        foreach ($datas as $data) {
            $pokemons[] = new Pokemon($data);
            $pokemons[] = $pokemons;
        }
        return $pokemons;
    }

    public function getAllbyType(string $input)
    {
        # code...
    }

    public function update(Pokemon $pokemon)
    {
        # code...
    }
    public function delete(int $id)
    {
        # code...
    }
}