<?php namespace Owlgrin\Throttle\Period;

use Carbon\Carbon;
use Owlgrin\Throttle\Period\PeriodInterface;

class CurrentSubscriptionPeriod implements PeriodInterface {

	protected $period;

	public function start($formatted = false)
	{
		return $formatted ?  Carbon::today()->startOfMonth()->toFormattedDateString() : Carbon::today()->startOfMonth()->toDateString();
	}

	public function end($formatted = false)
	{
		return $formatted ? Carbon::today()->endOfMonth()->toFormattedDateString() : Carbon::today()->endOfMonth()->toDateString();
	}	

	public function isNewPeriod()
	{
		return Carbon::today()->toDateString() === $this->start();
	}	
}