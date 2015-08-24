<?php
    class Client
    //id and client name were accidentally switched when adding the table, so the order does not match the order in the Stylist class, but that doesn't interfere with how things are functioning. It just doesn't look uniform.
    {
        private $id;
        private $client_name;
        private $stylist_id;

        function __construct($id = null, $client_name, $stylist_id)
        {
            $this->id = $id;
            $this->client_name = $client_name;
            $this->stylist_id = $stylist_id;
        }

        function getId()
        {
            return $this->id;
        }

        function setClientName($new_client_name)
        {
            $this->client_name = (string) $new_client_name;
        }

        function getClientName()
        {
            return $this->client_name;
        }

        function getStylistId()
        {
            return $this->stylist_id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO clients (client_name, stylist_id) VALUES ('{$this->getClientName()}', {$this->getStylistId()});");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        function update($new_client_name)
        {
            $GLOBALS['DB']->exec("UPDATE clients SET client_name = '{new_client_name}' WHERE id = {$this->getId()};");
            $this->setClientName($new_client_name);
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients WHERE id = {$this->getId()};");
        }

        static function getAll()
        {
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");
            $clients = array();
            foreach($returned_clients as $client) {
                $id = $client["id"];
                $client_name = $client["client_name"];
                $stylist_id = $client["stylist_id"];
                $new_client = new Client($id, $client_name, $stylist_id);
                array_push($clients, $new_client);
            }
            return $clients;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients;");
        }

        static function find($search_id)
        {
            $found_client = null;
            $clients= client::getAll();
            foreach(clients as $client) {
                $id = $client->getId();
                if ($id == $search_id) {
                    $found_client = $client;
                }
            }
            return $found_client;
        }
    }

?>
