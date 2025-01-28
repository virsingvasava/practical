<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'logs'; // Ensure this matches your database table name

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'level',      // Log level: info, error, warning, etc.
    //     'message',    // The log message
    //     'context',    // Additional context as JSON
    //     'created_at', // Timestamp when the log was created
    //     'updated_at', // Timestamp when the log was updated
    // ];

    protected $fillable = [
        'user_id', 'role', 'message', 'url', 'method', 'params', 'ip', 'user_agent',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'context' => 'array', // Automatically cast JSON context to array
    ];
}
