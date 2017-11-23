<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FormLocations Model
 *
 * @property \Cake\ORM\Association\HasMany $SourceEmailRecipients
 *
 * @method \App\Model\Entity\FormLocation get($primaryKey, $options = [])
 * @method \App\Model\Entity\FormLocation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FormLocation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FormLocation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FormLocation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FormLocation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FormLocation findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FormLocationsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('form_locations');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('SourceEmailRecipients', [
            'foreignKey' => 'form_location_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        return $validator;
    }

    public function formLocationFields() {
        $fields = [
            'firstname' => 'Firstname',
            'surname' => 'Surname',
            'email' => 'Email',
            'phone' => 'Phone',
            'city' => 'City',
            'state' => 'State',
            'address' => 'Address',
            'source_id' => 'Source',
            'allocation_date' => 'Allocation Date',
            'lead_action' => 'Lead Action',
            'source_url' => 'Source URL'
        ];

        return $fields;
    }
}
