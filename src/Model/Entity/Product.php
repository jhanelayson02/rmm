<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property int $item_code
 * @property string $name
 * @property string $description
 * @property float $price
 * @property string $unit
 * @property \Cake\I18n\FrozenTime $created
 * @property int $is_deleted
 *
 * @property \App\Model\Entity\BranchProduct[] $branch_products
 */
class Product extends Entity
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
        'item_code' => true,
        'name' => true,
        'description' => true,
        'type' => true,
        'o_price' => true,
        'price' => true,
        'unit' => true,
        'created' => true,
        'image' => true,
        'is_deleted' => true,
        'branch_products' => true
    ];
}
