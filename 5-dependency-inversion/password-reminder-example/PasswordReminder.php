<?php namespace ReminderExample;

class PasswordReminder
{

    private $dbConnection;

    public function __construct(ConnectionInterface $dbConnection)
    {

        $this->dbConnection = $dbConnection;

    }

}