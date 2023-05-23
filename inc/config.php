<!-- Funkcia require_once v programovacom jazyku PHP sa používa na zahrnutie externých kódových súborov do aktuálneho spustiteľného súboru.--> 

<?php
 require_once('Database.php');
 require_once('Model.php');
 require_once('Page.php');
 require_once('Menu.php');
 require_once('User.php'); 

/* Tento kód načítava niekoľko súborov (Database.php, Model.php, Page.php, Menu.php, User.php) pomocou funkcie require_once.

Keď súbory sú načítané, môžu byť použité v kóde na prístup k ich obsahu, triedam, funkciám a podobne.

tieto súbory obsahujú definície tried a ďalšie funkcie, ktoré sú používané v aplikácii. Napríklad:

Database.php  obsahuje definíciu triedy Database, ktorá zabezpečuje pripojenie k databáze a vykonávanie operácií s ňou.
Model.php môže obsahovať definície základných tried modelových dát, ktoré reprezentujú tabuľky alebo entity v databáze.
Page.php  definuje triedu Page, ktorá reprezentuje stránky aplikácie a môže obsahovať vlastnosti a metódy súvisiace s vizualizáciou a riadením obsahu stránky.
Menu.php môže obsahovať triedy súvisiace s menu a navigáciou na webových stránkach.
User.php  definuje triedu User, ktorá reprezentuje používateľov aplikácie a obsahuje metódy na prácu s používateľmi, ako je autentifikácia, autorizácia a správa účtov.
*/