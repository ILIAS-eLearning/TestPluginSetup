<?php

/* Copyright (c) 2020 Richard Klees <richard.klees@concepts-and-training.de> Extended GPL, see docs/LICENSE */

use ILIAS\Setup;
use ILIAS\Refinery;
use ILIAS\Data;

class ilTestPluginSetupAgent implements Setup\Agent
{
    /**
     * @var Refinery\Factory
     */
    protected $refinery;

    /**
     * @var	Data\Factory
     */
    protected $data;

    public function __construct(
        Refinery\Factory $refinery,
        Data\Factory $data
    ) {
        $this->refinery = $refinery;
        $this->data = $data;
    }

    /**
     * @inheritdoc
     */
    public function hasConfig() : bool
    {
        return true;
    }

    /**
     * @inheritdoc
     */
    public function getArrayToConfigTransformation() : Refinery\Transformation
    {
        return $this->refinery->custom()->transformation(function ($data) {
            return new class($data) implements Setup\Config {
                public function __construct($data) {
                    $this->data = $data;
                }
            };
        });
    }

    /**
     * @inheritdoc
     */
    public function getInstallObjective(Setup\Config $config = null) : Setup\Objective
    {
        return new Setup\Objective\CallableObjective(
            function($env) use ($config) {
                echo
                "\n\nThis is TestPluginSetupAgent::getInstallObjective calling.\n".
                "The configuration is:\n".json_encode($config->data)."\n\n";
            },
            "TestPluginSetupAgent::getInstallObjective",
            false
        );
    }

    /**
     * @inheritdoc
     */
    public function getUpdateObjective(Setup\Config $config = null) : Setup\Objective
    {
        return new Setup\Objective\CallableObjective(
            function($env) use ($config) {
                echo
                "\n\nThis is TestPluginSetupAgent::getUpdateObjective calling.\n".
                "The configuration is:\n".json_encode($config->data)."\n\n";
            },
            "TestPluginSetupAgent::getUpdateObjective",
            false
        );
    }

    /**
     * @inheritdoc
     */
    public function getBuildArtifactObjective() : Setup\Objective
    {
        return new Setup\Objective\CallableObjective(
            function($env) {
                echo
                "\n\nThis is TestPluginSetupAgent::getBuildArtifactObjective calling.\n";
            },
            "TestPluginSetupAgent::getBuildArtifactObjective",
            false
        );
    }

    /**
     * @inheritdoc
     */
    public function getStatusObjective(Setup\Metrics\Storage $storage) : Setup\Objective
    {
        return new Setup\Objective\CallableObjective(
            function($env) {
                echo
                "\n\nThis is TestPluginSetupAgent::getStatusObjective calling.\n";
            },
            "TestPluginSetupAgent::getStatusObjective",
            false
        );
    }

    /**
     * @inheritdoc
     */
    public function getMigrations() : array
    {
        return [];
    }
}
