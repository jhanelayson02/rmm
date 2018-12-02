<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AuditTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AuditTable Test Case
 */
class AuditTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AuditTable
     */
    public $Audit;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.audit',
        'app.users',
        'app.branches',
        'app.branch_products',
        'app.products',
        'app.cart'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Audit') ? [] : ['className' => AuditTable::class];
        $this->Audit = TableRegistry::get('Audit', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Audit);

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
