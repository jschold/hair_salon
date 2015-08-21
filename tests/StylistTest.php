<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";
    require_once "src/Client.php";

    $server = 'mysql:host=localhost; dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StylistTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Stylist::deleteAll();
            Client::deleteAll();
        }

        function test_getName()
        {
            $name = "Megan";
            $test_stylist = new Stylist($name);

            $result = $test_stylist->getName();

            $this->assertEquals($name, $result);
        }

        function test_save()
        {
            $name = "Megan";
            $test_stylist = new Stylist($name);
            $test_stylist->save();

            $result = Stylist::getAll();

            $this->assertEquals($test_stylist,  $result[0]);
        }

        function test_getClients()
        {
            $name = "Megan";
            $id = null;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();

            $stylist_id = $test_stylist->getId();

            $client_name = "Shawnee";
            $test_client = new Client($id, $client_name, $stylist_id);
            $test_client->save();

            $client_name2 = "Katie";
            $test_client2 = new Client($id, $client_name, $stylist_id);
            $test_client2->save();

            $result = $test_stylist->getClients();

            $this->assertEquals([$test_client, $test_client2], $result);
        }

        function test_update()
        {
            $name = "Megan";
            $id = null;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            $new_name = "Megan Clough";
            $test_stylist->update($new_name);
            $this->assertEquals("Megan Clough", $test_stylist->getName());
        }

        function test_delete()
        {
            $name = "Megan";
            $id = null;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();
            $name2 = "Felicia";
            $test_stylist2 = new Stylist($name2, $id);
            $test_stylist2->save();
            $test_stylist->delete();
            $this->assertEquals([$test_stylist2], Stylist::getAll());
        }

        function test_getAll()
        {
            $name = "Megan";
            $name2 = "Felicia";
            $test_stylist = new Stylist($name);
            $test_stylist->save();
            $test_stylist2 = new Stylist($name2);
            $test_stylist2->save();

            $result = Stylist::getAll();

            $this->assertEquals([$test_stylist, $test_stylist2], $result);
        }

        function test_deleteAll()
        {
            $name = "Megan";
            $name2 = "Felicia";
            $test_stylist = new Stylist($name);
            $test_stylist->save();
            $test_stylist2 = new Stylist($name2);
            $test_stylist2->save();

            Stylist::deleteAll();
            $result = Stylist::getAll();

            $this->assertEquals([], $result);
        }

        function test_find()
        {
            $name = "Megan";
            $name2 = "Felicia";
            $test_stylist = new Stylist($name);
            $test_stylist->save();
            $test_stylist2 = new Stylist($name2);
            $test_stylist2->save();
            $result = Stylist::find($test_stylist->getId());
            $this->assertEquals($test_stylist, $result);
        }

    }
?>
