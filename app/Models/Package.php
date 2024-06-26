<?php

namespace App\Models;

use App\Enums\PackageType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Package extends Model {
	use HasFactory;

	protected $table = 'package';

	protected $fillable = [
		'name',
		'description',
		'price'
	];

	protected $casts = [
		'name' => PackageType::class
	];

	public function user() : BelongsTo {
		return $this->belongsTo( User::class );
	}

}
