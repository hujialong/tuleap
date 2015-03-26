<?php

require_once('user.php');


function groups_to_soap($groups) {
    $return = array();
    foreach ($groups as $group_id => $group) {
        if (!$group || $group->isError()) {
            //skip if error
        } else {
            $return[] = group_to_soap($group);	
        }
    }
    return $return;
}

/**
 * Check if the user can access the project $group,
 * regarding the restricted access
 *
 * @param Object{Group} $group the Group object
 * @return boolean true if the current session user has access to this project, false otherwise
 */
function checkRestrictedAccess($group) {
    if (Config::areRestrictedUsersAllowed()) {
        if ($group) {
            $user = UserManager::instance()->getCurrentUser();
            if ($user) {
                if ($user->isRestricted()) {
                    return $group->userIsMember();
                } else {
                    return true;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return true;
    }
}

/**
 * Returns true is the current user is a member of the given group
 */
function checkGroupMemberAccess($group) {
    if ($group) {
        $user = UserManager::instance()->getCurrentUser();
        if ($user) {
            return $group->userIsMember();
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function ugroups_to_soap($ugroups) {
    $return = array();
    
    foreach ($ugroups as $ugroup) {
        $ugroup_id = $ugroup['ugroup_id'];
        if (!isset($return[$ugroup_id])) {
            $return[$ugroup_id]['ugroup_id'] = $ugroup_id;
            $return[$ugroup_id]['name'] = $ugroup['name'];
            $return[$ugroup_id]['members'] = array();
        }
        
        if ($ugroup['user_id']) {
            $return[$ugroup_id]['members'][] = array('user_id' => $ugroup['user_id'],
                                                     'user_name' => $ugroup['user_name']);
        }
    }
    
    return $return;
}

/**
 * User can get information about other users if they are active, retricted or suspended
 *
 * Suspended is needed to be coherent with the GUI where the suspended users are displayed
 * like active users to people (otherwise it breaks Mylyn on trackers due to workflow manager)
 *
 * @param string $identifier
 * @param PFUser $user
 * @param PFUser $current_user
 * @return array
 */
function user_to_soap($identifier, PFUser $user = null, PFUser $current_user) {
    if ($user !== null && ($user->isActive() || $user->isRestricted() || $user->isSuspended())) {
        if ($current_user->canSee($user)) {
            return array(
                'identifier' => $identifier,
                'username'   => $user->getUserName(),
                'id'         => $user->getId(),
                'real_name'  => $user->getRealName(),
                'email'      => $user->getEmail(),
                'ldap_id'    => $user->getLdapId()
            );
        }
    }
}

?>
