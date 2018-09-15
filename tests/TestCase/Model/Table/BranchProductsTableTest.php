<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BranchProductsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BranchProductsTable Test Case
 */
class BranchProductsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BranchProductsTable
     */
    public $BranchProducts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.branch_products',
        'app.branches',
        'app.products'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BranchProducts') ? [] : ['className' => BranchProductsTable::class];
        $this->BranchProducts = TableRegistry::get('BranchProducts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BranchProducts);

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
