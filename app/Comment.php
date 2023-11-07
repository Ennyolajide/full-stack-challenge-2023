<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    protected $encryptable = [
        'comment'
    ];

    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        if (in_array($key, $this->encryptable) && $value !== null) {
            $value = decrypt($value);
        }

        return $value;
    }

    public function setAttribute($key, $value)
    {
        if (in_array($key, $this->encryptable) && $value !== null) {
            $value = encrypt($value);
        }

        return parent::setAttribute($key, $value);
    }


    public function referral()
    {
        return $this->belongsTo(Referral::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }   
}
