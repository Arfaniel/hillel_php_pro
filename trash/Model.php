<?php

abstract class Model
{
    public static function find($id)
    {
        $tableName = strtolower(static::class);
        $sql = "SELECT * FROM $tableName WHERE id = $id";
        return $sql; // well return new User in real life
    }
    public function delete()
    {
        $tableName = strtolower(static::class);
        $sql = "DELETE FROM $tableName WHERE id = $this->id";
        return $sql;
    }
    public function create()
    {
        $tableName = strtolower(static::class);
        $extClassProperties = get_object_vars($this);
        $extProperty = array_keys($extClassProperties);
        $extPropValues = array_map(function ($item)
        {
            return ':'. $item;
        }, $extProperty);
        $tableName = strtolower(static::class);
        $sql = 'INSERT INTO '. $tableName. ' (' . implode(', ', $extProperty) . ') VALUES  (' . implode(', ', $extPropValues) . ')';
        return $sql;
    }

    public function update()
    {
        $tableName = strtolower(static::class);
        $extClassProperties = get_object_vars($this);
        unset($extClassProperties['id']);
        array_walk($extClassProperties, function (&$value, $key)
        {
            $value = "$key = '$value'";
        });
        $sql = 'UPDATE '. $tableName. ' SET ' . implode(', ', $extClassProperties) . ' WHERE id = ' . $this->id;
        return $sql;
    }

    public function save()
    {
        $tableName = strtolower(static::class);
        if($this->id == null)
        {
            return $this->create();
        }
        else
        {
            return $this->update();
        }
    }
}

final class User extends Model
{
    public $id;
    public $name;
    public $email;
}

//$user = User::find(1);
//var_dump($user); // SELECT * FROM user WHERE id = :id

//$user->name = 'John';
//$result = $user->save();
//var_dump($result); // UPDATE user SET name = :name, email = 'email' WHERE id = :id
//
//$user = new User;
//$result = $user->delete();
//var_dump($result); // DELETE user WHERE id = :id
//
$user = new User;
$user->id = 1;
$user->name = 'John';
$user->email = 'some@gmail.com';
$result = $user->save();
var_dump($result); // INSERT INTO user (id, name, email) VALUES (:id, :name, :email)

//$user = new User;
//$user->name = 'John';
//$user->email = 'some@gmail.com';
//$result = $user->create();
//var_dump($result);

//$user = new User;
//$user->id = 1;
//$user->name = 'John';
//$user->email = 'some@gmail.com';
//$result = $user->update();
//var_dump($result);