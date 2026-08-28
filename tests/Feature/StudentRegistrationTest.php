<?php

namespace Tests\Feature;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class StudentRegistrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * The registration form page loads.
     */
    public function test_registration_form_page_loads(): void
    {
        $response = $this->get(route('students.create'));

        $response->assertStatus(200);
        $response->assertSee('Registration Form');
        $response->assertSee('Student ID');
        $response->assertSee('Profile Picture');
    }

    /**
     * The students index page loads.
     */
    public function test_students_index_page_loads(): void
    {
        $response = $this->get(route('students.index'));

        $response->assertStatus(200);
        $response->assertSee('Registered Students');
    }

    /**
     * Validation fails when required fields are missing.
     */
    public function test_registration_validation_fails_with_missing_fields(): void
    {
        $response = $this->post(route('students.store'), []);

        $response->assertSessionHasErrors([
            'student_id',
            'first_name',
            'last_name',
            'email',
            'mobile_number',
            'date_of_birth',
            'gender',
            'program',
            'year_level',
            'address',
            'profile_picture',
        ]);
        $this->assertDatabaseCount('students', 0);
    }

    /**
     * Validation fails when the file is not an image.
     */
    public function test_registration_validation_fails_with_non_image_file(): void
    {
        $response = $this->post(route('students.store'), $this->validPayload([
            'profile_picture' => UploadedFile::fake()->create('document.pdf', 500),
        ]));

        $response->assertSessionHasErrors('profile_picture');
        $this->assertDatabaseCount('students', 0);
    }

    /**
     * A student is registered successfully with a profile picture.
     */
    public function test_student_registers_successfully(): void
    {
        Storage::fake('public');

        $response = $this->post(route('students.store'), $this->validPayload([
            'profile_picture' => UploadedFile::fake()->image('profile.jpg', 200, 200),
        ]));

        $response->assertRedirect(route('students.show', 1));
        $response->assertSessionHas('success', 'Student registered successfully!');

        $this->assertDatabaseHas('students', [
            'student_id' => '2024-00123',
            'email' => 'juan.delacruz@cit.edu.ph',
            'first_name' => 'Juan',
            'last_name' => 'Dela Cruz',
        ]);

        $student = Student::first();
        Storage::disk('public')->assertExists($student->profile_picture);
    }

    /**
     * Duplicate student ID and email are rejected.
     */
    public function test_registration_rejects_duplicate_student_id_and_email(): void
    {
        Student::create($this->validPayload([
            'profile_picture' => 'profile_pictures/test.jpg',
        ]));

        $response = $this->post(route('students.store'), $this->validPayload([
            'profile_picture' => UploadedFile::fake()->image('profile.jpg', 200, 200),
        ]));

        $response->assertSessionHasErrors(['student_id', 'email']);
        $this->assertDatabaseCount('students', 1);
    }

    /**
     * The show page displays the registered student details.
     */
    public function test_show_page_displays_student_details(): void
    {
        $student = Student::create($this->validPayload([
            'profile_picture' => 'profile_pictures/test.jpg',
        ]));

        $response = $this->get(route('students.show', $student->id));

        $response->assertStatus(200);
        $response->assertSee('Juan Santos Dela Cruz');
        $response->assertSee('2024-00123');
        $response->assertSee('juan.delacruz@cit.edu.ph');
    }

    /**
     * Build a valid registration payload.
     */
    private function validPayload(array $overrides = []): array
    {
        return array_merge([
            'student_id' => '2024-00123',
            'first_name' => 'Juan',
            'middle_name' => 'Santos',
            'last_name' => 'Dela Cruz',
            'email' => 'juan.delacruz@cit.edu.ph',
            'mobile_number' => '09171234567',
            'date_of_birth' => '2002-05-15',
            'gender' => 'Male',
            'program' => 'BS Information Technology',
            'year_level' => '2nd Year',
            'address' => '123 Rizal St., Manila',
            'profile_picture' => 'profile_pictures/test.jpg',
        ], $overrides);
    }
}
