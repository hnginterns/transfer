### HiSoRange - PHP Traits v1.0.0
***
Collection of some useful traits what I use across my packages but can be useful to any1 (who knows right?).

#### RunTimeCache trait
***
Simple runtime cache for results or objects. The traits reserves the **$runTimeCache** variable.

```php
// Check if the key stored in the cache.
$object->runTimeCacheExists('my.last.result.for.X');

// Store a value in the cache by key.
$object->runTimeCacheSet('my.last.result.for.X', [1,2,3]);

// Get the value from the cache by key.
$object->runTimeCacheGet('my.last.result.for.Y', ['Fallback', 'value', 'if not found']);

// Delete a value from the cache.
$object->runTimeCacheDelete('resultX');

// Import a cache array, replace all existing value.
$object->runTimeCacheImport(['r1' => 2, 'r3' => 94]);

// Export the cache array.
$object->runTimeCacheExport();

// Erase the cache values.
$object->runTimeCacheReset();
```

#### ObjetConfig trait
***
Store configuration on an object. The trait reserves the **$objectConfig** variable.

```php
// Check key in the config.
$object->objectConfigExists('cache_key');

// Set a value in the config.
$object->objectConfigSet('cache_key', 'hoc');

// Get a value from the config.
$object->objectConfigGet('cache_key', 'fallback_value');

// Delete a configuration by key from the object.
$object->objectConfigDelete('cache_key');

// Import a config array.
$object->objectConfigImport($myNewConfig);

// Export the config array.
$object->objectConfigExport();

// Reset the config.
$object->objectConfigReset();
```


### PluginCollection trait
***
Register and deregister plugins to an object. The trait reserves the **$pluginCollection** variable.

```php
// Import plugins in PLUGIN => CONFIG setup.
$object->pluginCollectionImport([
	'plugins\GoogleSearch' => ['secret_key' => 42],
	'plugins\FacebookSearch' => ['secret_key' => 43],
]);

// Export the collection.
$object->pluginCollectionExport();

// Register a new plugin to the collection.
$object->pluginCollectionRegister('plugins\AOL', ['secret_key' => 42]);

// Deregister a plugin by it's key.
$object->pluginCollectionDeregister('plugins\FacebookSearch');

// Check if a plugin is registered by it's key.
$object->pluginCollectionIsRegistered('plugins\FacebookSearch');


// Practical useage.

$this->pluginCollectionRegister('plugins\Bing', ['secret_key' => 95]);

foreach($this->pluginCollectionExport() as $plugin => $config) {
	
	$pluginInstance = new $plugin;
	$pluginInstance->objectConfigImport($config);

	$plugin->searchOrWhatEver();
}
```