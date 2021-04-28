<?php

class Database {

    private string $database;

    public function __construct(string $directory) {
        $this->database = $directory . '/tasks.db';
    }

    public function initialize() {
        $db = new \PDO('sqlite:' . $this->database);
        $db->exec('create table if not exists tasks(id integer primary key autoincrement, string description text)');
    }

}