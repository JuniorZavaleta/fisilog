<?php

namespace FisiLog\Models;
use FisiLog\Models\User;
use FisiLog\Models\DocumentType;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
   protected $table = 'documents';
   protected $fillable = ['user_id', 'document_type_id', 'code'];

   public $timestamps = false;

   public function user()
   {
      return $this->belongsTo(User::class);
   }

   public function document_type()
   {
      return $this->belongsTo(DocumentType::class);
   }
}
