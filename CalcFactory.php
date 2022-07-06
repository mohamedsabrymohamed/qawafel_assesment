<?php

class CalcFactory
{
    /**
     * @return Discount
     */
    public function createDiscount()
    {
        return new Discount();
    }

    /**
     * @return AbsoluteCoupon
     */
    public function createAbsoluteCoupon()
    {
        return new AbsoluteCoupon();
    }

    /**
     * @return SlabCoupon
     */
    public function createSlabCoupon()
    {
        return new SlabCoupon();
    }
}