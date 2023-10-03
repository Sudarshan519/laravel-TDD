<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 *     schema="Article",
 *     title="Article",
 *     description="Article object",
 *     @OA\Property(property="id", type="integer"),
 *     @OA\Property(property="title", type="string"),
 *     @OA\Property(property="content", type="string"),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time"),
 * )
 * 
 * @OA\Schema(
 *   schema="Articles",
 *   title="Articles",
 *   @OA\Property(title="data",property="data",type="array",
 *     @OA\Items(type="object",ref="#/components/schemas/Article"),
 *   )
 * )
 * 
 * @OA\Parameter(
 *      parameter="Article--id",
 *      in="path",
 *      name="Article_id",
 *      required=true,
 *      description="Id of Article",
 *      @OA\Schema(
 *          type="integer",
 *          example="1",
 *      )
 * ),
 */
class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', // Add any other attributes that can be mass-assigned here
        'content',// other attributes...
        'created_at',
        'updated_at',
    ];
}

