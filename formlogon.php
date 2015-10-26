<?php

class formlogon extends rcube_plugin
{
        public $task = 'login';

        function init()
        {
                $this->add_hook('startup', array($this, 'startup'));
                $this->add_hook('authenticate', array($this, 'authenticate'));
        }

        function startup($args)
        {
                if (!empty($_POST['_autologin']) && $this->is_allowed()) {
                        $args['action'] = 'login';
                }

                return $args;
        }

        function authenticate($args)
        {
                if (!empty($_POST['_autologin']) && $this->is_allowed()) {
                        $args['user'] = $_POST["_user"];
                        $args['pass'] = $_POST["_pass"];
                        $args['host'] = $_POST["_mailserver"];
                        $args['cookiecheck'] = false;
                        $args['valid'] = true;
                }

                return $args;
        }

        function is_allowed()
        {
                return true;
        }

}
