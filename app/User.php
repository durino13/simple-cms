<?php

namespace App;

use App\Interfaces\ITrashable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements ITrashable
{

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['deleted_at'];

    /******************************************************************************
     * Trash methods
     ******************************************************************************/

    public function trashTitle()
    {
        return $this->name;
    }

    public function trashDocumentType()
    {
        return 'User';
    }

    public function trashedAt()
    {
        $this->deleted_at;
    }
}
