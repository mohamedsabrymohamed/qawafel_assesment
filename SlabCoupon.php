<?php

use Enum\DiscountTypeEnum;

class SlabCoupon implements ICoupon
{
    public $minAmount;
    public $maxAmount;
    protected Discount $discount;

    /**
     * @param Discount $discount
     */
    public function __construct(Discount $discount)
    {
        $this->discount = $discount;
    }

    /**
     * @param float $amount
     * @return void
     * @throws Exception
     */
    protected function checkValidAmount(float $amount)
    {
        if ($amount >=$this->minAmount && $amount <= $this->maxAmount)
        {
            return;
        }
        throw new Exception('Invalid Amount');

    }

    /**
     * @return bool
     */
    protected function isDiscountTypeFixed(): boolean
    {
        return $this->discount->discountType == DiscountTypeEnum::FIXED;
    }

    /**
     * @return bool
     */
    protected function isDiscountTypePercentage(): boolean
    {
        return $this->discount->discountType == DiscountTypeEnum::PERCENTAGE;
    }

    /**
     * @return int
     */
    protected function getFixedDiscountAmount()
    {
        // some calculations
        $discountAmount = 12;
        return $discountAmount;
    }

    /**
     * @return int
     */
    protected function getPercentageDiscountAmount()
    {
        // some calculations
        $discountAmount = 13;
        return $discountAmount;
    }

    /**
     * @param float $amount
     * @return int|mixed
     * @throws Exception
     */
    public function calc(float $amount)
    {
        $this->checkValidAmount($amount);
        $discountAmount = 0;
        if ($this->isDiscountTypeFixed()) {
            $discountAmount = $this->getFixedDiscountAmount();
        }elseif ($this->isDiscountTypePercentage()) {
            $discountAmount = $this->getPercentageDiscountAmount();
        }else{
            throw new Exception('Invalid Discount Type');
        }

        if ($discountAmount > $this->discount->discountMaxAmount) {
            $discountAmount = $this->discount->discountMaxAmount;
        }

        return $discountAmount;
    }
}