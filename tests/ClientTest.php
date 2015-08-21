<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";
    require_once "src/Client.php";

    $server = 'mysql:host=localhost;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class ClientTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown() {
            Stylist::deleteAll();
            Client::deleteAll();
        }

        function test_getId()
        {
            $name = "Megan";
            $id = null;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            $client_name = "Shawnee";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($client_name, $id, $stylist_id);
            $test_client->save();
            $result = $test_client->getId();
            $this->assertEquals(true, is_numeric($result));
        }

        function test_getClientId()
        {
            $name = "Megan";
            $id = null;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            $client_name = "Shawnee";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($client_name, $id, $stylist_id);
            $test_client->save();
            $result = $test_client->getStylistId();
            $this->assertEquals(true, is_numeric($result));
        }

        function test_save()
        {
            $name = "Megan";
            $id = null;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            $client_name = "Shawnee";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($id, $client_name, $stylist_id);
            $test_client->save();
            $result = Client::getAll();
            $this->assertEquals($test_client, $result[0]);
        }

        function test_update()
        {
            $name = "Megan";
            $id = null;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();

            $client_name = "Shawnee";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($id, $client_name, $stylist_id);
            $test_client->save();

            $new_client_name = "Katie Saccomanno";

            $test_client->update($new_client_name);

            $this->assertEquals("Katie Saccomanno", $test_client->getClientName());
        }

        function test_getAll()
        {
            $name = "Megan";
            $id = null;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();

            $client_name = "Shawnee";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($id, $client_name, $stylist_id);
            $test_client->save();

            $client_name2 = "Katie";
            $stylist_id = $test_stylist->getId();
            $test_client2 = new Client($id, $client_name, $stylist_id);
            $test_client2->save();
            $result = client::getAll();
            $this->assertEquals([$test_client, $test_client2], $result);

            $result = Client::getAll();

            $this->assertEquals([$test_client, $test_client2], $result);
        }

        function test_deleteAll()
        {
            $name = "Megan";
            $id = null;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();

            $client_name = "Shawnee";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($id, $client_name, $stylist_id);
            $test_client->save();

            $client_name2 = "Katie";
            $stylist_id = $test_stylist->getId();
            $test_client2 = new Client($id, $client_name, $stylist_id);
            $test_client2->save();

            Client::deleteAll();

            $result = Client::getAll();
            $this->assertEquals([], $result);

        }

    }
?>
