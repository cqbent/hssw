<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit32728d1b35a714bba4f2bd286808bb21
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Tribe\\Tickets\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Tribe\\Tickets\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Tribe',
        ),
    );

    public static $classMap = array (
        'Tribe\\Tickets\\Admin\\Manager\\Service_Provider' => __DIR__ . '/../..' . '/src/Tribe/Admin/Manager/Service_Provider.php',
        'Tribe\\Tickets\\Editor\\Warnings' => __DIR__ . '/../..' . '/src/Tribe/Editor/Warnings.php',
        'Tribe\\Tickets\\Events\\Attendees_List' => __DIR__ . '/../..' . '/src/Tribe/Events/Attendees_List.php',
        'Tribe\\Tickets\\Events\\Service_Provider' => __DIR__ . '/../..' . '/src/Tribe/Events/Service_Provider.php',
        'Tribe\\Tickets\\Events\\Views\\V2\\Hooks' => __DIR__ . '/../..' . '/src/Tribe/Events/Views/V2/Hooks.php',
        'Tribe\\Tickets\\Events\\Views\\V2\\Models\\Tickets' => __DIR__ . '/../..' . '/src/Tribe/Events/Views/V2/Models/Tickets.php',
        'Tribe\\Tickets\\Events\\Views\\V2\\Service_Provider' => __DIR__ . '/../..' . '/src/Tribe/Events/Views/V2/Service_Provider.php',
        'Tribe\\Tickets\\Migration\\Queue' => __DIR__ . '/../..' . '/src/Tribe/Migration/Queue.php',
        'Tribe\\Tickets\\Migration\\Queue_4_12' => __DIR__ . '/../..' . '/src/Tribe/Migration/Queue_4_12.php',
        'Tribe\\Tickets\\Promoter\\Service_Provider' => __DIR__ . '/../..' . '/src/Tribe/Promoter/Service_Provider.php',
        'Tribe\\Tickets\\Promoter\\Triggers\\Builders\\Attendee_Trigger' => __DIR__ . '/../..' . '/src/Tribe/Promoter/Triggers/Builders/Attendee_Trigger.php',
        'Tribe\\Tickets\\Promoter\\Triggers\\Contracts\\Attendee_Model' => __DIR__ . '/../..' . '/src/Tribe/Promoter/Triggers/Contracts/Attendee_Model.php',
        'Tribe\\Tickets\\Promoter\\Triggers\\Contracts\\Builder' => __DIR__ . '/../..' . '/src/Tribe/Promoter/Triggers/Contracts/Builder.php',
        'Tribe\\Tickets\\Promoter\\Triggers\\Contracts\\Triggered' => __DIR__ . '/../..' . '/src/Tribe/Promoter/Triggers/Contracts/Triggered.php',
        'Tribe\\Tickets\\Promoter\\Triggers\\Director' => __DIR__ . '/../..' . '/src/Tribe/Promoter/Triggers/Director.php',
        'Tribe\\Tickets\\Promoter\\Triggers\\Dispatcher' => __DIR__ . '/../..' . '/src/Tribe/Promoter/Triggers/Dispatcher.php',
        'Tribe\\Tickets\\Promoter\\Triggers\\Factory' => __DIR__ . '/../..' . '/src/Tribe/Promoter/Triggers/Factory.php',
        'Tribe\\Tickets\\Promoter\\Triggers\\Models\\Attendee' => __DIR__ . '/../..' . '/src/Tribe/Promoter/Triggers/Models/Attendee.php',
        'Tribe\\Tickets\\Promoter\\Triggers\\Observers\\Commerce' => __DIR__ . '/../..' . '/src/Tribe/Promoter/Triggers/Observers/Commerce.php',
        'Tribe\\Tickets\\Promoter\\Triggers\\Observers\\RSVP' => __DIR__ . '/../..' . '/src/Tribe/Promoter/Triggers/Observers/RSVP.php',
        'Tribe\\Tickets\\Repositories\\Order' => __DIR__ . '/../..' . '/src/Tribe/Repositories/Order.php',
        'Tribe\\Tickets\\Repositories\\Post_Repository' => __DIR__ . '/../..' . '/src/Tribe/Repositories/Post_Repository.php',
        'Tribe\\Tickets\\Repositories\\Traits\\Event' => __DIR__ . '/../..' . '/src/Tribe/Repositories/Traits/Event.php',
        'Tribe\\Tickets\\Repositories\\Traits\\Post_Attendees' => __DIR__ . '/../..' . '/src/Tribe/Repositories/Traits/Post_Attendees.php',
        'Tribe\\Tickets\\Repositories\\Traits\\Post_Tickets' => __DIR__ . '/../..' . '/src/Tribe/Repositories/Traits/Post_Tickets.php',
        'Tribe\\Tickets\\Service_Providers\\Customizer' => __DIR__ . '/../..' . '/src/Tribe/Service_Providers/Customizer.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit32728d1b35a714bba4f2bd286808bb21::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit32728d1b35a714bba4f2bd286808bb21::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit32728d1b35a714bba4f2bd286808bb21::$classMap;

        }, null, ClassLoader::class);
    }
}
