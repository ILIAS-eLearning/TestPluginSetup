<?php

use ILIAS\Cron\CronJob;
use ILIAS\Cron\CronHookPlugin;

/**
 * Plugin to test the setup for plugins. ilCronHookPlugin is used as a slot here
 * because of the minimum requirements of these plugins.
 */
class ilTestPluginSetupPlugin extends CronHookPlugin {
	
	function getPluginName(): string 
	{
		return "TestPluginSetup";
	}

	public function getCronJobInstances(): array
	{
		return [];
	}

	public function getCronJobInstance(string $jobId): CronJob
	{
        throw new \LogicException(
            "This plugin does not actually provide any cron jobs."
        );
	}
}
