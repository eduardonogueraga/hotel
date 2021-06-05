<?php

namespace Tests\Feature\Users;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateUserTest extends TestCase
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
    function it_loads_the_edit_users_page()
    {
        $oldUser = User::factory()->create();

        $this->get(route('users.edit', ['user' => $oldUser]))
            ->assertStatus(200)
            ->assertSee('Editar usuario')
            ->assertSee($oldUser->name)
            ->assertSee($oldUser->email)
            ->assertSee($oldUser->phone_number)
            ->assertViewHas('user', function ($viewUser) use ($oldUser) {
                return $viewUser->id === $oldUser->id;
            });;
    }

    /** @test */
    function it_can_edit_a_user()
    {
        $oldUser = User::factory()->create();


        $this->from(route('users.edit', ['user' => $oldUser]))
            ->put(route('users.update', ['user' => $oldUser]),$this->withData)
            ->assertRedirect(route('users.index'));

        $this->assertDatabaseHas('users', [
            'name'=> 'Antonio Prueba',
            'email'=> 'antonio@mail.es',
            'phone_number'=> '98212456',
            'description'=> 'Descripcion de antonio',
        ]);

        $this->assertDatabaseCount('users', 1);

    }

    /** @test */
    function the_email_must_be_valid()
    {
        $oldUser = User::factory()->create();

        $this->handleValidationExceptions();

        $this->from(route('users.edit', ['user' => $oldUser]))
            ->put(route('users.update', ['user' => $oldUser]), [
                'email'=> 'not-an-email',
            ])->assertSessionHasErrors(['email'])
            ->assertRedirect(url()->previous());

        $this->assertDatabaseHas('users',[
            'email'=> $oldUser->email,
        ]);
    }

    /** @test */
    function the_email_must_be_unique()
    {
        User::factory()->create([
            'email' => 'repitedemail@mail.com'
        ]);
        $oldUser = User::factory()->create();

        $this->handleValidationExceptions();

        $this->from(route('users.edit', ['user' => $oldUser]))
            ->put(route('users.update', ['user' => $oldUser]), [
                'email'=> 'repitedemail@mail.com',
            ])->assertSessionHasErrors(['email'])
            ->assertRedirect(url()->previous());

        $this->assertDatabaseHas('users',[
            'email'=> $oldUser->email,
        ]);
    }

    /** @test */
    function the_phone_field_is_required()
    {
        $this->handleValidationExceptions();
        $oldUser = User::factory()->create();

        $this->from(route('users.edit', ['user' => $oldUser]))
            ->put(route('users.update', ['user' => $oldUser]), [
                'phone_number'=> null,
            ])->assertSessionHasErrors(['phone_number'])
            ->assertRedirect(url()->previous());

        //Falta controlar pk no tenemos assert credentials

        $this->assertDatabaseHas('users',[
            'phone_number'=> $oldUser->phone_number,
        ]);

    }

    /** @test */
    function the_phone_field_must_be_valid()
    {
        $this->handleValidationExceptions();
        $oldUser = User::factory()->create();

        $this->from(route('users.edit', ['user' => $oldUser]))
            ->put(route('users.update', ['user' => $oldUser]), [
                'phone_number'=> 'String',
            ])->assertSessionHasErrors(['phone_number'])
            ->assertRedirect(url()->previous());

        //Falta controlar pk no tenemos assert credentials

        $this->assertDatabaseHas('users',[
            'phone_number'=> $oldUser->phone_number,
        ]);

    }

    /** @test */
    function the_description_field_is_required()
    {
        $this->handleValidationExceptions();
        $oldUser = User::factory()->create();

        $this->from(route('users.edit', ['user' => $oldUser]))
            ->put(route('users.update', ['user' => $oldUser]), [
                'description'=> null,
            ])->assertSessionHasErrors(['description'])
            ->assertRedirect(url()->previous());

        //Falta controlar pk no tenemos assert credentials

        $this->assertDatabaseHas('users',[
            'description'=> $oldUser->description,
        ]);

    }

    /** @test */
    function the_description_field_is_on_range()
    {
        $this->handleValidationExceptions();
        $oldUser = User::factory()->create();

        $this->from(route('users.edit', ['user' => $oldUser]))
            ->put(route('users.update', ['user' => $oldUser]), [
                'description'=> \Str::random(1200),
            ])->assertSessionHasErrors(['description'])
            ->assertRedirect(url()->previous());

        //Falta controlar pk no tenemos assert credentials

        $this->assertDatabaseHas('users',[
            'description'=> $oldUser->description,
        ]);

    }


}
