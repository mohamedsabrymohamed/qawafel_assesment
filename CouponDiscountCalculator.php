<?php

class CouponDiscountCalculator
{

    /**
     * @param $amount
     * @return Discount
     */
    function calcDiscount($amount)
    {
        $calcFactory = new CalcFactory();
        $discount = $calcFactory->createDiscount();
        $coupon = new $calcFactory->createAbsoluteCoupon($discount);
        $coupon->calc();

        return $discount;
    }

}