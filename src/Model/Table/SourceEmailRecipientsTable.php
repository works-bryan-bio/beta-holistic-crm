<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SourceEmailRecipients Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Sources
 * @property \Cake\ORM\Association\BelongsTo $FormLocations
 *
 * @method \App\Model\Entity\SourceEmailRecipient get($primaryKey, $options = [])
 * @method \App\Model\Entity\SourceEmailRecipient newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SourceEmailRecipient[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SourceEmailRecipient|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SourceEmailRecipient patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SourceEmailRecipient[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SourceEmailRecipient findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SourceEmailRecipientsTable extends Table
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

        $this->table('source_email_recipients');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Sources', [
            'foreignKey' => 'source_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('FormLocations', [
            'foreignKey' => 'form_location_id',
            'joinType' => 'INNER'
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
            ->allowEmpty('emails');

        $validator
            ->allowEmpty('fields');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['source_id'], 'Sources'));
        $rules->add($rules->existsIn(['form_location_id'], 'FormLocations'));

        return $rules;
    }
}
