<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Event.php';

class EventRepository extends Repository
{

    public function getEvent(int $id): ?Event
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.events WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $event = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($event == false) {
            return null;
        }

        return new Event(
            $event['title'],
            $event['description'],
            $event['image']
        );
    }

    public function addEvent(Event $event): void
    {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO events (title, description, created_at, id_assigned_by, image)
            VALUES (?,?,?,?,?)
        ');

        $assignedById = 1;
        $stmt->execute([
            $event->getTitle(),
            $event->getDescription(),
            $date->format('Y-m-d'),
            $assignedById,
            $event->getImage()
        ]);
    }
    public function getEvents(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM events
        ');
        $stmt->execute();
        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($events as $event){
            $result[] = new Event(
                $event['title'],
                $event['description'],
                $event['image']
            );
        }
        return $result;
    }

    public function getEventByTitle(string $searchString)
    {
        $searchString = '%'.strtolower($searchString).'%';

        $stmt =  $this->database->connect()->prepare('
            SELECT * FROM events WHERE LOWER(title) LIKE :search OR LOWER(description) LIKE :search
        ');
        $stmt->bindParam(':search',$searchString,PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}