<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TReplyTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TReplyTable Test Case
 */
class TReplyTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TReplyTable
     */
    public $TReply;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.t_reply',
        'app.users',
        'app.tickets'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TReply') ? [] : ['className' => TReplyTable::class];
        $this->TReply = TableRegistry::get('TReply', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TReply);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
