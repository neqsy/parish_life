<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Order.php';

class OrderRepository extends Repository
{
    public function addOrder(Order $order): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO orders (name, surname, intention, phone, date, id_assigned_by)
            VALUES (?,?,?,?,?,?)
        ');

        $assignedById = 1;
        $stmt->execute([
            $order->getName(),
            $order->getSurname(),
            $order->getIntention(),
            $order->getPhone(),
            $order->getDate(),
            $assignedById
        ]);
    }
}