<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;

class PersonalAccessTokensModel extends Model
{
    
	public $id;
	public $tokenable_type;
	public $tokenable_id;
	public $name;
	public $token;
	public $abilities;
	public $last_used_at;
	public $created_at;
	public $updated_at;

}