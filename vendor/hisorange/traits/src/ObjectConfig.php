<?php
namespace hisorange\Traits;

trait ObjectConfig {

	/**
	 * Store object' configurations.
	 *
	 * @var array
	 */
	protected $objectConfig 		= [];

	/**
	 * Check key in the config.
	 *
	 * @param  string $key
	 * @return boolean
	 */
	public function objectConfigExists($key)
	{
		return array_key_exists($key, $this->objectConfig);
	}

	/**
	 * Set a value in the config.
	 *
	 * @param  string $key
	 * @param  mixed  $value
	 * @return void
	 */
	public function objectConfigSet($key, $value)
	{
		$this->objectConfig[$key]	= $value;
	}

	/**
	 * Get a value from the config.
	 *
	 * @param  string $key
	 * @param  mixed  $default
	 * @return mixed
	 */
	public function objectConfigGet($key, $default = null)
	{
		// Is this key exists?
		if (array_key_exists($key, $this->objectConfig)) {
			return $this->objectConfig[$key];
		}

		return $default;
	}

	/**
	 * Delete a configuration by key from the object.
	 *
	 * @param  string $key
	 * @return void
	 */
	public function objectConfigDelete($key)
	{
		unset($this->objectConfig[$key]);
	}

	/**
	 * Import a config array.
	 *
	 * @param  array $cache
	 * @return void
	 */
	public function objectConfigImport(array $cache)
	{
		$this->objectConfig 	= $cache;
	}

	/**
	 * Export the config array.
	 *
	 * @return array
	 */
	public function objectConfigExport()
	{
		return $this->objectConfig;
	}

	/**
	 * Reset the config.
	 *
	 * @return void
	 */
	public function objectConfigReset()
	{
		$this->objectConfig = [];
	}

}