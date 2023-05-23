<?php

class Database
{
    public $conn;

    function __construct()
    {
        try {
            $this->conn = new PDO('mysql:host=localhost;dbname=sj;charset=utf8', 'root', '');
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }

}

/* UPDATE user SET password=MD5('1234') WHERE id=1*/

/*
Tento kód predstavuje triedu Database, ktorá vytvára pripojenie k databáze MySQL.

Trieda Database má nasledujúce vlastnosti:

1. Verejná premenná `$conn` - predstavuje objekt PDO, ktorý sa používa na prácu s databázou.

2. Konštruktor `__construct()` - inicializuje objekt triedy Database. V rámci konštruktora sa pokúsi vytvoriť pripojenie k databáze MySQL pomocou objektu PDO. Na pripojenie sa používajú nasledujúce parametre:
   - Hostiteľ databázy: `localhost`
   - Názov databázy: `sj`
   - Používateľské meno: `root`
   - Heslo: (prázdny reťazec)

   Ak pri vytváraní pripojenia dojde k výnimke typu `PDOException`, vypíše sa ladiaca informácia pomocou funkcie `var_dump()`, ktorá obsahuje chybové hlásenie získané z výnimky.

Týmto spôsobom poskytuje tento kód jednoduchú implementáciu triedy Database, ktorá slúži na vytvorenie pripojenia k databáze MySQL. Táto trieda môže byť použitá v iných častiach aplikácie na vykonávanie operácií s databázou, ako je vykonávanie dopytov a získavanie dát.
*/