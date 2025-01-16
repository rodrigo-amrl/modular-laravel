<?php

namespace Modules\OrderByType\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Modules\OrderByType\Actions\PurchaseItems;
use Modules\OrderByType\DTOs\PendingPayment;
use Modules\OrderByType\Http\Requests\CheckoutRequest;
use Modules\Payment\Exceptions\PaymentFailedException;
use Modules\Payment\PaymentGateway;
use Modules\Product\Collections\CartItemCollection;
use Modules\User\UserDto;

class CheckoutController
{
    public function __construct(
        protected PurchaseItems $purchaseItems,
        protected PaymentGateway $paymentGateway
    ) {}

    public function __invoke(CheckoutRequest $request): JsonResponse
    {
        $cartItems = CartItemCollection::fromCheckoutData($request->input('products'));
        $pendingPayment = new PendingPayment($this->paymentGateway, $request->input('payment_token'));
        $userDto = UserDto::fromEloquentModel($request->user());

        try {
            $order = $this->purchaseItems->handle(
                $cartItems,
                $pendingPayment,
                $userDto
            );
        } catch (PaymentFailedException) {
            throw ValidationException::withMessages([
                'payment_token' => 'We could not complete your payment.',
            ]);
        }

        return response()->json([
            'order_url' => $order->url,
        ], 201);
    }
}
