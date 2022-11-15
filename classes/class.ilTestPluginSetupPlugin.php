<?php

/**
 * Plugin to test the setup for plugins. ilCronHookPlugin is used as a slot here
 * because of the minimum requirements of these plugins.
 */
class ilTestPluginSetupPlugin extends ilCronHookPlugin {
	function getPluginName(): string
	{
		return "TestPluginSetup";
	}

	public function getCronJobInstances(): array
	{
		return [];
	}

	public function getCronJobInstance($a_job_id): ilCronJob
	{
        throw new \LogicException(
            "This plugin does not actually provide any cron jobs."
        );
	}
}
