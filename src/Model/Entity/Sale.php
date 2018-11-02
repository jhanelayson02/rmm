<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sale Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $branch_id
 * @property float $amount
 * @property float $cash
 * @property float $cash_change
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Branch $branch
 * @property \App\Model\Entity\SaleItem[] $sale_items
 */
class Sale extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'branch_id' => true,
        'amount' => true,
        'cash' => true,
        'cash_change' => true,
        'created' => true,
        'user' => true,
        'branch' => true,
        'sale_items' => true
    ];
}
