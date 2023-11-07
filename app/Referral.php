<?php

namespace App;
use Illuminate\Support\Facades\DB;

class Referral extends Model
{
    protected $fillable = ['reference_no', 'organisation', 'province', 'district', 'city', 'street_address', 'zipcode', 'country', 'gps_location', 'facility_name', 'facility_type', 'provider_name', 'position', 'phone', 'email', 'website', 'pills_available', 'code_to_use', 'type_of_service', 'note', 'womens_evaluation'];

    protected $encryptable = [
        'reference_no', 'organisation', 'province', 'district', 'city', 'street_address', 'zipcode', 'country', 'gps_location', 'facility_name', 'facility_type', 'provider_name', 'position', 'phone', 'email', 'website', 'pills_available', 'code_to_use', 'type_of_service', 'note', 'womens_evaluation'
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

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
