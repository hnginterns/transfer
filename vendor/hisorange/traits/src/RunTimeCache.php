<?php
namespace hisorange\Traits;

trait RunTimeCache {

	/**
	 * Store the key & value pairs.
	 *
	 * @var array
	 */
	protected $runTimeCache 		= [];

	/**
	 * Check key in the cache.
	 *
	 * @param  string $key
	 * @return boolean
	 */
	public function runTimeCacheExists($key)
	{
		return array_key_exists($key, $this->runTimeCache);
	}

	/**
	 * Set a value into the cache.
	 *
	 * @param  string $key
	 * @param  mixed  $value
	 * @return void
	 */
	public function runTimeCacheSet($key, $value)
	{
		$this->runTimeCache[$key]	= $value;
	}

	/**
	 * Get a value from the cache.
	 *
	 * @param  string $key
	 * @param  mixed  $default
	 * @return mixed
	 */
	public function runTimeCacheGet($key, $default = null)
	{
		// Is this key exists?
		if (array_key_exists($key, $this->runTimeCache)) {
			return $this->runTimeCache[$key];
		}

		return $default;
	}

	/**
	 * Delete a value from the cache.
	 *
	 * @param  string $key
	 * @return void
	 */
	public function runTimeCacheDelete($key)
	{
		unset($this->runTimeCache[$key]);
	}

	/**
	 * Import a runtime cache array.
	 *
	 * @param  array $cache
	 * @return void
	 */
	public function runTimeCacheImport(array $cache)
	{
		$this->runTimeCache 	= $cache;
	}

	/**
	 * Export the runtime cache array.
	 *
	 * @return array
	 */
	public function runTimeCacheExport()
	{
		return $this->runTimeCache;
	}

	/**
	 * Reset the cache.
	 *
	 * @return void
	 */
	public function runTimeCacheReset()
	{
		$this->runTimeCache = [];
	}
}