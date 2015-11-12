<?php

namespace FisiLog\Models;
use FisiLog\Models\Document;
use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    protected $table = 'document_types';

    public function documents(){
        return $this->hasMany(Document::class,'document_type_id');
    }
}
