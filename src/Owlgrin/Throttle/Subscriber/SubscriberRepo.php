<?php namespace Owlgrin\Throttle\Subscriber;

interface SubscriberRepo {
	
	public function subscribe($userId, $planId);
	public function incrementUsage($subscriptionId, $featureId, $incrementCount);
	public function setLimit($subscriptionId, $featureId, $limit);
	public function userDetails($userId, $startDate, $endDate);
	public function featureLimit($planId, $featureId);
	public function checkFeatureLimit($subscriptionId, $featureId, $incrementCount);
	public function subscription($userId);
	public function can($subscriptionId, $identifier, $incrementCount);
	public function increment($subscriptionId, $identifier, $count);
}
