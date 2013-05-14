<?php
/**
 * LDAP Name and Email fetching on User creation 
 *
 * Add it to the plugins list in config/main.inc.php
 * and edit the config.inc.php in the same folder as this file 
 *
 * @version @package_version@
 * @license GNU GPLv3+
 * @author Kory Prince <korylprince@gmail.com> 
 */

class virtuser_ldap extends rcube_plugin
{

    var $config;

    function init()
    {
        $this->_configure();
        $this->add_hook('user_create', array($this, 'user_create'));
    }

    function _configure() {

        $this->load_config('config.inc.php');
        $rcmail = rcmail::get_instance();
        $this->config = $rcmail->config->get('ldapauth');

    }

    function user_create($args)
    {
        # create filter based on username
        $filter = "(&({$this->config['userattr']}={$args['user']}){$this->config['userfilter']})";

        $attributes = array(
            $this->config['attr_name'],
            $this->config['attr_mail'],
            $this->config['attr_user']
        );

        # connect to server
        $ds = ldap_connect($this->config['url']);

        # check connection
        if ($ds) {
            # bind and search
            $r = ldap_bind($ds,$this->config['binddn'],$this->config['bindpw']);
            $sr = ldap_search($ds,$this->config['basedn'],$filter,$attributes);
            $info = ldap_get_entries($ds,$sr);

            # set attributes
            $args['user_email'] = $info[0][$this->config['attr_mail']][0];
            $args['user_name'] = $info[0][$this->config['attr_name']][0];
            return $args;
        }
        else {
            $args['abort'] = True;
        }
        return $args;
    }
}
?>
