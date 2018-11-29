<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Borrow Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $branch_id
 * @property int $product_id
 * @property float $qty
 * @property string $status
 * @property \Cake\I18n\FrozenTime $created
 * @property int $is_deleted
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Branch $branch
 * @property \App\Model\Entity\Product $product
 */
class Borrow extends Entity
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
        '*' => true
    ];
}
