<?php
namespace Paynl\Payment\Model\Paymentmethod;

class Klarna extends PaymentMethod
{
    protected $_code = 'paynl_payment_klarna';

    protected function getDefaultPaymentOptionId()
    {
        return 1717;
    }

    public function assignData(\Magento\Framework\DataObject $data)
    {
        parent::assignData($data);

        if (is_array($data) && array_key_exists('birth_date', $data)) {
            $this->getInfoInstance()->setAdditionalInformation('birth_date', $data['birth_date']);
        } elseif ($data instanceof \Magento\Framework\DataObject) {
            $additional_data = $data->getAdditionalData();
            if (isset($additional_data['birth_date'])) {
                $birthDate = $additional_data['birth_date'];
                $this->getInfoInstance()->setAdditionalInformation('birth_date', $birthDate);
            }
        }
        return $this;
    }
}
