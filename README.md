virtuser\_ldap_roundcube

<https://github.com/korylprince/virtuser_ldap_roundcube>

#Installing#

Copy the root folder to the Roundcube plugin directory and ensure the directory is named virtuser\_ldap.
Then copy the config.inc.php.dist file to config.inc.php in the same folder and edit its settings.

If you have any issues or questions, email the email address below, or open an issue at:
<https://github.com/korylprince/virtuser_ldap_roundcube/issues>

#Usage#

I wrote this small plugin because I found all other options lacking in what I needed. This plugin is very simple.

On user creation the server will query an LDAP server for the user name and email. This is useful if you want to use more than one domain dynamically with roundcube.

The config.inc.php.dist file is fairly explanatory. It is focused on using Active Directory, though it should not be too hard to modify for use with other LDAP servers.

#Copyright Information#

All code is Copyright 2012 Kory Prince (korylprince at gmail dot com.) This code is licensed under the GPL v3 which is included in this distribution.

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
