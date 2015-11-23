<?php
namespace FisiLog\DAO\User;
use FisiLog\BusinessClasses\User as UserBusiness;
use FisiLog\BusinessClasses\Document as DocumentBusiness;
use FisiLog\Models\User as UserModel;

class UserDaoEloquent implements UserDao {
  public function save(UserBusiness $userBusiness) {
    $userModel = new UserModel;
    $userModel->name = $userBusiness->getName();
    $userModel->lastname = $userBusiness->getLastname();
    $userModel->email = $userBusiness->getEmail();
    $userModel->phone = $userBusiness->getPhone();
    $userModel->type = $userBusiness->getType();
    $userModel->save();
    $userBusiness->setId($userModel->id);

    return $userBusiness;
  }
  public function findByEmail($email) {
    $userModel = UserModel::where('email','=',$email)->first();

    return $this->createUser($userModel);;
  }
  public function findByDocument(DocumentBusiness $document) {
    $userModel = UserModel::whereHas('documents', function($query)use($document){
      $query->where('document_type_id','=',$document->getDocumentType()->getId() )
            ->where('code','=',$document->getCode());
    })->first();

    return $this->createUser($userModel);;
  }
  private function createUser(UserModel $userModel) {
    if ($userModel == null)
      return null;

    $userBusiness = new UserBusiness;
    $userBusiness->setId($userModel->id);
    $userBusiness->setPassword($userModel->password);
    $userBusiness->setName($userModel->name);
    $userBusiness->setLastname($userModel->lastname);
    $userBusiness->setEmail($userModel->email);
    $userBusiness->setPhone($userModel->phone);

    return $userBusiness;
  }
}