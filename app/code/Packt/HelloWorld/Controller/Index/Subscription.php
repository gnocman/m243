<?php

namespace Packt\HelloWorld\Controller\Index;
use Magento\Framework\App\Action\Context;

class Subscription extends \Magento\Framework\App\Action\Action
{
    protected $subscriptionFactory;
    public function __construct(Context $context, \Packt\HelloWorld\Model\SubscriptionFactory $subscriptionFactory)
    {
        $this->subscriptionFactory = $subscriptionFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $subscription = $this->subscriptionFactory->create()->load(1);
        $subscription->setFirstname('John');
        $subscription->setLastname('Doe');
        $subscription->setEmail('john.doe@example.com');
        $subscription->setMessage('A short message to test');
        $subscription->save();
        $this->getResponse()->setBody('success');

        $subNew = $this->subscriptionFactory->create();
    }
}
