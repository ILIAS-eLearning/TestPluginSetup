<?php

/* Copyright (c) 2020 Richard Klees <richard.klees@concepts-and-training.de> Extended GPL, see docs/LICENSE */

use ILIAS\Setup;
use ILIAS\Setup\Environment;

class ilTestPluginSetupMigration implements Setup\Migration
{
    /**
     * @return string a meaningful name for your migration.
     */
    public function getLabel() : string
    {
        return "A Migration from the test plugin for the setup.";
    }

    /**
     * @return string
     */
    public function getKey() : string
    {
        return "test_migration";
    }

    /**
     * Tell the default amount of steps to be executed for one run of the migration.
     * Return Migration::INFINITE if all units should be migrated at once.
     * @return int
     */
    public function getDefaultAmountOfStepsPerRun() : int
    {
        return 10;
    } 

    /**
     * Objectives the migration depend on.
     * @throw UnachievableException if the objective is not achievable
     * @return Objective[]
     */
    public function getPreconditions(Environment $environment) : array
    {
        return [
            new Setup\Objective\CallableObjective(
                function ($e) {
                    echo "\n\nThis is a PRECONDITION from the test migration.\n\n";
                },
                "This objective just echoes!",
                false
            )
        ];
    }

    /**
     * @param Environment $environment
     */
    public function prepare(Environment $environment) : void
    {
        echo "\n\nThis is the PREPARE method from the test migration.\n\n";
    }

    /**
     *  Run one step of the migration.
     */
    public function step(Environment $environment) : void
    {
        echo "\n\nThis is the STEP method from the test migration.\n\n";
    }

    /**
     * Count up how many "things" need to be migrated. This helps the admin to
     * decide how big he can create the steps and also how long a migration takes
     * @return int
     */
    public function getRemainingAmountOfSteps() : int
    {
        return 100;
    }
}
