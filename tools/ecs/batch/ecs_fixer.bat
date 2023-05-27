:: Run easy-coding-standard (ecs) via this batch file inside your IDE e.g. PhpStorm (Windows only)
:: Install inside PhpStorm the  "Batch Script Support" plugin
cd..
cd..
cd..
cd..
cd..
cd..
php vendor\bin\ecs check vendor/markocupic/service-link-bundle/src --fix --config vendor/markocupic/service-link-bundle/tools/ecs/config.php
php vendor\bin\ecs check vendor/markocupic/service-link-bundle/contao --fix --config vendor/markocupic/service-link-bundle/tools/ecs/config.php
php vendor\bin\ecs check vendor/markocupic/service-link-bundle/config --fix --config vendor/markocupic/service-link-bundle/tools/ecs/config.php
php vendor\bin\ecs check vendor/markocupic/service-link-bundle/tests --fix --config vendor/markocupic/service-link-bundle/tools/ecs/config.php
