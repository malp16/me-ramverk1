<?php

namespace malp16\IP;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test IPController
 */
class IPControllerTest extends TestCase
{
    /**
     * Test the jsonActionPost.
     */
    public function testJsonActionPost()
    {
        $controller = new IPController();
        $res = $controller->jsonActionPost();
        $this->assertIsArray($res);
    }

    public function testArgumentActionGet()
    {
        // Setup di
        $di = new DIFactoryConfig();
        $di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        $controller = new IPController();
        $controller->setDI($di);

        $res = $controller->argumentActionGet("123.456.11.12");
        $this->assertNotNull($res);
    }

    public function testCatchAll()
    {
        // Setup di
        $di = new DIFactoryConfig();
        $di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        $controller = new IPController();
        $controller->setDI($di);

        $res = $controller->catchAll("ip=123.456.11.12");
        $this->assertNotNull($res);

        $_POST["ip"]="123.456.11.12";
        $res = $controller->catchAll();
        $this->assertNotNull($res);
    }



    // /**
    //  * Test the route "info".
    //  */
    // public function testInfoActionGet()
    // {
    //     $controller = new IPController();
    //     $controller->initialize();
    //     $res = $controller->infoActionGet();
    //     $this->assertContains("db is active", $res);
    // }
    //
    //
    //
    // /**
    //  * Test the route "dump-di".
    //  */
    // public function testDumpDiActionGet()
    // {
    //     // Setup di
    //     $di = new DIFactoryConfig();
    //     $di->loadServices(ANAX_INSTALL_PATH . "/config/di");
    //
    //     // Setup the controller
    //     $controller = new IPController();
    //     $controller->setDI($di);
    //     $controller->initialize();
    //
    //     // Do the test and assert it
    //     $res = $controller->dumpDiActionGet();
    //     $this->assertContains("di contains", $res);
    //     $this->assertContains("configuration", $res);
    //     $this->assertContains("request", $res);
    //     $this->assertContains("response", $res);
    // }
}
