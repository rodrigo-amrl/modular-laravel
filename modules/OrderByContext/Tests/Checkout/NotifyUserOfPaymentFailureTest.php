<?php

declare(strict_types=1);

namespace Modules\OrderByContext\Tests\Checkout;

use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Mail;
use Modules\OrderByContext\Checkout\NotifyUserOfPaymentFailure;
use Modules\OrderByContext\Checkout\PaymentForOrderFailed;
use Modules\OrderByContext\Contracts\OrderDto;
use Modules\OrderByContext\Infrastructure\Database\Factories\OrderFactory;
use Modules\Payment\PaymentFailed;
use Modules\User\UserDto;
use Tests\TestCase;

class NotifyUserOfPaymentFailureTest extends TestCase
{
    use DatabaseMigrations;

    public function test_it_notifies_the_user_of_the_payment_failure(): void
    {
        Mail::fake();

        $order = OrderFactory::new()->create();
        $orderDto = OrderDto::fromEloquentModel($order);
        $userDto = UserDto::fromEloquentModel(UserFactory::new()->create());

        $event = new PaymentFailed($orderDto, $userDto, 'Payment failed.');
        app(NotifyUserOfPaymentFailure::class)->handle($event);

        Mail::assertSent(PaymentForOrderFailed::class, fn (PaymentForOrderFailed $mailable) =>
            $mailable->hasTo($userDto->email)
        );
    }
}
