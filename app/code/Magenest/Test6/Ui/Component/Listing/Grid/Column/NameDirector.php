<?php

namespace Magenest\Test6\Ui\Component\Listing\Grid\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magenest\Test2\Model\DirectorFactory;

class NameDirector extends Column
{
    /**
     * @var DirectorFactory
     */
    protected $dirctorFactory;

    /**
     * @param DirectorFactory $dirctorFactory
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param array $components
     * @param array $data
     */
    public function __construct(
        DirectorFactory    $dirctorFactory,
        ContextInterface   $context,
        UiComponentFactory $uiComponentFactory,
        array              $components = [],
        array              $data = [])
    {
        $this->dirctorFactory = $dirctorFactory;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            $fieldName = $this->getData('name');
            foreach ($dataSource['data']['items'] as & $item) {
                if ($item[$fieldName] != '') {
                    $adminName = $this->getDirectorName($item[$fieldName]);
                    $item[$fieldName] = $item[$fieldName] . ' (' . $adminName . ')';
                }
            }
        }
        return $dataSource;
    }

    /**
     * @param $userId
     * @return mixed
     */
    private function getDirectorName($userId)
    {
        $user = $this->dirctorFactory->create()->load($userId);
        return $user->getName();
    }
}
