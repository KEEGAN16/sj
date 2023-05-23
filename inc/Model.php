
<?php

class Model
{
    private $db;

    function __construct()
    {
        $this->db = new Database();
    }

    function getConferenceByYear($year)
    {
        try {
            $query = $this->db->conn->query("SELECT * FROM conferences WHERE conferences.year=".$year." LIMIT 1");
            return $query->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function getVideosByConference($conference)
    {
        try {
            $query = $this->db->conn->query("SELECT * FROM videos LEFT JOIN conferences ON videos.conference_id=conferences.conference_id WHERE conferences.conference_id=".$conference);
            return $query->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function getVideosByPreviewsConferences()
    {
        try {
            $query = $this->db->conn->query("SELECT * FROM videos LEFT JOIN conferences ON videos.conference_id=conferences.conference_id WHERE conferences.year<YEAR(NOW())");
            return $query->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function getSpeakersByConference($conference)
    {
        try {
            $query = $this->db->conn->query("SELECT DISTINCT event_speakers.* FROM event_speakers LEFT JOIN events ON event_speakers.speaker_id=events.speaker_id LEFT JOIN schedule ON schedule.event_id=events.event_id WHERE schedule.conference_id=".$conference);
            return $query->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function getSpeakerById($id)
    {
        if( $id ) {
            try {
                $query = $this->db->conn->query("SELECT * FROM event_speakers WHERE event_speakers.speaker_id=".$id);
                return $query->fetchAll(PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
                print_r($e->getMessage());
            }
        }
        return null;
    }

    function getScheduleByConference($conference)
    {
        try {
            $query = $this->db->conn->query("SELECT * FROM schedule LEFT JOIN conferences ON conferences.conference_id=schedule.conference_id WHERE conferences.conference_id=".$conference);
            return $query->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function getEventsByConference($conference)
    {
        try {
            $query = $this->db->conn->query("SELECT * FROM events LEFT JOIN schedule ON schedule.event_id=events.event_id LEFT JOIN conferences ON conferences.conference_id=schedule.conference_id WHERE conferences.conference_id=".$conference);
            return $query->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function getHallByEvent($conference, $event)
    {
        try {
            $query = $this->db->conn->query("SELECT * FROM halls LEFT JOIN schedule ON schedule.hall_id=halls.hall_id WHERE schedule.conference_id=$conference AND schedule.event_id=$event");
            return $query->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function getEventsByConferenceDay($conference, $day)
    {
        try {
            $query = $this->db->conn->query("SELECT * FROM events LEFT JOIN schedule ON schedule.event_id=events.event_id WHERE schedule.conference_id=".$conference." AND schedule.day_number=".$day);
            return $query->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function getTicketPlans()
    {
        try {
            $query = $this->db->conn->query("SELECT * FROM ticket_plans");
            return $query->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function getServicesByPlan($plan_id)
    {
        try {
            $query = $this->db->conn->query("SELECT * FROM services LEFT JOIN ticket_plans_has_services ON ticket_plans_has_services.service_id=services.service_id LEFT JOIN ticket_plans ON ticket_plans.plan_id=ticket_plans_has_services.ticket_plan_id WHERE ticket_plans.plan_id=" . $plan_id);
            return $query->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }
    /* 
Tento kód definuje triedu `Model`, ktorá poskytuje metódy na interakciu s databázou. Tu je prehľad metód triedy:

- Metóda `getConferenceByYear($year)` - vráti informácie o konferencii pre zadaný rok.
- Metóda `getVideosByConference($conference)` - vráti zoznam videí spojených s danou konferenciou.
- Metóda `getVideosByPreviewsConferences()` - vráti zoznam videí spojených s predchádzajúcimi konferenciami (konferenciami, ktoré sa konali pred aktuálnym rokom).
- Metóda `getSpeakersByConference($conference)` - vráti zoznam rečníkov spojených s danou konferenciou.
- Metóda `getSpeakerById($id)` - vráti informácie o rečníkovi na základe zadaného identifikátora.
- Metóda `getScheduleByConference($conference)` - vráti harmonogram pre danú konferenciu.
- Metóda `getEventsByConference($conference)` - vráti zoznam udalostí spojených s danou konferenciou.
- Metóda `getHallByEvent($conference, $event)` - vráti informácie o miestnosti spojenej s danou udalosťou a konferenciou.
- Metóda `getEventsByConferenceDay($conference, $day)` - vráti zoznam udalostí pre danú konferenciu a deň.
- Metóda `getTicketPlans()` - vráti zoznam plánov vstupeniek.
- Metóda `getServicesByPlan($plan_id)` - vráti zoznam služieb spojených s daným plánom vstupenky.
- Metóda `addNewOrder($first_name, $last_name, $email, $quantity, $conference_id, $plan_id)` - pridá novú objednávku do databázy na základe poskytnutých údajov.

Po definovaní triedy sa vytvorí inštancia triedy `Model` pomocou `$data = new Model()`. Tým je umožnené používanie metód triedy `Model` na vykonávanie operácií s databázou.
*/

/*
Vysledok:
Tento kód predstavuje triedu Model, ktorá obsahuje niekoľko metód na interakciu s databázou. Slúži na získavanie informácií o konferenciách, videách, prednášajúcich, rozvrhoch, podujatiach, miestnostiach, plánoch vstupeniek a službách a na pridávanie nových objednávok.
*/

    function addNewOrder($first_name, $last_name, $email, $quantity, $conference_id, $plan_id)
    {
        if(empty($first_name) || empty($email) || intval($quantity)<1 || intval($conference_id)<1 || intval($plan_id)<1) {
            return false;
        }
        $dt = [
          "email" => $email
        ];
        $result = false;
        try {
            $stmt = $this->db->conn->prepare('SELECT * FROM members WHERE email=:email LIMIT 1');
            if ($stmt->execute($dt)) {
                $member= $stmt->fetchAll(PDO::FETCH_ASSOC);
                if (is_array($member) && count($member)>0) {
                    $id = $this->db->conn->lastInsertId();
                    $data2 = [
                        "plan_id" => intval($plan_id),
                        "member_id" => intval($member[0]["member_id"]),
                        "quantity" => intval($quantity),
                        "conference_id" => intval($conference_id),
                    ];
                    $stmt = $this->db->conn->prepare('INSERT INTO ticket_purchases SET plan_id=:plan_id, member_id=:member_id, quantity=:quantity, conference_id=:conference_id, accepted=0');
                    $result = $stmt->execute($data2);
                } else {
                    $data = [
                        "first_name" => $first_name,
                        "last_name" => $last_name,
                        "email" => $email,
                        "conference_id" => intval($conference_id),
                    ];
                    $stmt = $this->db->conn->prepare('INSERT INTO members SET first_name=:first_name, last_name=:last_name, email=:email, conference_id=:conference_id');
                    $result = $stmt->execute($data);
                    if ($result) {
                        $id = $this->db->conn->lastInsertId();
                        $data2 = [
                            "plan_id" => intval($plan_id),
                            "member_id" => intval($id),
                            "quantity" => intval($quantity),
                            "conference_id" => intval($conference_id),
                        ];
                        $stmt = $this->db->conn->prepare('INSERT INTO ticket_purchases SET plan_id=:plan_id, member_id=:member_id, quantity=:quantity, conference_id=:conference_id, accepted=0');
                        $result = $stmt->execute($data2);
                    }
                }
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
        return $result;
    }
/* 
Tento kód vykonáva nasledujúce akcie:

1. Pripraví sa SQL dotaz pomocou metódy `prepare()`. Dotaz vyberá záznamy z tabuľky "members", kde hodnota stĺpca "email" zodpovedá zadanému hodnotu ":email". Dotaz je obmedzený kľúčovým slovom "LIMIT 1", aby vrátil iba jeden záznam.
2. Vykoná sa pripravený dotaz pomocou metódy `execute()`. Hodnota ":email" sa odovzdá do dotazu cez premennú `$dt`.
3. Ak je vykonanie dotazu úspešné (metóda `$stmt->execute($dt)` vráti true), volá sa metóda `fetchAll(PDO::FETCH_ASSOC)` na získanie všetkých riadkov výsledku dotazu vo forme asociatívneho poľa. Výsledok sa uloží do premennej `$member`.
4. Skontroluje sa, či premenná `$member` je pole a obsahuje aspoň jeden prvok. Ak áno, znamená to, že bol nájdený existujúci používateľ s daným emailom.
   - Získa sa identifikátor (`member_id`) tohto existujúceho používateľa.
   - Pripravia sa dáta (`$data2`) pre vloženie nového záznamu do tabuľky "ticket_purchases" pomocou metódy `prepare()`. Do tohto záznamu sa zahrnú hodnoty `plan_id`, `member_id`, `quantity`, `conference_id` a `accepted` (nastavené na 0).
   - Vykoná sa dotaz na vloženie údajov do tabuľky "ticket_purchases" pomocou metódy `execute($data2)`. Výsledok vykonania sa uloží do premennej `$result`.
5. Ak premenná `$member` nie je pole alebo neobsahuje žiadne prvky, znamená to, že zadaný email neexistuje v tabuľke "members". V tom prípade sa vykoná nasledovné:
   - Pripravia sa dáta (`$data`) pre vloženie nového záznamu do tabuľky "members" pomocou metódy `prepare()`. Do tohto záznamu sa zahrnú hodnoty `first_name`, `last_name`, `email` a `conference_id`.
   - Vykoná sa dotaz na vloženie údajov do tabuľky "members" pomocou metódy `execute($data)`. Výsledok vykonania sa uloží do premennej `$result`.
   - Ak je dotaz na vloženie údajov do tabuľky "members" úspešne vykonaný, získa sa identifikátor (`member_id`) práve vloženého záznamu.
   - Pripravia sa dáta (`$data2`) pre vloženie nového záznám do tabuľky "ticket_purchases" pomocou metódy `prepare()`. Do tohto záznamu sa zahrnú hodnoty `plan_id`, `member_id`, `quantity`, `conference_id` a `accepted` (nastavené na 0).
   - Vykoná sa dotaz na vloženie údajov do tabuľky "ticket_purchases" pomocou metódy `execute($data2)`. Výsledok vykonania sa uloží do premennej `$result`.

6. Na konci bloku kódu, po spracovaní dotazov a operácií s databázou, sa vráti hodnota premennej `$result`.

Celkovo tento kód vykonáva nasledujúcu logiku:

- Skontroluje prítomnosť používateľa s daným emailom v tabuľke "members".
- Ak taký používateľ existuje, vytvorí sa záznam v tabuľke "ticket_purchases" s informáciami o kúpe lístka pre tohto používateľa.
- Ak používateľ s daným emailom neexistuje, vytvorí sa nový záznam v tabuľke "members" s informáciami o používateľovi a potom sa vytvorí záznam v tabuľke "ticket_purchases" s informáciami o kúpe lístka pre práve vloženého používateľa.

Tento kód spracováva operácie interakcie s databázou pre pridávanie nových objednávok do systému lístkov na základe poskytnutých údajov.
*/

}
$data = new Model();

