<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\SalesComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\SalesComponent Test Case
 */
class SalesComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\SalesComponent
     */
    public $Sales;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Sales = new SalesComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Sales);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
