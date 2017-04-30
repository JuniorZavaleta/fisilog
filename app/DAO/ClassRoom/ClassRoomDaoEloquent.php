<?php
namespace FisiLog\DAO\ClassRoom;

use FisiLog\BusinessClasses\ClassRoom as ClassRoomBusiness;
use FisiLog\Models\ClassRoom as ClassRoomModel;

use FisiLog\DAO\Facultad\FacultadDaoEloquent as FacultadModel;

class ClassRoomDaoEloquent implements ClassRoomDao {

   public function findById($id)
   {
      $classroom_model = ClassRoomModel::find($id);

      return static::createBusinessClass($classroom_model);
   }

   public function getAll()
   {
      $classrooms_model = ClassRoomModel::all();
      $classrooms_business = [];

      foreach ($classrooms_model as $classroom_model)
         $classrooms_business[] = static::createBusinessClass($classroom_model);

      return $classrooms_business;
  }

   public static function createBusinessClass(ClassRoomModel $classroom_model)
   {
      if ($classroom_model == null)
         return null;

      $classroom_business = new ClassRoomBusiness(
         $classroom_model->name,
         FacultadModel::createBusinessClass($classroom_model->facultad)
      );

      return $classroom_business;
   }

   public function save(ClassRoomBusiness &$classroom_business)
   {
      $classroom_model = ClassRoomModel::create($classroom_business->toArray());
      $classroom_business->setId($classroom_model->id);
   }

   public function update(ClassRoomBusiness $classroom_business)
   {
      $classroom_model = ClassRoomModel::find($classroom_business->getId());
      $classroom_model->fill($classroom_business->toArray());
      $classroom_model->save();
   }

   public function getByFacultadId($facultad_id)
   {
      $classrooms_model = ClassRoomModel::where('facultad_id', '=', $facultad_id)->get();
      $classrooms_business = [];

      foreach ($classrooms_model as $classroom_model)
         $classrooms_business[] = static::createBusinessClass($classroom_model);

      return $classrooms_business;
   }

}