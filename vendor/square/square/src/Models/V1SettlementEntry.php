<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * V1SettlementEntry
 */
class V1SettlementEntry implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $paymentId;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var V1Money|null
     */
    private $amountMoney;

    /**
     * @var V1Money|null
     */
    private $feeMoney;

    /**
     * Returns Payment Id.
     *
     * The settlement's unique identifier.
     */
    public function getPaymentId(): ?string
    {
        return $this->paymentId;
    }

    /**
     * Sets Payment Id.
     *
     * The settlement's unique identifier.
     *
     * @maps payment_id
     */
    public function setPaymentId(?string $paymentId): void
    {
        $this->paymentId = $paymentId;
    }

    /**
     * Returns Type.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Sets Type.
     *
     * @maps type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * Returns Amount Money.
     */
    public function getAmountMoney(): ?V1Money
    {
        return $this->amountMoney;
    }

    /**
     * Sets Amount Money.
     *
     * @maps amount_money
     */
    public function setAmountMoney(?V1Money $amountMoney): void
    {
        $this->amountMoney = $amountMoney;
    }

    /**
     * Returns Fee Money.
     */
    public function getFeeMoney(): ?V1Money
    {
        return $this->feeMoney;
    }

    /**
     * Sets Fee Money.
     *
     * @maps fee_money
     */
    public function setFeeMoney(?V1Money $feeMoney): void
    {
        $this->feeMoney = $feeMoney;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return mixed
     */
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->paymentId)) {
            $json['payment_id']   = $this->paymentId;
        }
        if (isset($this->type)) {
            $json['type']         = $this->type;
        }
        if (isset($this->amountMoney)) {
            $json['amount_money'] = $this->amountMoney;
        }
        if (isset($this->feeMoney)) {
            $json['fee_money']    = $this->feeMoney;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
