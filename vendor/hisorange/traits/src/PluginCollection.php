<?php
namespace hisorange\Traits;

trait PluginCollection {

	/**
	 * Store plugins and configs.
	 *
	 * @var array
	 */
	protected $pluginCollection 		= [];

	/**
	 * Import plugin collection from array.
	 *
	 * @param  array $plugins
	 * @return void
	 */
	public function pluginCollectionImport($plugins)
	{
		$this->pluginCollection = array_merge($plugins, $this->pluginCollection);
	}

	/**
	 * Export the plugin collection array.
	 *
	 * @return array
	 */
	public function pluginCollectionExport()
	{
		return $this->pluginCollection;
	}

	/**
	 * Register a new plugin to the collection.
	 *
	 * @param  string $plugin
	 * @param  array  $config
	 * @return void
	 */
	public function pluginCollectionRegister($plugin, array $config = [])
	{
		$this->pluginCollection[$plugin] 	= $config;
	}

	/**
	 * Deregister a plugin from the collection.
	 *
	 * @param  string $plugin
	 * @return void
	 */
	public function pluginCollectionDeregister($plugin)
	{
		unset($this->pluginCollection[$plugin]);
	}

	/**
	 * Check if the plugin is registered.
	 *
	 * @param  string $plugin
	 * @return boolean
	 */
	public function pluginCollectionIsRegistered($plugin)
	{
		return array_key_exists($plugin, $this->pluginCollection);
	}

	
}