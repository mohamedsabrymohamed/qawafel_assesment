<?php

interface ICoupon
{
    /**
     * @param float $amount
     * @return mixed
     */
    public function calc(float $amount);
}