<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SaleItem Entity
 *
 * @property int $id
 * @property int $sale_id
 * @property int $product_id
 * @property float $qty
 * @property float $cost
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\Sale $sale
 * @property \App\Model\Entity\Product $product
 */
class SaleItem extends Entity
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
        'sale_id' => true,
        'product_id' => true,
        'qty' => true,
        'cost' => true,
        'created' => true,
        'sale' => true,
        'product' => true
    ];
}
