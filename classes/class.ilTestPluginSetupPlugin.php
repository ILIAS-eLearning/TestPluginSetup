<?php

/**
 * Plugin to test the setup for plugins. ilCronHookPlugin is used as a slot here
 * because of the minimum requirements of these plugins.
 */
class ilTestPluginSetupPlugin extends ilCronHookPlugin {
	function getPluginName() {
		return "TestPluginSetup";
	}

	public function getCronJobInstances()
	{
		return [];
	}

	public function getCronJobInstance($a_job_id)
	{
        throw new \LogicException(
            "This plugin does not actually provide any cron jobs."
        );
	}
}
