<?php

namespace FisiLog\Models;
use FisiLog\Models\Document;
use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    protected $table = 'document_types';

    public function document(){
        return $this->hasMany(Document::class,'id');
    }
}
