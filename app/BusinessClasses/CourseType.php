<?php
namespace FisiLog\BusinessClasses;

use Illuminate\Contracts\Support\Arrayable;

class CourseType implements Arrayable {

   /**
    * @var integer
    */
   protected $id;

   /**
    * @var string
    */
   protected $name;

   /**
    * Create a new instance of User Type
    * @param string $name
    * @return
    */
   public function __construct($id, $name)
   {
      $this->id = $id;
      $this->name = $name;
   }

   public function getName()
   {
      return $this->name;
   }

   public function getId()
   {
      return $this->id;
   }

   /**
     * Get the instance as an array.
     *
     * @return array
     */
   public function toArray() {
      return [
         'id' => $this->id,
         'name' => $this->name,
      ];
   }
}