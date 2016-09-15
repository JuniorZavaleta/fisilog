<?php
namespace FisiLog\Http\Controllers\Backend;

use Illuminate\Http\Request;

use FisiLog\Http\Requests;
use FisiLog\Http\Controllers\Controller;

use FisiLog\DAO\DaoEloquentFactory;

use FisiLog\DAO\User\UserDaoEloquent as User;

class DocumentController extends Controller
{
   public function __construct(DaoEloquentFactory $dao)
   {
      $this->document_persistence = $dao->getDocumentDAO();
   }

   public function index($user)
   {
      $user = User::createBusinessClass($user);
      $documents = $this->document_persistence->getByUserId($user->getId());

      $data = [
         'user' => $user,
         'documents' => $documents,
      ];

      return view('backend.users.documents.index', $data);
   }
}
