<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BranchProduct Entity
 *
 * @property int $id
 * @property int $branch_id
 * @property int $product_id
 * @property int $quantity
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\Branch $branch
 * @property \App\Model\Entity\Product $product
 */
class BranchProduct extends Entity
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
        'branch_id' => true,
        'product_id' => true,
        'quantity' => true,
        'created' => true,
        'branch' => true,
        'product' => true
    ];
}
