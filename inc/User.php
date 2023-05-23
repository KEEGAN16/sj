<!-- Tento kód poskytuje základ pre prácu s používateľmi a získavanie informácií o nich z databázy.-->

<?php

class User
{
    public $db;

    function __construct()
    {
        $this->db = new Database();
    }

    function getUserByName($name)
    {
        $data = [
            ':username' => $name,
        ];
        try {
            $user=null;
            $stmt = $this->db->conn->prepare("SELECT * FROM user WHERE username=:username LIMIT 1");
            if ($stmt->execute($data)) {
                $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            return $user;
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
        return null;
    }
}

$User = new User();

/* Tento kód definuje triedu `User` s nasledujúcimi vlastnosťami a metódami:

- Vlastnosť `$db` - objekt pre prácu s databázou.
- Metóda `__construct()` - konštruktor triedy, ktorý inicializuje vlastnosť `$db` novou inštanciou triedy `Database`.
- Metóda `getUserByName($name)` - prijíma parameter `$name` a vráti informácie o používateľovi z databázy na základe poskytnutého mena.

  - V rámci metódy sa vytvorí pole `$data`, ktoré obsahuje parametre pre požiadavku.
  - Následne sa vykonáva pripravený dotaz `SELECT * FROM user WHERE username=:username LIMIT 1`, v ktorom sa vyberajú informácie o používateľovi s daným menom.
  - Výsledok dotazu sa uloží do premennej `$user` pomocou metódy `fetchAll(PDO::FETCH_ASSOC)`.
  - Ak vykonanie dotazu prebehlo úspešne, vráti sa pole `$user` s informáciami o používateľovi.
  - Ak pri vykonávaní dotazu došlo k chybe, vypíše sa chybové hlásenie pomocou metódy `getMessage()` objektu `PDOException`.
  - Ak sa vykonanie dotazu nepodarilo, vráti sa hodnota `null`.

Potom sa vytvorí inštancia triedy `User` pomocou `$User = new User()`. To umožňuje používať metódy a vlastnosti triedy `User` na prácu s používateľmi v databáze.*/