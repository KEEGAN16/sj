<?php


class Admin
{
    public $db;

    function __construct()
    {
        $this->db = new Database();
    }

    function getEvents()
    {
        try {
            $query = $this->db->conn->query("SELECT events.event_id as event_id, events.name as name, events.description as description, events.image as image, events.speaker_id as speaker_id, conferences.conference_id as conference_id, schedule.hall_id as hall_id, schedule.day_number as day_number, schedule.start_time as start_time, schedule.end_time as end_time FROM events LEFT JOIN schedule ON events.event_id=schedule.event_id LEFT JOIN conferences ON schedule.conference_id=conferences.conference_id LEFT JOIN halls ON schedule.hall_id=halls.hall_id LEFT JOIN event_speakers ON events.speaker_id=event_speakers.speaker_id");
            return $query->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
        return null;
    }

    function updateEvent($id, $conference_id, $name, $description, $image, $speaker_id, $start_time, $end_time, $day_number, $hall_id)
    {
        $data = [
            "id" => $id,
            "name" => $name,
            "description" => $description,
            "image" => $image,
            "speaker_id" => (intval($speaker_id)>0?$speaker_id:null),
        ];
        $stmt = $this->db->conn->prepare('UPDATE events SET name=:name, description=:description, image=:image, speaker_id=:speaker_id WHERE event_id=:id');
        $result = $stmt->execute($data);
        if ($result) {
            $data2 = [
                "id" => $id,
                "start_time" => $start_time,
                "end_time" => $end_time,
                "day_number" => $day_number,
                "hall_id" => $hall_id,
                "conference_id" => $conference_id,
            ];
            $stmt = $this->db->conn->prepare('UPDATE schedule SET day_number=:day_number, start_time=:start_time, end_time=:end_time, hall_id=:hall_id, conference_id=:conference_id WHERE event_id=:id');
            $result = $stmt->execute($data2);
        }
        return $result;
    }

    function deleteEvent($id)
    {
        $data = array(
            ':id' => $id
        );
        $stmt = $this->db->conn->prepare('DELETE FROM events WHERE event_id=:id');
        return $stmt->execute($data);
    }

    function insertEvent($conference_id, $name, $description, $image, $speaker_id, $start_time, $end_time, $day_number, $hall_id)
    {
        $data = [
            "name" => $name,
            "description" => $description,
            "image" => $image,
            "speaker_id" => (intval($speaker_id)>0?$speaker_id:null),
        ];
        $stmt = $this->db->conn->prepare('INSERT INTO events SET name=:name, description=:description, image=:image, speaker_id=:speaker_id');
        $result = $stmt->execute($data);
        if ($result) {
            $id = $this->db->conn->lastInsertId();
            $data2 = [
                "id" => $id,
                "start_time" => $start_time,
                "end_time" => $end_time,
                "day_number" => $day_number,
                "hall_id" => $hall_id,
                "conference_id" => $conference_id,
            ];
            $stmt = $this->db->conn->prepare('INSERT INTO schedule SET day_number=:day_number, start_time=:start_time, end_time=:end_time, hall_id=:hall_id, conference_id=:conference_id, event_id=:id');
            $result = $stmt->execute($data2);
        }
        return $result;
    }

    public function getConfereces()
    {
        try {
            $query = $this->db->conn->query("SELECT * FROM conferences");
            return $query->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
        return null;
    }

    public function getSpeakers()
    {
        try {
            $query = $this->db->conn->query("SELECT * FROM event_speakers");
            return $query->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
        return null;
    }

    public function getHalls()
    {
        try {
            $query = $this->db->conn->query("SELECT * FROM halls");
            return $query->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
        return null;

    }

}

$Admin = new Admin();

/* 
Tento kód predstavuje triedu Admin, ktorá zabezpečuje správu udalostí súvisiacich s administratívnou časťou aplikácie.

Vlastnosti triedy Admin:

1. Verejná vlastnosť `$db` - predstavuje objekt triedy Database, ktorý sa používa na vytvorenie spojenia s databázou.

2. Konštruktor `__construct()` - inicializuje objekt triedy Admin a vytvára inštanciu triedy Database na nadviazanie spojenia s databázou.

3. Metóda `getEvents()` - vykoná dotaz na databázu na získanie zoznamu udalostí. Používa spojenie tabuliek (`LEFT JOIN`) na získanie informácií o každej udalosti vrátane informácií o konferencii, sále a rečníkovi. Výsledok dotazu sa vráti ako asociatívne pole.

4. Metóda `updateEvent()` aktualizuje informácie o udalosti v databáze. Prijíma parametre ako ID udalosti, ID konferencie, názov, popis, obrázok, ID rečníka, čas začiatku a konca, číslo dňa a ID sály. Existujú dve požiadavky na aktualizáciu (`UPDATE`) - jedna pre tabuľku `events` a druhá pre tabuľku `chedule`. Vráti sa výsledok operácie aktualizácie.

5. Metóda `deleteEvent()` odstráni udalosť z databázy. Prevezme ID udalosti a vykoná dotaz `DELETE` na vymazanie záznamu z tabuľky `events`. Vráti výsledok operácie vymazania.

6. Metóda `insertEvent()` - Pridá novú udalosť do databázy. Prijíma parametre ako ID konferencie, názov, popis, obrázok, ID rečníka, čas začiatku a konca, číslo dňa a ID sály. Dve požiadavky na vloženie (`INSERT`) - jedna pre tabuľku `events` a jedna pre tabuľku `chedule`. Vráti sa výsledok operácie vloženia.

7. Metódy `getConferences()`, `getSpeakers()` a `getHalls()` vykonávajú dotazy do databázy na získanie zoznamu konferencií, rečníkov a sál. Výsledky dotazov sú vrátené ako asociatívne polia.

8. Inštancia triedy Admin je vytvorená pomocou operátora `$Admin = new Admin();`, ktorý nám umožňuje využívať funkcionalitu triedy na správu administratívnych udalostí v aplikácii.

Vo všeobecnosti tento kód poskytuje základ pre správu administratívnych udalostí v aplikácii vrátane ich zobrazovania, editovania, odstraňovania a pridávania.
*/