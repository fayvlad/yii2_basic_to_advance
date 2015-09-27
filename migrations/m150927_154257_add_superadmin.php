<?php

use yii\db\Migration;

class m150927_154257_add_superadmin extends Migration
{
    public function up()
    {
        $this->insert('user', [
            'email'       => 'fayvlad@ukr.net',
            'username'  => 'FayVlad',
            'password_hash'    => Yii::$app->security->generatePasswordHash('123456'),
            'created_at'  => (new DateTime('now'))->format('Y-m-d H:i:s'),
            'updated_at'  => (new DateTime('now'))->format('Y-m-d H:i:s'),
        ]);
        return true;
    }
    public function down()
    {
        $this->delete('user', [
            'email' => 'fayvlad@ukr.net'
        ]);
        return true;
    }
}
