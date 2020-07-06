<?php
namespace Deployer;

require 'recipe/common.php';

// Project name
set('application', 'testdeployer');

// Project repository
set('repository', 'https://github.com/jedmaverick/testdeployer.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
set('shared_files', []);
set('shared_dirs', []);

// Writable dirs by web server 
set('writable_dirs', []);


// Hosts

// host('project.com')
//     ->set('deploy_path', '~/{{application}}');

host('108.61.184.76')
    ->stage('stage')
    ->user('jed')
    //->port(22)
    //->identityFile('/root/.ssh/id_rsa')
    //->identityFile('~/.ssh/id_rsa')
    //->identityFile('/.ssh/id_rsa')
    ->forwardAgent(false)
    //->multiplexing(false)
    //->roles('app')
    ->set('deploy_path', '/home/jed/test');

set('ssh_multiplexing', false);

// server('staging', '108.61.184.76')
//    ->user('root')
//    ->set('deploy_path', '/var/www/html/projectsbop')
//    ->stage('staging')
//    ->identityFile();

// Tasks

// task('silverstripe:build', function () {
//     return run('{{bin/php}} {{release_path}}/framework/cli-script.php /dev/build');
// })->desc('Run /dev/build');

// task('silverstripe:buildflush', function () {
//     return run('{{bin/php}} {{release_path}}/framework/cli-script.php /dev/build flush=all');
// })->desc('Run /dev/build?flush=all');

desc('Deploy your project');
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    //'deploy:release',
    //'deploy:update_code',
    //'deploy:shared',
    //'deploy:writable',
    //'deploy:vendors',
    //'deploy:clear_paths',
    //'deploy:symlink',
    //'deploy:unlock',
    //'cleanup',
    //'success'
]);

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
