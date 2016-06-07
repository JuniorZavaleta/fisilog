<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use FisiLog\Models\User;
use FisiLog\Models\Document;
use FisiLog\Models\Student;

class StoreTest extends TestCase
{
   //use DatabaseTransactions;
   use WithoutMiddleware;

   protected $user;

   public function setUp()
   {
      parent::setUp();
      $this->user = User::find(1);
   }

   public function testRegisterWithoutFields()
   {
      $this->actingAs($this->user)
           ->call('POST', route('users.store'), ['_token' => csrf_token()]);

      $this->assertSessionHasErrors();
   }

   public function testRegisterComplete()
   {
      $user = factory(User::class)->make();
      $document = factory(Document::class)->make();
      $student = factory(Student::class)->make();

      $local_file = __DIR__ . DIRECTORY_SEPARATOR . 'test.jpg';

      $uploadedFile = new Symfony\Component\HttpFoundation\File\UploadedFile(
         $local_file,
         'test.jpg',
         'image/jpeg',
         4096,
         null,
         true
      );

      $values = [
         '_token' => csrf_token(),
         'name' => $user->name,
         'lastname' => $user->lastname,
         'email' => $user->email,
         'password' => $user->password,
         'phone' => $user->phone,
         'user_type' => 1,
         'document_type' => $document->document_type_id,
         'document_code' => $document->document_code,
         'photo' => $uploadedFile,
         'student_code' => $student->student_code,
         'school_id' => $student->school_id,
         'year_of_entry' => $student->year_of_entry,
      ];

      $response = $this->actingAs($this->user)
            ->action(
               'POST',
               'Backend\UserController@store',
               [],
               $values,
               [],
               ['photo' => $uploadedFile]
            );

      $this->assertEmpty( $response->getSession()->has('errors') );
   }
}
