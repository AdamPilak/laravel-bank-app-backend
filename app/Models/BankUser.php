<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $surname
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $phoneNumber
 * @property string $pesel
 * @property float $saldo
 * @property string $accountNumber
 * @property string $dateOfBirth
 * @property string $sex
 * @property int $activeCredits
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class BankUser extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'surname', 'username', 'password', 'email', 'phoneNumber', 'pesel', 'saldo', 'accountNumber', 'dateOfBirth', 'sex', 'activeCredits', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The storage format of the model's date columns.
     * 
     * @var string
     */
    protected $dateFormat = 'Y-m-d H:i:s';
}
