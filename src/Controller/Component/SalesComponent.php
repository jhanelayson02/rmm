<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\ORM\TableRegistry;

/**
 * Sales component
 */
class SalesComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function saleSummary()
    {
        $this->Sales = TableRegistry::get('Sales');
        $auth = $this->request->session()->read('Auth.User');

        $sales = $this->Sales->find('all', [
            'contain' => ['Users'],
            'conditions' => [
                'Users.branch_id' => $auth['branch_id']
            ],
            'order' => 'Sales.created DESC'
        ])->toArray();

        foreach ($sales as $sale) {
            $summary[date('Y-m-d', strtotime($sale->created))][] = $sale;
        }

        return $summary;
    }
}
