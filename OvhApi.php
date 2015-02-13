<?php

namespace Zoddo\OvhBundle;

class OvhApi
{
	/**
	 * @var \Ovh\Api
	 */
	protected $api = null;

	/**
	 * @var string
	 */
	protected $key;

	/**
	 * @var string
	 */
	protected $secret;

	/**
	 * @var string
	 */
	protected $endPoint;

	public function __construct($key, $secret, $endPoint, $ckey = null)
	{
		$this->key = $key;
		$this->secret = $secret;
		$this->endPoint = $endPoint;
		$this->setCKey($ckey);
	}

	public function setCKey($ckey)
	{
		$this->api = new \Ovh\Api($this->key, $this->secret, $this->endPoint, $ckey);
	}

	public function __call($name, $arguments)
	{
		if (is_callable(array(&$this->api, $name)))
		{
			return call_user_func_array(array(&$this->api, $name), $arguments);
		}
		else
		{
			throw new BadMethodCallException(sprintf('Attempted to call method "%s" on class "%s"', $name, get_class($this->api)));
		}
	}

	public function getKey()
	{
		return $this->key;
	}

	public function getSecret()
	{
		return $this->secret;
	}

	public function getEndPoint()
	{
		return $this->endPoint;
	}

	public function getCKey()
	{
		return $this->api->getConsumerKey();
	}
}