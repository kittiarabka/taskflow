<?php
require_once __DIR__.'/../Database/Database.php';

class Task {

    public function all() {
        $db = Database::connect();
        return $db->query("SELECT * FROM tasks ORDER BY id DESC")->fetchAll();
    }

    public function create($title) {
        $title = trim($title);
        if ($title === '') {
            return false;
        }
        $db = Database::connect();
        $stmt = $db->prepare(
            "INSERT INTO tasks(title,status) VALUES(?,?)"
        );
        return $stmt->execute([
            $title,
            'Новая'
        ]);
    }

    public function delete($id) {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM tasks WHERE id=?");
        return $stmt->execute([$id]);
    }
}
