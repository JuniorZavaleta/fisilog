<?php
namespace FisiLog\BusinessClasses;

use Illuminate\Contracts\Support\Arrayable;

class ClassType implements Arrayable {

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

   /**
    * Return the name of the user type on lower letters
    * @return string
    */
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