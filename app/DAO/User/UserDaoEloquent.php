<?php
namespace FisiLog\DAO\User;
use FisiLog\BusinessClasses\User as UserBusiness;
use FisiLog\BusinessClasses\Document as DocumentBusiness;
use FisiLog\Models\User as UserModel;
use Image;
use URL;

class UserDaoEloquent implements UserDao {
  public function save(UserBusiness $userBusiness) {
    $userModel = new UserModel;
    $userModel->name = $userBusiness->getName();
    $userModel->lastname = $userBusiness->getLastname();
    $userModel->email = $userBusiness->getEmail();
    $userModel->phone = $userBusiness->getPhone();
    $userModel->type = $userBusiness->getType();
    $userModel->password = $userBusiness->getPassword();

    $image = $userBusiness->getPhotoUrl();
    $filename  = time() . '.' . $image->getClientOriginalName();
    $url = "img/users/" . $filename;
    $path = public_path($url);
    // resize image
    Image::make($image->getRealPath())
    ->save($path);

    $userModel->photo_url = $url;
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
      $query->where('code','=',$document->getCode());
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
    $userBusiness->setPhotoUrl($userModel->photo_url);

    return $userBusiness;
  }
  public function getById($id) {
        $userModel    = UserModel::find($id);
        if ($userModel == null)
          return null;
        $userBusiness = new userBusiness;
        $userBusiness->setId($id);
        $userBusiness->setUser($userModel->user);
        $userBusiness->setClase($userModel->claser);
        $userBusiness->setDate($userModel->date);
        $userBusiness->setVerified($userModel->verified);
        return $userBusiness;
  }
}