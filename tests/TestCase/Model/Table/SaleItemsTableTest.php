<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SaleItemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SaleItemsTable Test Case
 */
class SaleItemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SaleItemsTable
     */
    public $SaleItems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sale_items',
        'app.sales',
        'app.users',
        'app.branches',
        'app.branch_products',
        'app.products',
        'app.cart',
        'app.orders',
        'app.inventory_summary',
        'app.audit'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SaleItems') ? [] : ['className' => SaleItemsTable::class];
        $this->SaleItems = TableRegistry::get('SaleItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SaleItems);

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
