<?php
/**
 * Copyright Enalean (c) 2017. All rights reserved.
 *
 * Tuleap and Enalean names and logos are registrated trademarks owned by
 * Enalean SAS. All other trademarks or names are properties of their respective
 * owners.
 *
 * This file is a part of Tuleap.
 *
 * Tuleap is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * Tuleap is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Tuleap. If not, see <http://www.gnu.org/licenses/>.
 */

namespace Tuleap\LDAP;

class LinkModalContentPresenter
{
    public $form_action;
    public $ldap_group_name;
    public $is_preserved_members_checked;
    public $is_synchro_daily_checked;

    public function __construct(
        $form_action,
        $ldap_group_name,
        $is_preserved_members_checked,
        $is_synchro_daily_checked
    ) {
        $this->form_action                  = $form_action;
        $this->ldap_group_name              = $ldap_group_name;
        $this->is_preserved_members_checked = $is_preserved_members_checked;
        $this->is_synchro_daily_checked     = $is_synchro_daily_checked;
    }
}
