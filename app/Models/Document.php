<?php

namespace FisiLog\Models;
use FisiLog\Models\User;
use FisiLog\Models\DocumentType;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'documents';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function documentType(){
        return $this->belongsTo(DocumentType::class);
    }
}
