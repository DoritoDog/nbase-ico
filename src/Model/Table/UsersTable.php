<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\ORM\RulesChecker;
use Cake\ORM\Rule\IsUnique;

class UsersTable extends Table
{
    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('first_name', 'A first name is required.')
            ->notEmpty('last_name', 'A last name is required.')

            ->notEmpty('password', 'A password is required.')

            ->email('email');
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(
            ['email'],
            'A user with this email already exists.'
        ));

        return $rules;
    }
}