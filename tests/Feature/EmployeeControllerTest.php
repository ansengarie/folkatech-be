<?php

namespace Tests\Feature;

use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class EmployeeControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    /** @test */
public function it_can_create_employee_and_send_email()
{
    // Set up company data menggunakan factory
    $company = \App\Models\Company::factory()->create();

    // Data untuk employee yang akan ditambahkan
    $data = [
        'firstname' => 'John',
        'lastname' => 'Doe',
        'company_id' => $company->id,
        'email' => 'john.doe@example.com',
        'phone' => '123456789',
    ];

    // Simulasikan pengiriman email
    Mail::fake();

    // Kirim POST request ke store method
    $response = $this->post(route('employees.store'), $data);

    // Verifikasi bahwa employee berhasil disimpan
    $this->assertDatabaseHas('employees', [
        'firstname' => 'John',
        'lastname' => 'Doe',
        'email' => 'john.doe@example.com',
    ]);

    // Verifikasi bahwa email dikirim ke admin perusahaan
    Mail::assertSent(\App\Mail\NewEmployeeNotification::class, function ($mail) use ($company) {
        return $mail->hasTo($company->email);
    });


    // Verifikasi redirect ke index dengan success message
    $response->assertRedirect(route('employees.index'));
    $response->assertSessionHas('success', 'Employee created successfully.');
}
}
