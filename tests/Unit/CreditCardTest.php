<?php

namespace Tests\Feature;

use App\User;
use App\CreditCard;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactsTest extends TestCase
{
  use DatabaseTransactions;
  protected function setUp(): void
  {
    parent::setUp();

    $this->user = factory(User::class)->create([
      'phone' => '07082528923',
      'dob' => '06/06/1991',
      'password' => bcrypt('00000000'),
      'role' => 'customer',
    ]);

    $this->user->creditCards()->saveMany(
      factory(CreditCard::class, 5)->make()
    );
    // CreditCard::create(['id' => '1', 'customer_id' => $this->user->id, 'number' => '123456', 'expire' => '09/10/2020', 'brand' => 'Zenith']);
  }

  public function test_prevent_not_logged_in_user_from_adding_credit_card()
  {
    $response = $this->get(route('credit.index'));
    $response->assertRedirect(route('login'));
  }
  public function test_user_can_login()
  {
    $this->actingAs($this->user);
    $this->assertAuthenticatedAs($this->user);
  }

  public function test_admin_can_view_customer()
  {
    $user = factory(User::class)->make([
      'role' => 'admin'
    ]);
    $this->actingAs($user)
      ->get('/customer')
      ->assertStatus(200);
  }

  public function test_customer_cannot_view_allcustomers_page()
  {
    $this->actingAs($this->user)
      ->get('/customer')
      ->assertStatus(302);
  }

  public function test_customer_cannot_view_deleted_cards()
  {

    $this->user->creditCards()->saveMany(
      factory(CreditCard::class, 5)->make()
    )->first()->delete();
    $this->actingAs($this->user)
      ->get('/credit')
      ->assertStatus(200)
      ->assertPropCount('cards', 9);
  }


  public function test_user_can_view_a_login_form()
  {
    $response = $this->get('/login');
    $response->assertSuccessful();
    $response->assertViewIs('app');
  }
}
