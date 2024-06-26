<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Content extends Model
{
    use HasFactory;

	protected $table = 'content';

	protected $fillable =
		[
			'header',
			'description',
			'image1',
			'image2',
			'who_we_are',
			'our_vision',
			'our_history'
		];

	public function user(  ) : BelongsTo {
		return $this->belongsTo('user');
	}
}
