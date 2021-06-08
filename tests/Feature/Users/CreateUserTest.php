<?php

namespace Tests\Feature\Users;

use App\Models\User;
use Illuminate\Support\Str;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateUserTest extends TestCase
{
    use RefreshDatabase;

    protected $withData = [
        'name'=> 'Antonio Prueba',
        'email'=> 'antonio@mail.es',
        'password'=>  '1234',
        'phone_number'=> '98212456',
        'description'=> 'Descripcion de antonio',
    ];

    /** @test */
    function it_loads_the_new_users_page()
    {
        $this->get(route('users.create'))
            ->assertStatus(200)
            ->assertSee('Crear nuevo usuario');
    }

    /** @test */
    function it_creates_a_new_user()
    {
        $this->from(route('users.create'))
            ->post(route('users.store', $this->withData))
            ->assertRedirect(route('users.index'));

        $this->assertCredentials([
            'name'=> 'Antonio Prueba',
            'email'=> 'antonio@mail.es',
            'password'=>  '1234',
            'phone_number'=> '98212456',
            'description'=> 'Descripcion de antonio',
        ]);
    }

    /** @test */
    function the_email_must_be_valid()
    {
        $this->handleValidationExceptions();

        $this->from(route('users.create'))
            ->post(route('users.store', [
                'email'=> 'not-an-email',
            ]))->assertSessionHasErrors(['email'])
            ->assertRedirect(url()->previous());

        $this->assertDatabaseMissing('users',[
            'email'=> 'not-an-email',
        ]);
    }

    /** @test */
    function the_email_must_be_unique()
    {
        User::factory()->create([
            'email'=> 'antonio@mail.es',
        ]);

        $this->handleValidationExceptions();

        $this->from(route('users.create'))
            ->post(route('users.store', [
                'email'=> 'antonio@mail.es',
            ]))->assertSessionHasErrors(['email'])
            ->assertRedirect(url()->previous());

            //Comprobar que es unico

    }

    /** @test */
    function the_password_field_is_required()
    {
        $this->handleValidationExceptions();

        $this->from(route('users.create'))
            ->post(route('users.store', [
                'password'=> null,
            ]))->assertSessionHasErrors(['password'])
            ->assertRedirect(url()->previous());

        $this->assertDatabaseCount('users', 0);
    }

    /** @test */
    function the_phone_field_is_required()
    {
        $this->handleValidationExceptions();

        $this->from(route('users.create'))
            ->post(route('users.store', [
                'phone_number'=> null,
            ]))->assertSessionHasErrors(['phone_number'])
            ->assertRedirect(url()->previous());

        $this->assertDatabaseCount('users', 0);
    }

    /** @test */
    function the_phone_field_must_be_a_number()
    {
        $this->handleValidationExceptions();

        $this->from(route('users.create'))
            ->post(route('users.store', [
                'phone_number'=> 'String',
            ]))->assertSessionHasErrors(['phone_number'])
            ->assertRedirect(url()->previous());

        $this->assertDatabaseCount('users', 0);
    }

    /** @test */
    function the_description_field_is_required()
    {
        $this->handleValidationExceptions();

        $this->from(route('users.create'))
            ->post(route('users.store', [
                'description'=> null,
            ]))->assertSessionHasErrors(['description'])
            ->assertRedirect(url()->previous());

        $this->assertDatabaseCount('users', 0);
    }


    /** @test */
    function the_description_field_is_on_range()
    {
        $this->handleValidationExceptions();

        $this->from(route('users.create'))
            ->post(route('users.store', [
                'description'=>  Str::random(1200),
            ]))->assertSessionHasErrors(['description'])
            ->assertRedirect(url()->previous());

        $this->assertDatabaseCount('users', 0);
    }

}
