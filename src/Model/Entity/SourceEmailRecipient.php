<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SourceEmailRecipient Entity
 *
 * @property int $id
 * @property int $source_id
 * @property int $form_location_id
 * @property string $emails
 * @property string $fields
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Source $source
 * @property \App\Model\Entity\FormLocation $form_location
 */
class SourceEmailRecipient extends Entity
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
        '*' => true,
        'id' => false
    ];
}
