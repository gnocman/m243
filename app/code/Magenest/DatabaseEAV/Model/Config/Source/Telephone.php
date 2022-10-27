<?php

namespace Magenest\DatabaseEAV\Model\Config\Source;

class Telephone extends \Magento\Eav\Model\Entity\Attribute\Backend\AbstractBackend
{
    public function beforeSave($object)
    {
        if ($object->getData($this->getAttribute()->getAttributeCode())) {
            $value = $object->getData($this->getAttribute()->getAttributeCode());
            if (substr($value, 0, 3) == '+84') {
                $value = '0' . substr($value, 3);
            }

            if (strlen($value) == 10 && substr($value, 0, 1) == '0') {
                $object->setData($this->getAttribute()->getAttributeCode(), $value);
            } else {
                throw new \Magento\Framework\Exception\LocalizedException(
                    __('Telephone number must be 10 digits and start with 0 or +84')
                );
            }
        }

        return $this;
    }
}

