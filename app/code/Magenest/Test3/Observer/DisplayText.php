<?php

namespace Magenest\Test3\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\Config\Storage\WriterInterface;

class DisplayText implements ObserverInterface
{
    /**
     * @var RequestInterface
     */
    private $request;
    /**
     * @var WriterInterface
     */
    private $configWriter;

    /**
     * ConfigChange constructor.
     * @param RequestInterface $request
     * @param WriterInterface $configWriter
     */
    public function __construct(
        RequestInterface $request,
        WriterInterface  $configWriter
    )
    {
        $this->request = $request;
        $this->configWriter = $configWriter;
    }

    public function execute(EventObserver $observer)
    {
        $textfield = $this->request->getParam('groups');        //debug de chose getParam
        $value = $textfield['general']['fields']['text_field']['value'];
        if ($value == 'Ping') {
            $this->configWriter->save('movie/general/text_field', 'Pong');  //duong dan vao text field
        }
        return $this;
    }
}
